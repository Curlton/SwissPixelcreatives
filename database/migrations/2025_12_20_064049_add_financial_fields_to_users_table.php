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
        Schema::table('users', function (Blueprint $table) {
        // Use decimal or double for currency precision
        $table->decimal('balance', 10, 2)->default(0.00)->after('membership_level');
        $table->decimal('today_profit', 10, 2)->default(0.00)->after('balance');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('balance');
        $table->dropColumn('today_profit');
    });
    }
};
