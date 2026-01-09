<?php

namespace App\Livewire\Admin\Deposit;

use App\Models\Deposit;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
#[Layout('components.layouts.admin')]
class ApprovedDeposit extends Component
{
    #[Title('ApprovedDeposit')]
    public function render()
    {
        return view('livewire.admin.deposit.approved-deposit', [
            'deposits' => Deposit::where('status', 'approved')->latest()->get()
        ]);
    }
}
