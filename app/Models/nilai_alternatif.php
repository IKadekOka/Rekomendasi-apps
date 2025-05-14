<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\kriteria;
use App\Models\alternatif;
use App\Models\SubKriteria;


class nilai_alternatif extends Model
{
    use HasFactory;
    protected $table = 'nilai_alternatifs';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'kriteria_id',
        'alternatif_id',
        'subkriteria_id',
        'nilai',
    ];

    // NilaiAlternatif.php
    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }
    public function alternatif() {
        return $this->belongsTo(Alternatif::class);
    }
  
    public function subKriteria()
    {
        return $this->belongsTo(SubKriteria::class, 'subkriteria_id');
    }    

}
