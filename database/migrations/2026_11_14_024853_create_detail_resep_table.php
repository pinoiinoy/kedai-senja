<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_resep', function (Blueprint $table) {
            $table->id('id_detail_resep');
            $table->unsignedBigInteger('id_resep');
            $table->foreign('id_resep')->references('id_resep')->on('resep');
            $table->unsignedBigInteger('id_bahan');
            $table->foreign('id_bahan')->references('id_bahan')->on('bahan_baku');
            $table->decimal('jumlah_kebutuhan', 10, 2);
            $table->string('satuan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_resep');
    }
};
