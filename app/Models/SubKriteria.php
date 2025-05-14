<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\kriteria;
use App\Models\nilai_alternatif;

class SubKriteria extends Model
{
    use HasFactory;
    protected $table = 'sub_kriterias';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'kriteria_id',
        'nama',
        'type'
    ];
    public $timestamps = false;
    public function kriteria()
    {
        return $this->belongsTo(kriteria::class);
    }

}
