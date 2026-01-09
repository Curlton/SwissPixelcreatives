<?php
namespace App\Livewire\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class ServiceContact extends Component
{
    #[Title('service')]
    // International format: country code + number (no +, no spaces)
    public $whatsappNumber = '18506931231';
    public $whatsappNumber1 = '4571410230';
    public $telegramUsername = '@CLVSN';

    public function render()
    {
        return view('livewire.user.service-contact')
           ->layout('components.layouts.site');
    }
}
