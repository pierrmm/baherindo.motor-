<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('motors', function (Blueprint $table) {
            $table->id();
            $table->string('brand'); // Honda, Yamaha, Suzuki, etc.
            $table->string('model'); // Beat, Mio, Nex, etc.
            $table->year('year');
            $table->string('color');
            $table->integer('mileage'); // KM
            $table->decimal('price', 15, 2);
            $table->enum('condition', ['excellent', 'good', 'fair', 'poor']);
            $table->enum('status', ['available', 'sold', 'reserved']);
            $table->text('description')->nullable();
            $table->string('engine_capacity')->nullable(); // 110cc, 125cc, etc.
            $table->string('transmission')->nullable(); // Manual, Automatic
            $table->string('fuel_type')->default('petrol');
            $table->json('images')->nullable(); // Array of image paths
            $table->string('license_plate')->nullable();
            $table->date('purchase_date')->nullable();
            $table->decimal('purchase_price', 15, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('motors');
    }
};
