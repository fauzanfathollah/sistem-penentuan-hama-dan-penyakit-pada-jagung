<?php

// database/migrations/xxxx_xx_xx_create_pengetahuans_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
    Schema::create('pengetahuans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kriteria_id')->constrained('kriterias')->onDelete('cascade');
        $table->foreignId('gejala_pilihan_id')->nullable()->constrained('gejala_pilihans')->onDelete('cascade');
        $table->string('gejala');
        $table->decimal('nilai', 5, 2); // bobot nilai AHP
        $table->timestamps();
    });

    }

    public function down(): void {
        Schema::dropIfExists('pengetahuans');
    }
};
