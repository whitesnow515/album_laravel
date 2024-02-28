<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class WelcomeController extends Controller
{
    public function index()
    {
        // if (Auth::check()) {
        //     // User is logged in
        //     $user = Auth::user();
        //     $userName = $user->name;
        //     return view('/welcome');
        // } else {
        //     // User is not logged in
        //     return redirect('login');
        // }

        return view('/welcome');
    }
}
