<?php
namespace App\Livewire\Admin\Withdraw;

use App\Models\Withdraw; 
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Log;

#[Layout('components.layouts.admin')]
class AllWithdraw extends Component
{
    public function approve($id)
{
    $withdraw = Withdraw::find($id);

    if ($withdraw && $withdraw->status === 'pending') {
        // 1. Update the withdrawal status
        $withdraw->update(['status' => 'approved']);

        // 2. Deduct the amount from the user's balance now
        // This ensures the money only leaves their account upon admin approval
        Log::info("Balance deducted for user ID: {$withdraw->user_id}");
        $withdraw->user->decrement('balance', $withdraw->request_amount_coin);

        session()->flash('success', 'Withdrawal serial: ' . $withdraw->serial_no . ' approved and balance deducted.');
    } else {
        Log::warning("Approval failed for ID: {$id}. Status was not pending or record not found.");
        session()->flash('error', 'Withdrawal already processed or not found.');
    }
}


    public function cancel($id)
    {
        $withdraw = Withdraw::find($id);
        if ($withdraw && $withdraw->status === 'pending') {
            $withdraw->update(['status' => 'canceled']);
            session()->flash('success', 'Withdrawal serial: '.$withdraw->serial_no.' canceled.');
        }
    }

    public function render()
    {
        return view('livewire.admin.withdraw.all-withdraw', [
            'withdrawals' => Withdraw::latest()->get()
        ]);
    }
}
