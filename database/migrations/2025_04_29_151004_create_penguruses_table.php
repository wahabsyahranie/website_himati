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
        Schema::create('penguruses', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_induk');
            $table->string('jabatan');
            $table->year('periode');
            $table->foreignId('struktur_id')->references('id')->on('strukturs')->cascadeOnDelete();
            $table->enum('status', ['pengurus', 'keluar', 'alb'])->default('pengurus');
            $table->string('gambar')->default('departemen/departemen-qbQIjK0LJCo6t0eut6z8RXHOpegfEKYegn3jbfFm.jpg');
            $table->timestamps();

            $table->char('user_id', 26);
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penguruses');
    }
};
