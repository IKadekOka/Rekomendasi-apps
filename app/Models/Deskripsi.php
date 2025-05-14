<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deskripsi extends Model
{
    use HasFactory;
    protected $table = 'skala_deskripsis';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'sub_kriteria_id', 
        'nilai',       
        'deskripsi', 
    ];
    public $timestamps = false;
}
