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
        Schema::create('pkls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('guru_id');
            $table->unsignedBigInteger('industri_id');
            //$table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            //$table->foreignId('industri_id')->constrained('industris')->onDelete('cascade');
            //$table->foreignId('guru_id')->constrained('gurus')->onDelete('cascade');
            $table->date('mulai');
            $table->date('selesai');
            $table->timestamps();

            $table->foreign('siswa_id')->references('id')->on('siswas')->onDelete('cascade');
            $table->foreign('guru_id')->references('id')->on('gurus')->onDelete('cascade');
            $table->foreign('industri_id')->references('id')->on('industris')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pkls');
    }
};
