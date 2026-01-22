<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MembershipLevel; // Ensure your model is imported

class MembershipLevelUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            3 => 350,
            4 => 500,
            5 => 600,
        ];

        foreach ($levels as $id => $profit) {
            // Using updateOrCreate ensures it works even if the row needs to be created,
            // but for existing IDs, simple update is faster:
            MembershipLevel::where('id', $id)->update([
                'target_set_profit' => $profit
            ]);
        }
    }
}

