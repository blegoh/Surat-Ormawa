<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alat extends Model
{
    protected $table = 'alat';

    protected $primaryKey = 'alat_id';

    public $fillable = ['nama_alat', 'jumlah'];

    public function peminjaman() {
        return $this->belongsToMany(Peminjaman::class);
    }

}
