<?php

namespace App\Http\Controllers;

use App\Models\Save;
use App\Models\Tutorials;
use App\Models\User;
use App\Models\Voters;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            return view('pages.profile', [
                'votes' => Voters::where('user_id', Auth::user()->id)->with('tutorial')->get(),
                'saves' => Save::where('user_id', Auth::user()->id)->with('tutorials')->get()
            ]);
        }

        return redirect('login')->with('mustLogin', 'You must login for access it.');
    }
}
