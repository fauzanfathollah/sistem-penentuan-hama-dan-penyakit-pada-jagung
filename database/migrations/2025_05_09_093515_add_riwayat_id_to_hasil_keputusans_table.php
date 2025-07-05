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
        Schema::table('hasil_keputusans', function (Blueprint $table) {
            $table->unsignedBigInteger('riwayat_id')->nullable()->after('id'); // Tambah kolom riwayat_id
    
            $table->foreign('riwayat_id')->references('id')->on('riwayats')->onDelete('cascade'); // Tambah foreign key
        });
    }
    
    public function down(): void
    {
        Schema::table('hasil_keputusans', function (Blueprint $table) {
            $table->dropForeign(['riwayat_id']); // Hapus foreign key dulu
            $table->dropColumn('riwayat_id');    // Baru hapus kolomnya
        });
    }
    
};
