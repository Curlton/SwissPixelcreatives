<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use App\Models\UserDataset;
use App\Models\MembershipLevel;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
class UserDatasetManager extends Component
{
    use WithPagination;
    #[Title('UserDatasetManager')]
    public User $user;
    public $selectedMembership; // Added property for the dropdown

    /**
     * Mount allows the component to receive the User ID from the URL
     */
    public function mount(User $user)
    {
        $this->user = $user;
        // Initialize the dropdown value with the user's current level
        $this->selectedMembership = $user->membership_level ?? 'VIP 1 BRONZE';
    }

    /**
     * Updates the user's membership level
    
 * Updates the user's membership level using the new database structure.
 */
public function updateMembership()
{
    // 1. Update the membership_id column instead of the old string column
    $this->user->membership_id = $this->selectedMembership;
    
    // 2. Clear any old hardcoded string if it still exists (optional cleanup)
    // $this->user->membership_level = null; 

    $this->user->save();

    // 3. Fetch the level name from the relationship for a better notification
    $levelName = \App\Models\MembershipLevel::find($this->selectedMembership)->level_name ?? 'Unknown';

    session()->flash('message', "Membership updated to: {$levelName}");
}


    
    public function toggleCanPlay()
{
    // Flipping the lock: 1 becomes 0, 0 becomes 1
    $this->user->is_set_locked = !$this->user->is_set_locked;
    $this->user->save();
    
    $this->user->refresh();
}
    /**
     * Toggles the 'Merged' status
     */
    public function toggleMerged()
    {
        $this->user->is_merged = !$this->user->is_merged;
        $this->user->save();
        
        session()->flash('message', 'User product merge status updated.');
    }

    public function unfreezeTask($recordId)
    {
        $record = UserDataset::find($recordId);
        
        if ($record && $record->status === 'frozen') {
            $user = $this->user;

            $debtCorrection = $user->balance < 0 ? abs($user->balance) : 0;
            $totalToRelease = $record->price + $record->profit;

            $user->balance += $totalToRelease;
            $user->balance += $debtCorrection;
            $user->today_profit += $record->profit;
            $user->total_profits += $record->profit;
            
            $user->pending_profit = max(0, $user->pending_profit - $record->profit);
            
            $user->save();
            $record->update(['status' => 'completed']);
            // 1. Force clear the user instance
            $this->user->refresh();

            // 2. THIS IS THE KEY FOR 2025:
        // Resetting pagination or forcing a component refresh kills the DOM ghost
            $this->dispatch('$refresh'); 

            session()->flash('message', "Task released! Added $" . number_format($totalToRelease, 2) . " to {$user->name}'s balance.");
        }
    }
    /**
 * Delete a completed customized activity record
 */
public function deleteActivity($recordId)
{
    // 1. Find the history record and include the source dataset
    $record = \App\Models\UserDataset::where('id', $recordId)
        ->where('user_id', $this->user->id)
        ->with('dataset')
        ->first();

    // 2. Verify conditions: must be completed and linked to a "custom" dataset
    if ($record && $record->status === 'completed' && ($record->dataset->is_custom ?? false)) {
        
        // 3. Store the dataset reference before deleting the record
        $parentDataset = $record->dataset;

        // 4. Delete the history record (the user_datasets entry)
        $record->delete();

        /**
         * 5. CRITICAL STEP: Delete the actual item from the data_sets table.
         * This prevents it from appearing in the driving pool again.
         */
        if ($parentDataset) {
            $parentDataset->delete(); 
        }

        session()->flash('success', 'Custom activity and source item permanently removed.');
    } else {
        session()->flash('error', 'Only completed custom activities can be fully removed.');
    }
}

    public function render()
    {
        $userHistory = UserDataset::where('user_id', $this->user->id)
            ->with(['dataset' => function($query) {
                $query->withoutGlobalScopes();
            }])
            ->latest()
            ->take(120) 
            ->get();

        return view('livewire.admin.users.user-dataset-manager', [
            'userHistory' => $userHistory
        ])->layout('components.layouts.admin');
    }
}
