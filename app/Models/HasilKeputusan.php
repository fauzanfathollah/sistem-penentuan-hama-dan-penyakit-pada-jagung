<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilKeputusan extends Model
{
    use HasFactory;

    protected $table = 'hasil_keputusans';

    protected $fillable = [
        'tanggal', 'gejala', 'penyakit', 'solusi'
    ];

    public function riwayat()
{
    return $this->belongsTo(Riwayat::class, 'riwayat_id');
}

}
