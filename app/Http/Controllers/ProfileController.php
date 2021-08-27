<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return view('pages.profile');
        }

        return redirect('login')->with('mustLogin', 'You must login for access it.');
    }
}
