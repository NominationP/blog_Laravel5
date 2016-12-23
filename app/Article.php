<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


// one to many

class Article extends Model
{
    public function hasManyComments()
    {
        return $this->hasMany('App\Comment', 'article_id', 'id');
    }
}
