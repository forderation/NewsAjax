<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagPost extends Model
{
    //
    protected $primaryKey = 'post_id';
    public $incrementing = false;

    protected $fillable = ['tag_id','post_id'];
    public $table = 'tag_post';
}
