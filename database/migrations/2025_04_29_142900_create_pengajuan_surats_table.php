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
            $table->string('nomor_surat');
            $table->string('slug');
            $table->string('tipe_surat');
            $table->foreignId('struktur_id')->constrained('strukturs')->cascadeOnDelete();
            $table->foreignId('tujuan_surat_id')->constrained('tujuan_surats')->cascadeOnDelete();
            // $table->json('tandatangan')->nullable();
            $table->enum('status', ['ditinjau', 'disetujui', 'ditolak'])->default('ditinjau');
            $table->char('user_id', 26);
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->json('detail_surat')->nullable();
            
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
