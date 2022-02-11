<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

// Models import
use App\Post;

class PostController extends Controller
{
    // Index
    public function index() {
        $posts = Post::with(['category', 'tags'])
                ->orderBy('created_at', 'desc')
                ->paginate(5);

        foreach($posts as $post) {
            $post['formatted_date'] = $this->format_date($post['created_at']);
        }

        return response()->json($posts);
    }

    // Show (Post details)
    public function show($slug) {
        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();

        if(! $post) {
            $post['not_found'] = true;
        }

        $post['formatted_date'] = $this->format_date($post['created_at']);

        return response()->json($post);
    }

    // Private function to format date
    private function format_date($date_to_format) {
        return Carbon::parse($date_to_format)->isoFormat('dddd D/OM/OY, HH:mm') . ' (' . $date_to_format->diffForHumans() . ')';
    }
}
