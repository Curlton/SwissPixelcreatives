<?php

namespace App\Livewire\Admin\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Session; // Best practice for clarity

#[Layout('components.layouts.admin-auth')] 
class Login extends Component
{
    public $email; 
    public $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // CRITICAL: Explicitly use the 'admin' guard
        if (Auth::guard('admin')->attempt(['email' => $this->email, 'password' => $this->password])) {
            Session::regenerate();
            
            // Use redirect()->route() for a cleaner transition in 2025
            return redirect()->route('admin.dashboard');
        }

        $this->addError('email', 'These credentials do not match our admin records.');
        $this->reset('password'); // Security best practice: clear password on failure
    }

    public function render()
    {
        return view('livewire.admin.auth.login');
    }
}