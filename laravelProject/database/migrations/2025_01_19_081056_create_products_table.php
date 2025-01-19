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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Egyedi azonosító
            $table->string('name'); // Termék neve
            $table->decimal('price', 10, 2); // Ár
            $table->integer('stock'); // Készlet
            $table->timestamps(); // created_at és updated_at mezők
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
