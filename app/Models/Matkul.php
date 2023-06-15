<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    function dosen()
    {
        return $this->belongsTo(Dosen::class, 'dosens_id', 'id');
    }
}
