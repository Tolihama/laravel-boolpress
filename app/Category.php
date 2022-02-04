<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * RELATIONS
     */
    // categories - posts
    public function post() {
        return $this->hasMany('App\Post');
    }
}
