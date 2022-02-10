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
        $posts = Post::with(['category', 'tags'])->paginate(5);

        return response()->json($posts);
    }

    // Show (Post details)
    public function show($slug) {
        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();

        return response()->json($post);
    }
}
