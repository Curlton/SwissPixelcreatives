<?php

namespace App\Livewire\Admin\Withdraw;

use App\Models\Withdraw;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB; // Required for secure transactions

#[Layout('components.layouts.admin')]
class PendingWithdraw extends Component
{
    public function approve($id)
    {
        // Use a transaction to ensure both status update and balance deduction succeed together
        DB::transaction(function () use ($id) {
            $withdraw = Withdraw::find($id);

            if ($withdraw && $withdraw->status === 'pending') {
                // 1. Check if user still has the money (prevents negative balance)
                if ($withdraw->user->balance < $withdraw->request_amount_coin) {
                    session()->flash('error', 'User has insufficient balance to approve this request.');
                    return;
                }

                // 2. Update status
                $withdraw->update(['status' => 'approved']);

                // 3. Deduct the balance now (Deduct on Approval logic)
                $withdraw->user->decrement('balance', $withdraw->request_amount_coin);

                session()->flash('success', 'Withdrawal serial: ' . $withdraw->serial_no . ' approved and balance deducted.');
            }
        });
    }

    public function cancel($id)
    {
        $withdraw = Withdraw::find($id);
        if ($withdraw && $withdraw->status === 'pending') {
            // Updated to 'canceled' with one "l" to match your system
            $withdraw->update(['status' => 'canceled']);
            session()->flash('success', 'Withdrawal serial: ' . $withdraw->serial_no . ' has been canceled.');
        }
    }

    public function render()
    {
        return view('livewire.admin.withdraw.pending-withdraw', [
            // Using pagination is better practice for admin panels in 2026
            'withdrawals' => Withdraw::where('status', 'pending')->latest()->paginate(20)
        ]);
    }
}
