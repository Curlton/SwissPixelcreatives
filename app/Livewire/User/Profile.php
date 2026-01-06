<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Profile extends Component
{
    public $current_password, $new_password, $new_password_confirmation;

    // Handle Password Change
    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required|current_password',
            'new_password' => 'required|min:8|confirmed',
        ]);

        Auth::user()->update([
            'password' => Hash::make($this->new_password)
        ]);

        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
        session()->flash('success', 'Password updated successfully!');
    }

    // Handle Logout
    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    }

    public function render()
{
    $user = auth()->user();
    $teamCount = \App\Models\User::where('referred_by', $user->id)->count();

    return view('livewire.user.profile', [
        'user' => $user,
        'teamCount' => $teamCount
    ])->layout('components.layouts.site'); // This points to views/components/layouts/dashboard.blade.php
}

}
