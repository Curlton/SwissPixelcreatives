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
    Schema::create('membership_levels', function (Blueprint $table) {
        $table->id();
        $table->string('level_name'); // e.g., Bronze, Silver
        $table->decimal('target_set_profit', 10, 2); // e.g., 14.00, 28.00
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_levels');
    }
};
