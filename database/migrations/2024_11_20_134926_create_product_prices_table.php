<?php

use App\Enums\ProductStatus;
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
        Schema::create('product_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('main_price');
            $table->integer('price');
            $table->integer('discount')->default(0);
            $table->integer('count')->default(0);
            $table->integer('max_sell')->default(0);
            $table->integer('viewed')->default(0);
            $table->integer('sold')->default(0);
            $table->string('status')->default(ProductStatus::Active->value);
            $table->foreignId('product_id')->constrained('products');
            $table->unsignedBigInteger('color_id')->nullable();
            $table->unsignedBigInteger('guaranty_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_prices');
    }
};
