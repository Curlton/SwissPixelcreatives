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
            if (Schema::hasColumn('data_sets', 'product_image_url')) {
            $table->dropColumn('product_image_url');
        }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_sets', function (Blueprint $table) {
            //
            $table->text('product_image_url')->nullable();
        });
    }
};
