<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{



    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    static function getPost($id)
    {

        return Post::find($id);
    }
}
