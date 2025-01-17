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
        Schema::create('riwayat_kesehatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('dokter_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('diagnosa');
            $table->date('tanggal');
            $table->string('tindakan');
            $table->string('obat');
            $table->string('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_kesehatans');
    }
};
