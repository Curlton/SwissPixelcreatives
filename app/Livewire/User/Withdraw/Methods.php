<?php

namespace App\Livewire\User\Withdraw;

use Livewire\Component;
use Livewire\Attributes\Title;
class Methods extends Component
{
    #[Title('Method')]
    public function render()
    {
        
        return view('livewire.user.withdraw.methods')
            ->layout('components.layouts.site'); // Using your new "nice" layout
    }
}
