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
        // Adding profit back as a decimal, placed after the price column
        $table->decimal('profit', 10, 2)->nullable()->after('price');
    });
}

public function down(): void
{
    Schema::table('data_sets', function (Blueprint $table) {
        $table->dropColumn('profit');
    });
}

};
