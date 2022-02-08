<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Models import
use App\Post;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::namespace('Api')
    ->group(function() {
        // Posts get
        Route::get('/posts', 'PostController@index');

        // Post Categories get
        Route::get('/posts/categories', 'CategoryController@index');
    });