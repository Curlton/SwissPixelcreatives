<?php

namespace App\Livewire\User\Topup;
use Illuminate\Support\Str;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
class Confirm extends Component
{
    #[Title('Confirm')]
    public $method;
    public $amount;
    public $walletAddress;
    public $trxID;

    public function mount($method, $amount)
    {
        // 1. Assign basic variables
        $this->method = $method;
        $this->amount = $amount;

        // 2. Fetch wallet address with Case-Insensitive search 
        // This handles "USDT", "ETH ERC20", etc. even if the URL case is different.
        $paymentData = DB::table('payment_methods')
            ->whereRaw('TRIM(LOWER(method_name)) LIKE ?', ['%' . strtolower(trim($method)) . '%'])
            ->first();

        // 3. Assign address or fallback message
        if ($paymentData && !empty($paymentData->wallet_address)) {
            $this->walletAddress = trim($paymentData->wallet_address);
        } else {
            $this->walletAddress = 'No wallet found for ' . $method;
        }
    }

    public function confirmPayment()
    {
         // 1. Validate against 'trans_id'
    $this->validate([
        'trxID' => 'required|min:10|unique:deposits,trans_id',
    ], [
        'trxID.required' => 'Please provide the Transaction ID.',
        'trxID.unique' => 'This Transaction ID has already been submitted.'
    ]);

    // 2. Generate a professional Serial/Order ID (e.g., DEP-20251222-XXXX)
    $orderId = 'ORD-' . strtoupper(Str::random(10));
    $serialNo = 'SRL-' . now()->format('Ymd') . '-' . rand(1000, 9999);

    // 3. Insert using your exact table fields
    \App\Models\Deposit::create([
        'user_id'         => auth()->id(),
        'username'        => auth()->user()->username,
        'serial_no'       => $serialNo,
        'order_id'        => $orderId,
        'trans_id'        => $this->trxID,
        'type'            => 'recharge', // or $this->method
        'wallet_address'  => $this->walletAddress,
        'amount_coins'    => $this->amount, // Your selected coins (500, 1K, etc.)
        'status'          => 'pending',
        'rate'            => 1, // Add your conversion rate if applicable
        'amount_usd_taka' => $this->amount, // Usually same as amount_coins for USDT
    ]);

    session()->flash('success', 'Payment submitted! Please wait for admin approval.');
    return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.user.topup.confirm')
            ->layout('components.layouts.site');
    }
}
