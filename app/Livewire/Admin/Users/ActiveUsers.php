<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ActiveUsers extends Component
{
    use WithPagination;

    public $search = '';

    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
{
    return view('livewire.admin.users.active-users', [
        'users' => User::query()
            // Using your database column 'status'
            ->where('status', 'active') 
            ->when($this->search, function($query) {
                $query->where('username', 'like', '%' . $this->search . '%');
            })
            ->latest()
            ->paginate(15)
    ])->layout('components.layouts.admin');
}

}
