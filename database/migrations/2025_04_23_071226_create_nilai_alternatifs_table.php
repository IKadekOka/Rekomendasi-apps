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
        Schema::create('nilai_alternatifs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kriteria_id');
            $table->unsignedBigInteger('alternatif_id');
            $table->unsignedBigInteger('subkriteria_id');
            $table->string('nilai');
            $table->timestamps();

            $table->foreign('kriteria_id')->references('id')->on('kriteria')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('alternatif_id')->references('id')->on('alternatifs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('subkriteria_id')->references('id')->on('sub_kriterias')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_alternatifs');
    }
};
