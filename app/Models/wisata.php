<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wisata extends Model
{
    use HasFactory;
    protected $table = 'data_alternatif';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'nama_wisata', 
        'kategori', 
        'harga_tiket', 
        'estimasi_transport', 
        'estimasi_penginapan', 
        'konsumsi', 
        'parkir', 
        'toilet', 
        'tempat_difabel', 
        'jarak', 
        'tersedia_transportasi', 
        'kondisi_jalan', 
        'rating',
        'jumlah_kunjungan' 
    ];
    public $timestamps = false;
}
