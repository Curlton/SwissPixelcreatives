<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class EditUser extends Component
{
    public User $user;
    
    // Properties that will be bound to the form inputs
    public $username;
    public $phone;
    public $balance;
    public $status;
    public $password = ''; // Keep password empty by default

    /**
     * This method runs once when the component is first loaded.
     * It pre-fills the form with current database data.
     */
    public function mount(User $user)
    {
        $this->user = $user;
        
        // PRE-FILLING DATA
        $this->username = $user->username;
        $this->phone = $user->phone_no;
        $this->balance = $user->balance;
        $this->status = $user->status;

        $this->status = $user->status; 
    }

    public function update()
    {
        $this->validate([
            'username' => ['required', Rule::unique('users')->ignore($this->user->id)],
            'phone'    => 'required',
            'balance'  => 'required|numeric',
            'status'   => 'required|in:active,blocked',
            'password' => 'nullable|min:6',
        ]);

        $data = [
            'username' => $this->username,
            'phone_no'    => $this->phone,
            'balance'  => $this->balance,
            'status'   => $this->status,
        ];

        // Only hash and update password if the admin typed something new
        if (!empty($this->password)) {
            $data['password'] = Hash::make($this->password);
        }

        $this->user->update($data);

        session()->flash('success', 'User updated successfully!');
        return redirect()->route('admin.users.all');
    }

    public function render()
    {
        return view('livewire.admin.users.edit-user')
            ->layout('components.layouts.admin');
    }
}
