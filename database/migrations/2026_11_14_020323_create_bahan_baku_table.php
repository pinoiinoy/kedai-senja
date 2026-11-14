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
        // Membuat tabel bahan_baku di database
        Schema::create('bahan_baku', function (Blueprint $table) {
            // menyimpan id_bahan seperti primary key dan auto increment
            $table->id('id_bahan');
            // Menyimpan nama bahan baku
            $table->string('nama_bahan');

            // menyimpan jumlah stok bahan baku
            $table->decimal('stok', 10, 2)->default(0);
            // menyimpan satuan bahan baku, seperti kg, gram, atau liter
            $table->string('satuan');
            // menyimpan batas minimum stok bahan baku
            $table->decimal('batas_minimum', 10, 2)->default(0);

            //menyimpan waktu data dibuat dan diperbarui
            $table->timestamps();
        });
    }

    /**
     * Membatalkan migrasi dengan menghapus tabel bahan_baku
     */
    public function down(): void
    {
        // menghapus tabel bahan_baku jika tabel tersedia
        Schema::dropIfExists('bahan_baku');
    }
};
