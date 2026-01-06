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
            // Adding user_id as a foreign key that can be null for standard products
              $table->unsignedBigInteger('user_id')->nullable()->after('id');
        
        // Optional: Add index for faster lookups
               $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_sets', function (Blueprint $table) {
            //
            $table->dropColumn('user_id');
        });
    }
};
