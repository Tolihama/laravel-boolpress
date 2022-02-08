<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models import
use App\Category;

class CategoryController extends Controller
{
    // Index
    public function index() {
        $categories = Category::all();

        return response()->json($categories);
    }
}
