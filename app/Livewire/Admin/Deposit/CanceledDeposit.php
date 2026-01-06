<?php

namespace App\Livewire\Admin\Deposit;

use App\Models\Deposit;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class CanceledDeposit extends Component
{
    public function render()
    {
        return view('livewire.admin.deposit.canceled-deposit', [
            'deposits' => Deposit::where('status', 'canceled')->latest()->get()
        ]);
    }
}
