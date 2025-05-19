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
            $table->string('tipe_surat');
            $table->foreignId('struktur_id')->constrained('strukturs')->cascadeOnDelete();
            $table->string('nomor_surat');
            $table->foreignId('pengesahan_id')->constrained('pengesahans')->cascadeOnDelete();
            $table->text('nama_kegiatan');
            $table->text('tujuan_kegiatan');
            $table->date('tanggal_pelaksana');
            $table->date('tanggal_selesai')->nullable();
            $table->time('waktu_pelaksana');
            $table->time('waktu_selesai');
            $table->string('tempat_pelaksana');
            $table->string('nama_cp');
            $table->string('nomor_cp');
            $table->string('slug');
            $table->enum('status', ['ditinjau', 'disetujui', 'ditolak'])->default('ditinjau');
            $table->json('tandatangan')->nullable();
            $table->json('lampiran')->nullable();
            $table->char('user_id', 26);
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            
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
