<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ContributorController extends Controller
{
    public function contributor()
    {
        $users = User::orderBy('points', 'desc')->limit(5)->get();

        return view('pages.top-contributor', compact('users'));
    }
}