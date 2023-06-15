<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswas_id', 'id');
    }

    function matkul()
    {
        return $this->belongsTo(Matkul::class, 'matkuls_id', 'id');
    }
}
