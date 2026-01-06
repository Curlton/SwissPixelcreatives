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
        Schema::create('data_sets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('product_id');
            $table->string('product_desc');
            $table->decimal('price', 10, 2);
            $table->decimal('profit', 10, 2);
            $table->text('product_image_url')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_sets');
    }
};
