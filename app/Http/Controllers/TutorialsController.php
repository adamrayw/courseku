<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use App\Models\Voters;
use App\Models\Tutorials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorialsController extends Controller
{
    public function show($slug)
    {

        $user = Auth::id();

        return view('pages.view-tutorial', [
            'datas' => Tutorials::where('slug', $slug)->get(),
            'isLiked' => Voters::whereHas('user', function ($q) {
                $q->where('tutorials_id');
            })->get(),
        ]);
    }
}
