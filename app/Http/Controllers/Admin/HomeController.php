<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendWelcomeEmail;

class HomeController extends Controller
{
    /**
     * Admin Homepage
     */
    public function index() {
        Mail::to(Auth::user()->email)->send(new SendWelcomeEmail(Auth::user()->name));

        return view('admin.home');
    }
}
