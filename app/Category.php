<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * RELATIONS
     */
    // categories - posts
    public function posts() {
        return $this->hasMany('App\Post');
    }
}
