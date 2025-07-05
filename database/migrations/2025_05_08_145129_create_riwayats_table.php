<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiwayatsTable extends Migration
{
    public function up()
    {
        Schema::create('riwayats', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->json('warna_daun');             // ✅ ubah ke json
            $table->json('bentuk_bercak');          // ✅ ubah ke json
            $table->json('bagian_terinfeksi');      // ✅ ubah ke json
            $table->json('kondisi_lingkungan');     // ✅ ubah ke json
            $table->string('status_verifikasi')->default('Menunggu');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('riwayats');
    }
}
