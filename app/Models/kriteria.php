<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubKriteria;
class kriteria extends Model
{
    use HasFactory;
    protected $table = 'kriteria';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'nama', 
        'bobot',  
    ];
    public $timestamps = false;
    public function sub_kriterias()
    {
        return $this->hasMany(SubKriteria::class);
    }


}
