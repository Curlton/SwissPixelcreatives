<?php

namespace App\Livewire\Admin\Deposit;

use App\Models\Deposit;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class PendingDeposit extends Component
{
    public function approve($id) {
        Deposit::find($id)->update(['status' => 'approved']);
        session()->flash('success', 'Deposit approved.');
    }

    public function cancel($id) {
        Deposit::find($id)->update(['status' => 'canceled']);
        session()->flash('success', 'Deposit canceled.');
    }

    public function render()
    {
        return view('livewire.admin.deposit.pending-deposit', [
            'deposits' => Deposit::where('status', 'pending')->latest()->get()
        ]);
    }
}
