<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function user(){
        return $this->belongsTo("User");
    }
    static function getComment($id)
    {

        return Comment::find($id);
    }
}