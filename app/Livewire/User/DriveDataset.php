<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\Dataset;
use App\Models\UserDataset;
use Illuminate\Support\Facades\Auth;

class DriveDataset extends Component
{
    public $setNumber = 1; 
    public $maxTasks = 40; 
    public $showTaskModal = false;
    public $currentProductId;

    public function mount()
    {
        $this->updateProgress();
    }

    private function updateProgress()
    {
        $user = Auth::user();
        $this->setNumber = $user->current_set_id ?? 1;
    }

public function driveNow()
{
    $user = Auth::user()->fresh();

    // 1. SECURITY & STATE CHECKS
    
    // Check if account is Frozen
    if ($user->balance < 0) {
        $this->dispatch('hide-loader'); // KILL GIF INSTANTLY
        $this->dispatch('alert', [
            'type' => 'warning', 
            'message' => 'Account Frozen: You have met a merged product! Please clear your negative balance to continue.'
        ]);
        return; 
    }

    // Check if Set is Locked
    if ($user->is_set_locked) {
        $this->dispatch('hide-loader'); // KILL GIF INSTANTLY
        $this->dispatch('alert', [
            'type' => 'info', 
            'message' => 'Set Completed: Your current task set is locked. Please contact support or reset to continue.'
        ]);
        return; 
    }

    // New User Check
    if ($user->balance == 0 || is_null($user->balance)) {
        $hasCompletedTasks = UserDataset::where('user_id', $user->id)->exists();
        if (!$hasCompletedTasks) {
            $this->dispatch('hide-loader'); // KILL GIF INSTANTLY
            $this->dispatch('alert', [
                'type' => 'info', 
                'message' => 'Welcome! You must make an initial deposit of $70.00 USD to start driving.'
            ]);
            return;
        }
    }

    // 2. VALID USER FLOW
    // Note: show-loader is already handled by x-on:click for instant response
    
    sleep(2); // Artificial delay for the "Searching" animation

    // 3. TASK RETRIEVAL LOGIC
    $completedSlotsCount = UserDataset::where('user_id', $user->id)
        ->where('current_set_id', $user->current_set_id)
        ->where('status', 'completed')
        ->count();

    $originalProduct = Dataset::where('is_custom', false)
        ->orderBy('id', 'asc')
        ->skip($completedSlotsCount)
        ->first();

    if ($originalProduct) {
        $customOverride = Dataset::where('original_id', $originalProduct->id)
            ->where('is_custom', true)
            ->where('user_id', $user->id)
            ->where('set_number', $user->current_set_id)
            ->first();

        $productToDrive = $customOverride ?: $originalProduct;

        $this->currentProductId = $productToDrive->id;
        $this->dispatch('hide-loader'); // HIDE GIF BEFORE MODAL
        $this->showTaskModal = true; 
    } else {
        $this->dispatch('hide-loader');
        $this->dispatch('alert', [
            'type' => 'error', 
            'message' => 'The task sequence has ended. Please contact support.'
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

        $tasksInCurrentSet = UserDataset::where('user_id', $user->id)
            ->where('current_set_id', $user->current_set_id)
            ->count();
        
        $userRecordStatus = 'completed';

        if ($product->is_custom) {
            // MATH: User pays the full price (balance goes negative)
            // Profit moves to pending pool
            $user->update([
                'balance' => $user->balance - $product->price,
                'pending_profit' => $user->pending_profit + $product->profit, 
            ]);

            $userRecordStatus = 'frozen';
            $this->showTaskModal = false; 
            
            $this->dispatch('alert', [
                'type' => 'warning', 
                'message' => 'Merged product met! Balance adjusted. Clear balance to continue.'
            ]);
        } 
        else {
            // STANDARD MATH: Add profit directly
            $user->increment('balance', $product->profit);
            $user->increment('today_profit', $product->profit);
            $user->increment('total_profits', $product->profit);
            
            $this->dispatch('swal-toast', [
                   'icon' => 'success',
                   'title' => 'Submission Successful!',
        ]);
            
            $this->showTaskModal = false;
        }

        // SAVE HISTORY: Ensure product_id links to data_sets.id
        UserDataset::create([
            'user_id' => $user->id,
            'current_set_id' => $user->current_set_id, 
            'product_id' => $product->id, // Primary Key ID for correct relationship
            'product_image' => $product->product_image,
            'product_desc' => $product->product_desc,
            'price' => $product->price,
            'profit' => $product->profit,
            'status' => $userRecordStatus,
            'task_number' => $tasksInCurrentSet + 1,
        ]);

        if (!$product->is_custom && ($tasksInCurrentSet + 1 >= $this->maxTasks)) {
            $user->update(['is_set_locked' => true]);
        }

        $user->refresh(); // Sync data for the next render
        $this->currentProductId = null;
        $this->updateProgress(); 
    }

   public function render()
{
    // Fetch fresh user data for 2025 security/accuracy
    $user = Auth::user()->fresh();
    
    // Count tasks completed in the user's current specific set
    $completedInSet = UserDataset::where('user_id', $user->id)
        ->where('current_set_id', $user->current_set_id)
        ->where('status', 'completed') // Ensure only finished tasks are counted
        ->count();

    return view('livewire.user.drive-dataset', [
        'currentTask'  => $completedInSet, 
        'maxTasks'     => 40, // Standard set size
        'setNumber'    => $user->current_set_id ?? 1,
        'totalBalance' => $user->balance,
        'todayProfit'  => $user->today_profit,
        'product'      => Dataset::find($this->currentProductId) 
    ])->layout('components.layouts.site');
}

}
