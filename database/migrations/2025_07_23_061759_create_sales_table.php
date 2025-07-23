<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('motor_id')->constrained()->onDelete('cascade');
            $table->foreignId('customer_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Sales person
            $table->decimal('sale_price', 15, 2);
            $table->decimal('discount', 15, 2)->default(0);
            $table->decimal('final_price', 15, 2);
            $table->enum('payment_method', ['cash', 'transfer', 'credit']);
            $table->enum('status', ['pending', 'completed', 'cancelled']);
            $table->text('notes')->nullable();
            $table->date('sale_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
