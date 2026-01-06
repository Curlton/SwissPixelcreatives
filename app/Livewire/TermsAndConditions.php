<?php

namespace App\Livewire;

use Livewire\Component;

class TermsAndConditions extends Component
{
    public function render()
    {
        return view('livewire.terms-and-conditions')
            ->layout('components.layouts.site'); // Uses your site-wide layout
    }
}
