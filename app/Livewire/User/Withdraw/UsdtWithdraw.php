<?php

namespace App\Livewire\User\Withdraw;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Withdraw;

class UsdtWithdraw extends Component
{
    public $wallet_address;
    public $amount = 10;

    public function withdraw()
    {
        $user = Auth::user()->fresh();

        // 1. Calculate pending withdrawals to determine true available balance
        $pendingWithdrawals = Withdraw::where('user_id', $user->id)
            ->where('status', 'pending')
            ->sum('request_amount_coin');

        $availableBalance = $user->balance - $pendingWithdrawals;

        // 2. Run Validation
        $this->validate([
            'wallet_address' => 'required|min:10',
            'amount' => 'required|numeric|min:10|max:' . $availableBalance,
        ], [
            'amount.max' => 'Insufficient available balance. (Pending: $' . number_format($pendingWithdrawals, 2) . ')',
            'amount.min' => 'Minimum withdrawal is $10.00.'
        ]);

        // 3. Final Security Guard (Double-check balance before DB entry)
        if ($this->amount > $availableBalance) {
            session()->flash('error', 'Security Alert: Insufficient funds available.');
            return redirect()->route('dashboard');
        }

        // 4. Financial Calculations
        $pondage_percent = 6.00; // 6% Service Fee
        $rate = 1; 
        
        $charge_coin = ($this->amount * $pondage_percent) / 100;
        $net_amount = $this->amount - $charge_coin;
        $amount_payable_taka = $net_amount * $rate;

        // 5. Create Withdrawal Record
        Withdraw::create([
            'user_id'             => $user->id,
            'username'            => $user->username,
            'request_amount_coin' => $this->amount,
            'wallet_address'      => $this->wallet_address,
            'status'              => 'pending', // Matches Admin panel filter
            'acct_no'             => 'USDT (TRC20)',
            'pondage_percent'     => $pondage_percent,
            'charge_coin'         => $charge_coin,
            'rate'                => $rate,
            'amount_payable_taka' => $amount_payable_taka,
        ]);

        // 6. Success Feedback
        // The updated site.blade.php script will pick this 'success' flash up after redirect
        session()->flash('success', 'Withdrawal request submitted! Pending admin review.');

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.user.withdraw.usdt-withdraw', [
            'balance' => Auth::user()->balance
        ])->layout('components.layouts.site');
    }
}
