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
            $table->enum('jabatan', ['ketua umum', 'wakil ketua umum', 'sekretaris umum', 'bendahara umum', 'kepala departemen', 'sekretaris departemen', 'anggota departemen']);
            $table->year('periode');
            $table->char('mahasiswa_id', 26);
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->cascadeOnDelete();
            $table->timestamps();
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
