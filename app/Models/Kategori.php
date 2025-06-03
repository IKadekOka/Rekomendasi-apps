<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\alternatif;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'nama',
        'deskripsi',
        'alternatif_id',
    ];
    public function alternatif()
    {
        return $this->hasMany(Alternatif::class);
    }
}


