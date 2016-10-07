<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $table = 'ruang';

    protected $primaryKey = 'ruang_id';

    public $fillable = ['nama_ruang'];

}
