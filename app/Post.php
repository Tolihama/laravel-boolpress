<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * Mass Assignment
     */
    protected $fillable = [
        'title',
        'content',
        'slug',
        'category_id',
        'cover'
    ];

    /**
     * Relations
     */
    // posts - categories
    public function category() {
        return $this->belongsTo('App\Category');
    }

    // posts - tags
    public function tags() {
        return $this->belongstoMany('App\Tag');
    }
}
