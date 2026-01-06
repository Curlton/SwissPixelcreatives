<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout; // For using the cloned layout
use Livewire\Attributes\Title;  // To set the page title

#[Title('Login - SwissPixel')]
class Login extends Component
{
    public $username;
    public $password;
    public $captcha_input;
    public $captcha_code;

    protected $rules = [
        'username' => 'required|string',
        'password' => 'required|string',
        'captcha_input' => 'required|string',
    ];

    public function mount()
    {
        // Redirect if already logged in (standard professional practice)
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        $this->generateCaptcha();
    }

    public function generateCaptcha()
    {
        $this->captcha_code = strtoupper(Str::random(4));
        Session::put('captcha', $this->captcha_code);
        $this->captcha_input = '';
    }

    public function login()
    {
        $this->validate();

        // 1. Verify Captcha
        if ($this->captcha_input !== Session::get('captcha')) {
            $this->addError('captcha_input', 'Invalid captcha.');
            $this->generateCaptcha();
            return;
        }

        // 2. Attempt Authentication
        if (Auth::guard('web')->attempt(['username' => $this->username, 'password' => $this->password])) {
            session()->regenerate();
            return redirect()->route('dashboard');
        }

        // 3. Handle Failure
        $this->addError('username', 'Invalid credentials.');
        $this->reset('password');
        $this->generateCaptcha(); 
    }

    /**
     * Use the cloned layout file. 
     * Ensure this file exists at resources/views/components/layouts/home.blade.php
     */
    #[Layout('components.layouts.home')] 
    public function render()
    {
        return view('livewire.auth.login');
    }
}
