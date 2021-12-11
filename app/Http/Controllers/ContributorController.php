<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContributorController extends Controller
{
    public function contributor() {
        return view('pages.top-contributor');
    }
}
