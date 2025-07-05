<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusVerifikasiToGejalasTable extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('gejalas', 'status_verifikasi')) {
            Schema::table('gejalas', function (Blueprint $table) {
                $table->string('status_verifikasi')->default('Menunggu');
            });
        }
    }

    public function down()
    {
        Schema::table('gejalas', function (Blueprint $table) {
            $table->dropColumn('status_verifikasi');
        });
    }
}

