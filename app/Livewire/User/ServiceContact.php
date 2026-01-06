<?php
namespace App\Livewire\User;

use Livewire\Component;

class ServiceContact extends Component
{
    // International format: country code + number (no +, no spaces)
    public $whatsappNumber = '256782451499'; 
    public $telegramUsername = '@Curltonii';

    public function render()
    {
        return view('livewire.user.service-contact')
           ->layout('components.layouts.site');
    }
}
