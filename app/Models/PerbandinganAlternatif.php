<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerbandinganAlternatif extends Model
{
    use HasFactory;
    protected $fillable = ['alternatif_1', 'alternatif_2', 'kriteria_id', 'nilai'];
}
