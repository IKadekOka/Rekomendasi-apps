<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class alternatif extends Model
{
    use HasFactory;
    protected $table = 'alternatifs';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'nama', 
        'lokasi', 
        'kategori_id',
        'latitude',
        'longitude', 
        'gambar', 
    ];
    public $timestamps = false;

    public function nilaiAlternatif()
    {
        return $this->hasMany(NilaiAlternatif::class, 'alternatif_id');
    }
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function event()
    {
        return $this->hasMany(Event::class);
    }
    public function hasil()
    {
        return $this->hasOne(Hasil::class);
    }

}
