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
        Schema::create('hasil_moora', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alternatif_id'); // ✅ Buat kolom foreign key terlebih dahulu
            $table->integer('ranking');
            $table->float('skor');
            $table->timestamps();
    
            // ✅ Lalu buat foreign key-nya, dan pastikan referensinya ke 'alternatif'
            $table->foreign('alternatif_id')->references('id')->on('alternatifs')->onDelete('cascade')->onUpdate('cascade');
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_moora');
    }
};
