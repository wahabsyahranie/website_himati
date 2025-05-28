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
        Schema::create('tandatangan_digitals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengesahan_id')->constrained('pengesahans')->cascadeOnDelete();
            $table->foreignId('pengajuan_surat_id')->constrained('pengajuan_surats')->cascadeOnDelete();
            $table->string('nomor_registrasi');
            $table->string('status')->default('diproses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tandatangan_digitals');
    }
};
