<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('resep', function (Blueprint $table) {
            $table->id('id_resep');
            $table->unsignedBigInteger('id_menu');
            $table->foreign('id_menu')->references('id_menu')->on('menu');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('resep');
    }
};
