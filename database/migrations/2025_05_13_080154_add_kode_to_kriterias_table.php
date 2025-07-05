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
    Schema::table('kriterias', function (Blueprint $table) {
        $table->string('kode')->after('id')->nullable(); // atau hilangkan nullable() jika wajib
    });
}

public function down()
{
    Schema::table('kriterias', function (Blueprint $table) {
        $table->dropColumn('kode');
    });
}

};
