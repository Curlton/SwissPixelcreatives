<?php

namespace App\Livewire\User\Withdraw;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Withdraw;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination; // 1. Add this

class Methods extends Component
{
    use WithPagination; // 2. Add this inside the class

    #[Title('Method')]
    public function render()
    {
        // 3. Change ->get() to ->paginate(10)
        $history = Withdraw::where('user_id', Auth::id())
            ->latest()
            ->paginate(10); 

        return view('livewire.user.withdraw.methods', [
            'history' => $history
        ])->layout('components.layouts.site');
    }
}
