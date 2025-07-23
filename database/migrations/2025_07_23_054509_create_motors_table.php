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
        Schema::create('motors', function (Blueprint $table) {
            $table->id();
            $table->string('nama_motor');
            $table->string('tipe_motor');
            $table->year('tahun');
            $table->integer('km');
            $table->decimal('harga');
            $table->string('gambar')->nullable(); // Assuming 'gambar' is an image path
            $table->enum('status', ['Tersedia', 'Habis'])->default('available'); // Assuming 'status' can be one of these values
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motors');
    }
};
