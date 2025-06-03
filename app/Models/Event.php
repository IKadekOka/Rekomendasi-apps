<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\alternatif;


class Event extends Model
{
    use HasFactory;
    protected $table = 'event';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'alternatif_id',
        'nama',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_berakhir'
    ];
    public $timestamps = false;

    public function alternatif()
    {
        return $this->belongsTo(alternatif::class);
    }
}
