<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // 1. Remove the unwanted columns
            // Check if they exist first to avoid "column not found" errors
            if (Schema::hasColumn('users', 'membership_level')) {
                $table->dropColumn('membership_level');
            }
            if (Schema::hasColumn('users', 'membership_level_id')) {
                $table->dropColumn('membership_level_id');
            }

            // 2. Ensure membership_id exists and is correctly typed
            // If you already have it from the previous failed migration, we skip adding it
            if (!Schema::hasColumn('users', 'membership_id')) {
                $table->foreignId('membership_id')->default(1)->constrained('membership_levels');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('membership_level')->nullable();
            $table->unsignedBigInteger('membership_level_id')->nullable();
        });
    }
};
