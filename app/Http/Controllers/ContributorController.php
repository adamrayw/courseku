<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ContributorController extends Controller
{
    public function contributor()
    {
        $user = User::orderBy('points', 'desc')->get();
        dd($user);

        return view('pages.top-contributor', compact('user'));
    }
}