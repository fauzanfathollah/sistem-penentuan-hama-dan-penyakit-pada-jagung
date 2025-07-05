<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGejalasTable extends Migration
{
    public function up()
    {
        Schema::create('gejalas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('warna_daun');
            $table->string('bentuk_bercak');
            $table->string('bagian_terinfeksi');
            $table->string('kondisi_lingkungan');
            $table->string('status_verifikasi')->default('Menunggu');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gejalas');
    }
}
