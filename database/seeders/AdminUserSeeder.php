<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;   

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'user_image' => 'default.png',
            'username' => 'Toni',
            'email' => 'toni21@gmail.com',
            'password' => Hash::make('toni12345'),
            
        ]);
    }
}
