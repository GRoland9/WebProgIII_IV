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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id(); // Egyedi azonosító
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Kapcsolat az users táblával
            $table->decimal('total_amount', 10, 2); // Teljes összeg (maximum 10 számjegy, ebből 2 tizedesjegy)
            $table->timestamp('transaction_date'); // Tranzakció dátuma
            $table->timestamps(); // Laravel időbélyegek (created_at, updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions'); // Tábla törlése
    }
};
