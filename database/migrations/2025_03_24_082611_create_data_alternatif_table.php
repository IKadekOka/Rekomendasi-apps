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
        Schema::create('data_alternatif', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wisata',50);
            $table->string('kategori',50);
            $table->integer('harga_tiket');
            $table->integer('estimasi_transport');
            $table->integer('estimasi_penginapan');
            $table->integer('konsumsi');
            $table->string('parkir');
            $table->string('toilet');
            $table->string('tempat_difabel');
            $table->integer('jarak');
            $table->string('tersedia_transportasi');
            $table->string('kondisi_jalan');
            $table->float('rating');
            $table->integer('jumlah_kunjungan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_alternatif');
    }
};
