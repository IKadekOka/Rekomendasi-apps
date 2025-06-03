<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $table = 'hasil_moora';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'alternatif_id',
        'ranking',
        'skor'
    ];

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class);
    }
}
