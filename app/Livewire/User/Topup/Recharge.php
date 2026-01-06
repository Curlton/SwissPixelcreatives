<?php

namespace App\Livewire\User\Topup;

use Livewire\Component;

class Recharge extends Component
{
    public function render()
    {
        return view('livewire.user.topup.recharge')
            ->layout('components.layouts.site'); // Using your new "nice" layout
    }
}
