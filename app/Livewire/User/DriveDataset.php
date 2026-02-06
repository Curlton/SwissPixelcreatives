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

    // --- CRITICAL FIX: FROZEN CHECK ---
    // Check if the user is currently stuck on a custom (merged) product.
    // If a 'frozen' record exists, they cannot proceed until Admin unfreezes it.
    $hasFrozenTask = UserDataset::where('user_id', $user->id)
        ->where('current_set_id', $user->current_set_id)
        ->where('status', 'frozen')
        ->exists();

    if ($hasFrozenTask) {
        $this->dispatch('hide-loader');
        $this->dispatch('alert', [
            'type' => 'warning', 
            'message' => 'You have a pending merged product. Please contact support to unfreeze and continue.'
        ]);
        return; // Stop execution here
    }
    // ----------------------------------

    sleep(1); 

    // 2. TASK RETRIEVAL LOGIC
    $completedSlotsCount = UserDataset::where('user_id', $user->id)
        ->where('current_set_id', $user->current_set_id)
        ->where('status', 'completed')
        ->count();

    // Find the standard product that should be next
    $originalProduct = Dataset::where('is_custom', false)
        ->where('set_number', $user->current_set_id) 
        ->orderBy('id', 'asc')
        ->skip($completedSlotsCount)
        ->first();

    if ($originalProduct) {
        // 3. PRIORITY OVERRIDE CHECK
        $customOverride = Dataset::where('is_custom', true)
            ->where('user_id', $user->id)
            ->where('original_id', $originalProduct->id) 
            ->first();

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
    
    // 1. SECURITY GUARD: Prevent submission if a frozen task already exists
    // This stops the user from submitting a second time if they are already stuck.
    $isStuck = UserDataset::where('user_id', $user->id)
        ->where('current_set_id', $user->current_set_id)
        ->where('status', 'frozen')
        ->exists();

    if ($isStuck) {
        $this->showTaskModal = false;
        $this->dispatch('alert', ['type' => 'error', 'message' => 'Security Error: You have a pending frozen task.']);
        return;
    }

    $product = Dataset::withoutGlobalScopes()->find($this->currentProductId);
    
    if (!$product) {
        $this->showTaskModal = false;
        return;
    }

    // --- 2026 PROFIT DETERMINATION ---
    if ($product->is_custom) {
        $calculatedProfit = $product->profit; 
    } else {
        $targetSetProfit = $user->level->target_set_profit ?? 14.00;
        $totalSetPrice = Dataset::where('is_custom', false)
            ->where('set_number', $user->current_set_id)
            ->sum('price');
            
        $calculatedProfit = ($totalSetPrice > 0) ? ($product->price / $totalSetPrice) * $targetSetProfit : 0;
    }

    $tasksInCurrentSet = UserDataset::where('user_id', $user->id)
        ->where('current_set_id', $user->current_set_id)
        ->count();
    
    $userRecordStatus = 'completed';

    // 2. DATABASE TRANSACTION: Wrap financial updates for safety
    \Illuminate\Support\Facades\DB::transaction(function () use ($user, $product, $calculatedProfit, $tasksInCurrentSet, &$userRecordStatus) {
        
        if ($product->is_custom) {
            // MERGED LOGIC
            $user->update([
                'balance' => $user->balance - $product->price,
                'pending_profit' => $user->pending_profit + $calculatedProfit, 
            ]);

            $userRecordStatus = 'frozen';
            $this->dispatch('alert', [
                'type' => 'warning', 
                'message' => 'Merged product met! Contact customer service.',
                'silent' => true 
            ]);
        } 
        else {
            // STANDARD LOGIC
            $user->increment('balance', $calculatedProfit);
            $user->increment('today_profit', $calculatedProfit);
            $user->increment('total_profits', $calculatedProfit);
            
            $this->dispatch('alert', [
                   'type' => 'success',
                   'message' => 'Submission Successful!',
                   'silent' => true
            ]);
        }

        // 3. CREATE HISTORY (Inside Transaction)
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

        // Lock set if standard max reached
        if (!$product->is_custom && ($tasksInCurrentSet + 1 >= $this->maxTasks)) {
            $user->update(['is_set_locked' => true]);
        }
    });

    $this->showTaskModal = false;
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
