<?php

namespace App\Livewire\User\Withdraw;

use Livewire\Component;

class Methods extends Component
{
    public function render()
    {
        
        return view('livewire.user.withdraw.methods')
            ->layout('components.layouts.site'); // Using your new "nice" layout
    }
}
