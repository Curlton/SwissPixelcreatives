<?php

namespace App\Livewire\Admin\Deposit;

use App\Models\Deposit;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class AllDeposit extends Component
{
    // Add approve/cancel methods here if you want actions in the All view
    public function render()
    {
        return view('livewire.admin.deposit.all-deposit', [
            'deposits' => Deposit::latest()->get()
        ]);
    }
}
