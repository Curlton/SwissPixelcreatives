<?php
namespace App\Livewire\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class ServiceContact extends Component
{
    #[Title('service')]
    // International format: country code + number (no +, no spaces)
    public $whatsappNumber = '15715442498';
    public $whatsappNumber1 = '4591461186';
    public $telegramUsername = '@CLVSN';

    public function render()
    {
        return view('livewire.user.service-contact')
           ->layout('components.layouts.site');
    }
}
