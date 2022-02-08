<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// Models import
use App\Category;

class CategoryController extends Controller
{
    // Index
    public function index() {
        $categories = DB::table('categories')
                ->select('id', 'name as category_name')
                ->get();

        return response()->json($categories);
    }
}
