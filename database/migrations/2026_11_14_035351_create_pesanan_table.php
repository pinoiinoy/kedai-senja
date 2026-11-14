
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('id_pesanan');

            // Relasi ke tabel users
            $table->foreignId('id_user')
                ->constrained('users', 'id')
                ->restrictOnDelete();

            // Nomor meja (1-10)
            $table->unsignedTinyInteger('nomor_meja')->nullable();

            // Metode pembayaran: Tunai atau QRIS
            $table->string('metode_pembayaran');

            // Status pesanan
            $table->string('status')->default('Baru');

            // Ringkasan biaya pesanan
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('biaya_layanan', 12, 2)->default(0);
            $table->decimal('pajak', 12, 2)->default(0);
            $table->decimal('total', 12, 2)->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
