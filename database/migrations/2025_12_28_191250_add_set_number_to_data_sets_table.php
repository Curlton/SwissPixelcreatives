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
        Schema::table('data_sets', function (Blueprint $table) {
            //
            // Adding set_number as an integer, defaulting to 1
        $table->integer('set_number')->default(1)->after('is_custom');
        
        // Optional: Add an index for faster queries since you'll be filtering by it often
        $table->index(['user_id', 'set_number']);
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_sets', function (Blueprint $table) {
            //
            $table->dropColumn('set_number');
        });
    }
};
