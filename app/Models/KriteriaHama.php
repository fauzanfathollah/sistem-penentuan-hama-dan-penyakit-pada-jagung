<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaHama extends Model
{
    use HasFactory;
    protected $table = 'kritera_hama';
    protected $fillable = ['nama', 'bobot'];

    // public function gejalaPilihan()
    // {
    //     return $this->hasMany(GejalaPilihan::class);
    // }

    // public function pengetahuans()
    // {
    //     return $this->hasMany(Pengetahuan::class);
    // }
}
