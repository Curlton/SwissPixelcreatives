<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
class BlockedUsers extends Component
{
    
    use WithPagination;
    #[Title('BlockedUsers')]
    public $search = '';

    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.admin.users.blocked-users', [
            'users' => User::query()
                // Filtering by status 'blocked'
                ->where('status', 'blocked') 
                ->when($this->search, function($query) {
                    $query->where('username', 'like', '%' . $this->search . '%');
                })
                ->latest()
                ->paginate(15)
        ])->layout('components.layouts.admin');
    }
}
