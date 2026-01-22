<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembershipLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    // Use updateOrInsert to prevent duplicates if you run it again
    $levels = [
        ['id' => 1, 'level_name' => 'VIP 1 Bronze',   'target_set_profit' => 14.00],
        ['id' => 2, 'level_name' => 'VIP 2 Silver',   'target_set_profit' => 28.00],
        ['id' => 3, 'level_name' => 'VIP 3 Gold',     'target_set_profit' => 42.00],
        ['id' => 4, 'level_name' => 'VIP 4 Platinum', 'target_set_profit' => 56.00],
        ['id' => 5, 'level_name' => 'VIP 5 Diamond',  'target_set_profit' => 70.00],
    ];

    foreach ($levels as $level) {
        \App\Models\MembershipLevel::updateOrCreate(
            ['id' => $level['id']], 
            $level
        );
    }
}

}
