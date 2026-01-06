<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->id();

            // Relationships and Identifiers
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('serial_no'); 
            $table->string('order_id')->unique();
            $table->string('trans_id')->nullable()->unique(); // Transaction hash/ID

            // Account Details
            $table->string('type')->default('usdt');
            $table->string('wallet_address');
            $table->string('acct_no')->default('ETH ERC20'); // Default to Ethereum network

            // Financial Data (use decimal for precision)
            $table->decimal('amount_coins', 15, 8); // Use higher precision for crypto
            $table->decimal('rate', 15, 8); // Current exchange rate
            $table->decimal('amount_usd_taka', 15, 2); // Amount in fiat currency

            // Status and Actionability
            $table->enum('status', ['pending', 'approved', 'cancelled'])->default('pending');
            // Actions (Approve/Cancel) will be handled by Livewire UI logic, not a DB field.

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deposits');
    }
};
