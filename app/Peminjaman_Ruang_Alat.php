<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman_Ruang_Alat extends Model
{
    protected $table    =   'peminjaman_ruang_alat';

    public function peminjaman() {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }

    public function ruang() {
        return $this->belongsTo(Ruang::class, 'ruang_id');
    }

    public function alat() {
        return $this->belongsTo(Alat::class, 'alat_id');
    }
}
