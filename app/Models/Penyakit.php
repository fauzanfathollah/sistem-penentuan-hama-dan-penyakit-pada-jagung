<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $fillable = ['kode', 'nama', 'deskripsi', 'bobot'];

    public function pengetahuans()
    {
        return $this->hasMany(Pengetahuan::class);
    }
}
