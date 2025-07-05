<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('pengetahuans', function (Blueprint $table) {
            // Tambahkan kolom terlebih dahulu tanpa foreign key
            $table->unsignedBigInteger('penyakit_id')->after('id')->nullable();

            // Baru tambahkan foreign key secara terpisah agar tidak error jika ada data lama
            $table->foreign('penyakit_id')
                  ->references('id')
                  ->on('penyakits')
                  ->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::table('pengetahuans', function (Blueprint $table) {
            $table->dropForeign(['penyakit_id']);
            $table->dropColumn('penyakit_id');
        });
    }
};
