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
        'slug'
    ];

    /**
     * Relations
     */
    // posts - categories
    public function categories() {
        return $this->belongsTo('App\Category');
    }
}
