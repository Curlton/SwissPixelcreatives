<?php

namespace App\Livewire;
use Livewire\Attributes\Title;
use Livewire\Component;

class TermsAndConditions extends Component
{
    #[Title('Terms & Conditions')]

    public function render()
    {
        
        return view('livewire.terms-and-conditions')
            ->layout('components.layouts.site'); // Uses your site-wide layout
    }
}
