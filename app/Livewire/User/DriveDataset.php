<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Dataset;
use App\Models\UserDataset;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;

class DriveDataset extends Component
{
    #[Title('Drive-dataset')]
    public $setNumber = 1; 
    public $maxTasks = 40; 
    public $showTaskModal = false;
    public $currentProductId;

    /**
     * Runs once when the component is initialized.
     */
    public function mount()
    {
        $this->updateProgress();
    }

    /**
     * Refreshes the local set number from the database.
     * We call this after mount AND after every submitTask() 
     * to ensure the UI is always correct.
     */
    private function updateProgress()
    {
        $user = Auth::user();
        
        // Ensure we always have a numeric fallback for Set 1, 2, or 3
        $this->setNumber = (int) ($user->current_set_id ?? 1);
    }


  public function driveNow()
{
    $user = Auth::user()->fresh();

    // 1. SECURITY & STATE CHECKS
    if ($user->balance < 0) {
        $this->dispatch('hide-loader');
        $this->dispatch('alert', ['type' => 'warning', 'message' => 'You have met a merged product! Please clear your negative balance.']);
        return; 
    }

    if ($user->is_set_locked) {
        $this->dispatch('hide-loader');
        $this->dispatch('alert', ['type' => 'info', 'message' => 'Set Completed: Your current task set is locked.']);
        return; 
    }
    
    if ($user->balance < 70) {
        // Only enforce this if they haven't completed any tasks yet
        $hasCompletedTasks = UserDataset::where('user_id', $user->id)->exists();
        if (!$hasCompletedTasks) {
            $this->dispatch('hide-loader');
            $this->dispatch('alert', [
                'type' => 'info', 
                'message' => 'Welcome! You must make an initial deposit of $70.00 USD to start driving.'
            ]);
            return;
        }
    }

    sleep(1); 

    // 2. TASK RETRIEVAL LOGIC
    $completedSlotsCount = UserDataset::where('user_id', $user->id)
        ->where('current_set_id', $user->current_set_id)
        ->where('status', 'completed')
        ->count();

    // Find the standard product that should be next in the current set (1, 2, or 3)
    $originalProduct = Dataset::where('is_custom', false)
        ->where('set_number', $user->current_set_id) 
        ->orderBy('id', 'asc')
        ->skip($completedSlotsCount)
        ->first();

    if ($originalProduct) {
        /** 
         * 3. PRIORITY OVERRIDE CHECK
         * We search for a custom product specifically for THIS user 
         * that points to the ID of the original product.
         */
        $customOverride = Dataset::where('is_custom', true)
            ->where('user_id', $user->id)
            ->where('original_id', $originalProduct->id) 
            // Removed set_number check here to prevent mismatches
            ->first();

        // Use the custom item if found, otherwise use the standard original
        $productToDrive = $customOverride ?: $originalProduct;
        
        $this->currentProductId = $productToDrive->id;
        $this->dispatch('hide-loader');
        $this->showTaskModal = true; 
    } else {
        $this->dispatch('hide-loader');
        $this->dispatch('alert', [
            'type' => 'error', 
            'message' => 'No tasks found for this set. Please contact support.'
        ]);
    }
}

  public function submitTask()
{
    $user = Auth::user()->fresh();
    $product = Dataset::withoutGlobalScopes()->find($this->currentProductId);
    
    if (!$product) {
        $this->showTaskModal = false;
        return;
    }

    // --- 2026 PROFIT DETERMINATION ---
    if ($product->is_custom) {
        // KEEP YOUR LOGIC: Admin-defined profit from the custom product record
        $calculatedProfit = $product->profit; 
    } else {
        // DYNAMIC LOGIC: Specific to the User's Current Set (Set 1, 2, or 3)
        $targetSetProfit = $user->level->target_set_profit ?? 14.00;

        // Sum prices only for standard items in the user's active set_number
        $totalSetPrice = Dataset::where('is_custom', false)
            ->where('set_number', $user->current_set_id) // Ensures Set 1 doesn't affect Set 2
            ->sum('price');
            
        // Safety check to prevent division by zero
        if ($totalSetPrice > 0) {
            $calculatedProfit = ($product->price / $totalSetPrice) * $targetSetProfit;
        } else {
            $calculatedProfit = 0;
        }
    }

    $tasksInCurrentSet = UserDataset::where('user_id', $user->id)
        ->where('current_set_id', $user->current_set_id)
        ->count();
    
    $userRecordStatus = 'completed';

    if ($product->is_custom) {
        // YOUR ORIGINAL MERGED LOGIC (No changes as requested)
        $user->update([
            'balance' => $user->balance - $product->price,
            'pending_profit' => $user->pending_profit + $calculatedProfit, 
        ]);

        $userRecordStatus = 'frozen';
        $this->showTaskModal = false; 
        
        $this->dispatch('alert', [
            'type' => 'warning', 
            'message' => 'Merged product met! Balance adjusted.',
            'silent' => true 
        ]);
    } 
    else {
        // STANDARD LOGIC: Using the dynamic $calculatedProfit
        $user->increment('balance', $calculatedProfit);
        $user->increment('today_profit', $calculatedProfit);
        $user->increment('total_profits', $calculatedProfit);
        
        $this->dispatch('alert', [
               'type' => 'success',
               'message' => 'Submission Successful!',
               'silent' => true
        ]);
        
        $this->showTaskModal = false;
    }

    // Save history with the calculated/custom profit
    UserDataset::create([
        'user_id' => $user->id,
        'current_set_id' => $user->current_set_id, 
        'product_id' => $product->id,
        'product_image' => $product->product_image,
        'product_desc' => $product->product_desc,
        'price' => $product->price,
        'profit' => $calculatedProfit,
        'status' => $userRecordStatus,
        'task_number' => $tasksInCurrentSet + 1,
    ]);

    // If it's a standard product and user reaches 40, lock the set
    if (!$product->is_custom && ($tasksInCurrentSet + 1 >= $this->maxTasks)) {
        $user->update(['is_set_locked' => true]);
    }

    $user->refresh();
    $this->currentProductId = null;
    $this->updateProgress(); 
}



   public function render()
{
    $user = Auth::user()->fresh();
    $product = Dataset::withoutGlobalScopes()->find($this->currentProductId);
    
    $calculatedProfit = 0;
    
    if ($product) {
        // 1. If Merged Product, use the fixed profit set by Admin
        if ($product->is_custom) {
            $calculatedProfit = $product->profit;
        } 
        // 2. If Standard Product, calculate dynamic profit for the current set
        else {
            $targetSetProfit = $user->level->target_set_profit ?? 14.00;
            
            // Sum prices only for the specific set the user is in (1, 2, or 3)
            $totalSetPrice = Dataset::where('is_custom', false)
                ->where('set_number', $user->current_set_id)
                ->sum('price');

            if ($totalSetPrice > 0) {
                $calculatedProfit = ($product->price / $totalSetPrice) * $targetSetProfit;
            }
        }
    }

    $completedInSet = UserDataset::where('user_id', $user->id)
        ->where('current_set_id', $user->current_set_id)
        ->where('status', 'completed')
        ->count();

    return view('livewire.user.drive-dataset', [
        'currentTask'  => $completedInSet, 
        'maxTasks'     => $this->maxTasks,
        'setNumber'    => $user->current_set_id ?? 1,
        'totalBalance' => $user->balance,
        'todayProfit'  => $user->today_profit,
        'product'      => $product,
        'itemProfit'   => $calculatedProfit
    ])->layout('components.layouts.site');
}

}
