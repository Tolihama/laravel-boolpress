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
        $posts = Post::with(['category', 'tags'])
                ->orderBy('created_at', 'desc')
                ->paginate(5);

        return response()->json($posts);
    }

    // Show (Post details)
    public function show($slug) {
        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();

        if(! $post) {
            $post['not_found'] = true;
        }

        return response()->json($post);
    }
}
