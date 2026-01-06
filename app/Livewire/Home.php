<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;

class Home extends Component
{
    /**
     * Optional: Set the browser tab title for 2025 Livewire 3+
     */
    #[Title('SwissPixel | Professional Agency')] 
    
    public function render()
    {
        /**
         * This renders 'resources/views/livewire/home.blade.php'
         * .layout('home') tells Livewire to wrap this inside 'resources/views/home.blade.php'
         */
        return view('livewire.home')
            ->layout('components.layouts.home'); 
    }
}