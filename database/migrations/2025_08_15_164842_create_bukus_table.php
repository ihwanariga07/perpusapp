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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id('id_buku'); // Primary Key
            $table->string('judul_buku', 255);
            $table->string('penulis', 255);
            $table->unsignedBigInteger('kategori_id'); // Foreign Key
            $table->string('cover_buku', 255)->nullable(); // simpan nama file gambar
            $table->timestamps();

             // Relasi Foreign Key
            $table->foreign('kategori_id')
              ->references('id_kategori')
              ->on('kategori_bukus')
              ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
