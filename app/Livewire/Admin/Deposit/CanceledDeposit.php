<?php

namespace App\Livewire\Admin\Deposit;
use Livewire\Attributes\Title;
use App\Models\Deposit;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class CanceledDeposit extends Component
{
    #[Title('CanceledDeposit')]
    public function render()
    {
        return view('livewire.admin.deposit.canceled-deposit', [
            'deposits' => Deposit::where('status', 'canceled')->latest()->get()
        ]);
    }
}
