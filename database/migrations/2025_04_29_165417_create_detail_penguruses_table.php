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
        Schema::create('detail_penguruses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penguruses_id')->constrained('penguruses')->cascadeOnDelete();
            $table->enum('departemen', ['kpsdm', 'agama', 'minba', 'humed', 'danus', 'drt']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penguruses');
    }
};
