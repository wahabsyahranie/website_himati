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
        Schema::create('pengesahans', function (Blueprint $table) {
            $table->id();
            $table->string('jabatan');
            $table->integer('prioritas');
            $table->string('sumberable_type');
            $table->integer('sumberable_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengesahans');
    }
};
