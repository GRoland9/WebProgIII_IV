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
        Schema::create('transaction_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->constrained('transactions')->onDelete('cascade'); // Tranzakcióhoz kapcsolódik
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Termékhez kapcsolódik
            $table->integer('quantity'); // Vásárolt mennyiség
            $table->decimal('subtotal', 10, 2); // Részösszeg
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_products');
    }
};
