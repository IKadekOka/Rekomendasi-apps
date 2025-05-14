<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alternatif extends Model
{
    use HasFactory;
    protected $table = 'alternatifs';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'nama', 
        'lokasi', 
        'latitude',
        'longitude', 
    ];
    public $timestamps = false;

    public function nilaiAlternatif()
    {
        return $this->hasMany(NilaiAlternatif::class, 'alternatif_id');
    }

}
