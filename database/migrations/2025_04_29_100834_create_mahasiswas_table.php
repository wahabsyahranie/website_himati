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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->ulid('id');
            $table->string('nim');
            $table->string('nama');
            $table->string('email');
            $table->string('password');
            $table->year('tahun_masuk');
            $table->string('nomor_telepon');
            $table->enum('prodi', ['TI', 'TK', 'TIM', 'TRK']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
