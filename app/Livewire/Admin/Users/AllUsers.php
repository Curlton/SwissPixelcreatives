<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
class AllUsers extends Component
{
    use WithPagination;
    #[Title('AllUsers')]
    public $search = ''; // 1. Property to hold the search term

    protected $paginationTheme = 'tailwind';

    /**
     * Reset pagination to page 1 whenever the search term changes.
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }
public function unlockUser($userId)
{
    $user = User::find($userId);

    if ($user) {
        // 1. Determine the target set
        $targetSet = ($user->current_set_id >= 3) ? 1 : ($user->current_set_id + 1);

        // 2. Clear task history for the set the user is entering
        // withoutGlobalScopes() ensures we find all records regardless of status/filters
        \App\Models\UserDataset::withoutGlobalScopes()
            ->where('user_id', $user->id)
            ->where('current_set_id', $targetSet)
            ->delete();

        // 3. FORCE REMOVAL: Delete ALL custom/merged products assigned to this user.
        // We bypass scopes here to ensure the "Merged Product" is 100% gone.
        \App\Models\Dataset::withoutGlobalScopes()
            ->where('user_id', $user->id)
            ->where('is_custom', true)
            ->delete();

        // 4. Update the user record
        if ($user->current_set_id >= 3) {
            $user->update([
                'current_set_id' => 1,
                'is_set_locked'  => false,
                'today_profit'   => 0, // Reset daily profit for a fresh cycle
            ]);
            $message = "User {$user->username} reset to Set #1. All custom items and history purged.";
        } else {
            $user->update([
                'current_set_id' => $targetSet,
                'is_set_locked'  => false,
            ]);
            $message = "User {$user->username} unlocked for Set #{$targetSet}. Custom items purged.";
        }

        $this->dispatch('alert', [
            'type' => 'success', 
            'message' => $message
        ]);
    }
}



    public function render()
{
    return view('livewire.admin.users.all-users', [
        'users' => User::query()
            ->when($this->search, function($query) {
                // Removed 'name' and kept 'username'
                $query->where('username', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->withCount('completedDatasets') 
            ->paginate(30)
    ])->layout('components.layouts.admin');
}

}
