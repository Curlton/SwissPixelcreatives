<?php

namespace App\Livewire\User;

use Livewire\Component;
#[Title('SwissPixel | Dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.user.dashboard')
               ->layout('components.layouts.site');
    }
}
