<?php

namespace App\Livewire\Admin\Withdraw;

use App\Models\Withdraw;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class CanceledWithdraw extends Component
{
    public function render()
    {
        return view('livewire.admin.withdraw.canceled-withdraw', [
            'withdrawals' => Withdraw::where('status', 'cancelled')->latest()->get()
        ]);
    }
}
