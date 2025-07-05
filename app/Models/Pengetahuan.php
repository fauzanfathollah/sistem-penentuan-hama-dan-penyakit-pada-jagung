<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengetahuan extends Model
{
    // Tambahkan gejala_pilihan_id ke fillable agar bisa di-mass-assign
    protected $fillable = [
        'penyakit_id',
        'kriteria_id',
        'gejala',
        'nilai',
        'gejala_pilihan_id',
    ];

    // Relasi ke model Penyakit
    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class);
    }

    // Relasi ke model Kriteria
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    // Relasi ke model GejalaPilihan (menggunakan foreign key gejala_pilihan_id)
    public function gejalaPilihan()
    {
        return $this->belongsTo(GejalaPilihan::class, 'gejala_pilihan_id');
    }
}
