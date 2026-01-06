<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('email')->nullable();
            $table->string('password');
            $table->string('referral_code')->nullable()->unique();
            $table->string('membership_level')->default('VIP 1 Bronze');
            $table->unsignedBigInteger('referred_by')->nullable();
            $table->unsignedBigInteger('membership_level_id')->default(1); // VIP Bronze
            $table->rememberToken();
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
        
    }
};
