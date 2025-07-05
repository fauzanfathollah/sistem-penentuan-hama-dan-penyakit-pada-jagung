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
    Schema::create('gejala_pilihans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kriteria_id')->constrained('kriterias')->onDelete('cascade'); // tambahkan ini
        $table->string('nama');
        $table->timestamps();
    });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gejala_pilihans');
    }
};
