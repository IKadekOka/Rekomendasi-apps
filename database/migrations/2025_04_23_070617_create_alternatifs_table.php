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
        Schema::create('alternatifs', function (Blueprint $table) {
            $table->id(); // primary key auto increment
            $table->string('nama', 100);
            $table->string('lokasi', 255);
            $table->foreignId('kategori_id')->constrained('kategori')->onDelete('cascade')->onUpdate('cascade');
            $table->decimal('latitude', 18, 15);
            $table->decimal('longitude', 18, 15);            
            $table->string('gambar');            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatifs');
    }
};
