<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilKeputusansTable extends Migration
{
    public function up()
    {
        Schema::create('hasil_keputusans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->text('gejala');
            $table->string('penyakit');
            $table->string('solusi');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hasil_keputusans');
    }
}
