<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $table = 'karyawan';
    protected $primaryKey = 'id_karyawan';

    public function cuti(){
        return $this->hasMany('App\Cuti', 'id_karyawan');
    }
}
