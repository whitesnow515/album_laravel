<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    //

    // app/Http/Controllers/CookieController.php
    public function clearCookie() {
        Cookie::queue(Cookie::forget('cookieName'));
        return view('welcome');
    }

}
