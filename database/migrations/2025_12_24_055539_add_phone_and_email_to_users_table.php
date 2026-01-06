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
            //
            // Add phone_no if it doesn't exist
        if (!Schema::hasColumn('users', 'phone_no')) {
            $table->string('phone_no')->nullable()->after('username');
        }
        
        // Add email if it doesn't exist (Laravel default usually has it)
        if (!Schema::hasColumn('users', 'email')) {
            $table->string('email')->unique()->nullable()->after('phone_no');
        }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn(['phone_no', 'email']);
        });
    }
};
