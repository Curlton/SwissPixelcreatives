<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('Register - SwissPixel')]
class Register extends Component
{
    public $username, $phone_no, $email, $password, $password_confirmation;
    public $referral_code, $captcha_code, $captcha_input;

    protected $rules = [
        'username' => 'required|min:4|unique:users,username',
        'phone_no' => 'required|min:10|unique:users,phone_no',
        'email'    => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
        'captcha_input' => 'required',
    ];

    public function mount()
    {
        $this->generateCaptcha();
    }

    public function generateCaptcha()
    {
        // Generates a 4-character alphanumeric code for the distorted captcha
        $this->captcha_code = strtoupper(Str::random(4));
        Session::put('captcha', $this->captcha_code);
        $this->captcha_input = '';
    }

    public function register()
    {
        $this->validate();

        if (strtoupper($this->captcha_input) !== Session::get('captcha')) {
            $this->addError('captcha_input', 'The verification code is incorrect.');
            $this->generateCaptcha();
            return;
        }

        // Generate unique referral code for the new user
        do {
            $new_user_code = strtoupper(Str::random(6));
        } while (User::where('referral_code', $new_user_code)->exists());

        User::create([
            'username'       => $this->username,
            'phone_no'       => $this->phone_no,
            'email'          => $this->email,
            'password'       => Hash::make($this->password),
            'referral_code'  => $new_user_code,
            'referred_by'    => $this->referral_code,
            'balance'        => 0.00,
            'current_set_id' => 1,
            'is_set_locked'  => false,
        ]);

        session()->flash('success', 'Registration successful! Your referral code is: ' . $new_user_code);
        return redirect()->route('login');
    }

    #[Layout('components.layouts.home')] 
    public function render()
    {
        return view('livewire.auth.register');
    }
}
