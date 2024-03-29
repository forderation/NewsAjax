<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public $table = "post";
    protected $fillable = ['title','content','published'];

    public static function getExcerpt($str, $startPos = 0, $maxLength = 50) {
        if(strlen($str) > $maxLength) {
            $excerpt   = substr($str, $startPos, $maxLength - 6);
            $lastSpace = strrpos($excerpt, ' ');
            $excerpt   = substr($excerpt, 0, $lastSpace);
            $excerpt  .= ' [...]';
        } else {
            $excerpt = $str;
        }

        return $excerpt;
    }

    public function kategori(){
        return $this->belongsTo('App\Kategori','id_kategori');
    }

    public function pencipta()
    {
        return $this->hasOne('App\Pencipta','id_berita');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_post');
    }

}
