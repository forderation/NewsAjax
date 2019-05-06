<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pencipta extends Model
{
    //
    public $table = "pencipta";
    protected $primaryKey = 'id_berita';
    protected $fillable = ['id_berita','nama_pencipta'];

    public function post()
    {
        return $this->hasOne('App\Post','id');
    }
}
