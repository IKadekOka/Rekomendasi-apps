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
        Schema::create('sub_kriterias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kriteria_id');
            $table->string('nama',50);
            $table->timestamps();

            $table->foreign('kriteria_id')->references('id')->on('kriteria')->onDelete('cascade')->onUpdate('cascade');;


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_kriterias');
    }
};
