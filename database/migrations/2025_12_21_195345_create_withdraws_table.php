<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('withdraws', function (Blueprint $table) {
            $table->id();

            // Relationships and Identifiers
            $table->string('serial_no'); 
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('username')->nullable(); // For audit logs

            // Account Details
            $table->string('acct_no')->default('ETH ERC20'); // Default to Ethereum network
            $table->string('wallet_address');
            $table->text('note')->nullable(); // User's note or reason

            // Financial Data (use decimal for precision)
            $table->decimal('request_amount_coin', 15, 8); 
            $table->decimal('pondage_percent', 5, 2); // Percentage (e.g., 5.00)
            $table->decimal('charge_coin', 15, 8); // Calculated charge
            $table->decimal('rate', 15, 8); // Current exchange rate
            $table->decimal('amount_payable_taka', 15, 2); // Amount in Taka/USD

            // Status and Actionability
            $table->enum('status', ['pending', 'approved', 'cancelled'])->default('pending');
            // Action (Approve/Cancel) will be handled by Livewire UI logic, not a DB field.

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('withdraws');
    }
};
