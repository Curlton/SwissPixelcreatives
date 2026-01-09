<?php

namespace App\Livewire\User\Topup;
use Livewire\Attributes\Title;
use Livewire\Component;

class Payment extends Component
{
    #[Title('Payment')]
    public $method;
    public $selectedAmount = 0; // Default amount

    public function mount($method)
    {
        $this->method = $method;
    }

    // This method is triggered when an amount button is clicked
    public function selectAmount($amount)
    {
        $this->selectedAmount = $amount;
    }

    // This method handles the "Proceed" action
    public function proceedToConfirmation()
    {
        if ($this->selectedAmount < 10) {
            session()->flash('error', 'Minimum transaction is 10.');
            return;
        }

        // Redirect to the next final confirmation page with the selected amount
        return redirect()->route('user.topup.confirm', [
            'method' => $this->method,
            'amount' => $this->selectedAmount
        ]);
    }

    public function render()
    {
        return view('livewire.user.topup.payment')
            ->layout('components.layouts.site');
    }
}

