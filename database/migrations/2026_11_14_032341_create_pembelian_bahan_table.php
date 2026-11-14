<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('pembelian_bahan', function (Blueprint $table) {
            $table->id('id_pembelian');
            $table->unsignedBigInteger('id_supplier');
            $table->foreign('id_supplier')->references('id_supplier')->on('supplier');
            $table->unsignedBigInteger('id_manajer');
            $table->foreign('id_manajer')->references('id')->on('users');
            $table->date('tanggal_pembelian');
            $table->decimal('total_pembelian', 12, 2);
            $table->string('status_pembelian');
            $table->text('catatan_pengajuan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembelian_bahan');
    }
};
