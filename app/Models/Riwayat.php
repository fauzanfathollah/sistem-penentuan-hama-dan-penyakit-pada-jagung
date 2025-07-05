<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'warna_daun',
        'bentuk_bercak',
        'bagian_terinfeksi',
        'kondisi_lingkungan',
        'status_verifikasi',
    ];

    // CAST: mengubah kolom array jadi JSON dan sebaliknya
    protected $casts = [
        'warna_daun' => 'array',
        'bentuk_bercak' => 'array',
        'bagian_terinfeksi' => 'array',
        'kondisi_lingkungan' => 'array',
    ];

    /**
     * Relasi satu ke satu (one-to-one) ke hasil keputusan.
     * Diasumsikan field foreign key `riwayat_id` ada di tabel hasil_keputusans
     */
    public function hasilKeputusan()
    {
        return $this->hasOne(HasilKeputusan::class, 'riwayat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
