<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis';

    protected $primaryKey = 'jenis_id';

    public $timestamps = false;

}
