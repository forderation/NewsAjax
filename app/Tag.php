<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public $table = 'tag';
    protected $fillable = [
        'nama_tag',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'tag_post');
    }

}
