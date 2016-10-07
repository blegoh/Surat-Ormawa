<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';

    protected $primaryKey = 'surat_id';

    public $fillable = ['ormawa_id', 'peminjaman_id', 'nomor_surat', 'panitia_kegiatan', 'kode_divisi', 'periode_jabatan'];

    public $timestamps = false;

    public function ormawa() {
        return $this->belongsTo(User::class, 'ormawa_id');
    }

    public function peminjaman() {
        return $this->belongsTo(Peminjaman::class, 'peminjaman_id');
    }
}
