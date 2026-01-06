<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Models\UserDataset;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination; // Import the trait

class Events extends Component
{
    use WithPagination; // Use the trait

    public $activeTab = 'all';

    // Reset pagination when the tab changes
    public function setTab($tab)
    {
        $this->activeTab = $tab;
        $this->resetPage(); 
    }

    // Optional: Define custom pagination theme for Tailwind styling
    protected $paginationTheme = 'tailwind';


    public function render()
    {
        $query = UserDataset::query()
            ->where('user_id', Auth::id())
            // CRITICAL: Eager load the relationship so Blade can use $record->dataset->is_custom
            ->with('dataset'); 

        if ($this->activeTab === 'completed') {
            $query->where('status', 'completed');
        } 
        elseif ($this->activeTab === 'frozen') {
            $query->where('status', 'frozen');
        }

        return view('livewire.user.events', [
            // Use paginate() instead of get() for performance
            'records' => $query->latest()->paginate(20) 
        ])->layout('components.layouts.site');
    }
}
