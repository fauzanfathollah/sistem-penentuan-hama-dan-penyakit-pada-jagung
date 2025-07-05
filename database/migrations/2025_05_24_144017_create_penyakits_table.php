<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('penyakits', function (Blueprint $table) {
        $table->id();
        $table->string('kode')->unique(); // tambahkan kolom kode
        $table->string('nama');
        $table->text('deskripsi')->nullable();
        $table->float('bobot'); // tambahkan kolom bobot
        $table->timestamps();
    });

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyakits');
    }
};
