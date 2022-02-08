<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models import
use App\Post;

class PostController extends Controller
{
    // Index
    public function index() {
        $posts = Post::paginate(5);

        return response()->json($posts);
    }
}
