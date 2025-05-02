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
        Schema::create('pengajuan_surats', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['SIk', 'SPm', 'ST', 'Spe', 'Und', 'Peng', 'SM']);
            $table->enum('departemen', ['Agm', 'Kpm', 'Min', 'Hum', 'Rt', 'Dan']);
            $table->string('nomor_surat');
            $table->string('lampiran')->default('-');
            $table->string('perihal');
            $table->string('tertuju');
            $table->text('isi');
            $table->date('tanggal_pelaksana');
            $table->date('tanggal_selesai');
            $table->time('waktu_pelaksana');
            $table->time('waktu_selesai');
            $table->string('tempat_pelaksana');
            $table->string('nama_cp');
            $table->string('nomor_cp');
            $table->string('slug');
            $table->enum('status', ['ditinjau', 'disetujui', 'ditolak', 'diproses'])->default('ditinjau');

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
        Schema::dropIfExists('pengajuan_surats');
    }
};
