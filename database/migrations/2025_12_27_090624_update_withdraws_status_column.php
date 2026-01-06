<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //
        Schema::table('withdraws', function (Blueprint $table) {
            // This allows the column to accept 'approved' and 'canceled'
            $table->enum('status', ['pending', 'approved', 'canceled'])->default('pending')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('withdraws', function (Blueprint $table) {
            // Revert back to original if needed (adjust based on your original options)
            $table->enum('status', ['pending'])->default('pending')->change();
        });
    }
};
