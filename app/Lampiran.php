<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    protected $table = 'peminjaman';

    protected $primaryKey = 'peminjaman_id';

    public $fillable = ['peminjaman_id', 'alat_ruang_id', 'jumlah'];
}
