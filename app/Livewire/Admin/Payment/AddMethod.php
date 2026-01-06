<?php

namespace App\Livewire\Admin\Payment;

use App\Models\PaymentMethod;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.admin')]
class AddMethod extends Component
{
    // Form properties
    public $method_name;
    public $wallet_address;
    public $status = 'active'; // Default status

    protected $rules = [
        'method_name' => 'required|string|max:255',
        'wallet_address' => 'required|string|min:10',
        'status' => 'required|in:active,inactive',
    ];

    public function save()
    {
        $this->validate();

        PaymentMethod::create([
            'method_name'    => $this->method_name,
            'wallet_address' => $this->wallet_address,
            'status'         => $this->status,
        ]);

        session()->flash('success', 'New payment method added successfully!');

        return $this->redirect(route('admin.payment.manage'), navigate: true);
    }

    public function render()
    {
        return view('livewire.admin.payment.add-method');
    }
}
