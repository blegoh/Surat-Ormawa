<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alat_Ruang extends Model
{
    protected $table = 'alat_ruang';

    protected $primaryKey = 'alat_ruang_id';

    public $fillable = ['nama_barang', 'jenis_id'];

    public function jenis() {
       return $this->belongsTo(Jenis::class, 'jenis_id');
    }
}
