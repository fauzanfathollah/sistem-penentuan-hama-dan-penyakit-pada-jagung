<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
protected $fillable = ['kode', 'nama', 'bobot'];

public function gejalaPilihan()
{
    return $this->hasMany(GejalaPilihan::class);
}

public function pengetahuans()
{
    return $this->hasMany(Pengetahuan::class);
}

}

