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
        Schema::create('industris', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('bidang_usaha');
            $table->text('alamat');
            $table->string('kontak');
            $table->string('email')->nullable();
            //$table->foreignId('guru_pembimbing')->constrained('gurus')->onDelete('cascade');
            $table->unsignedBigInteger('guru_pembimbing');
            $table->foreign('guru_pembimbing')->references('id')->on('gurus')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('industris');
    }
};
