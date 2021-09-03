<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use App\Models\Course;
use App\Models\Voters;
use App\Models\Tutorials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TutorialsController extends Controller
{
    public function show($slug, Request $request)
    {

        $user = Auth::id();

        if ($request->sortby == 'desc') {
            $sortby = 'desc';
        } elseif ($request->sortby == 'asc') {
            $sortby = 'asc';
        } else {
            $sortby = 'desc';
        }

        return view('pages.view-tutorial', [
            'datas' => Tutorials::where('slug', $slug)->get(),
            'comments' => Comment::with(['tutorial', 'user'])->orderBy('created_at', $sortby)->get(),
            'isLiked' => Voters::whereHas('user', function ($q) {
                $q->where('tutorials_id');
            })->get(),
        ]);
    }
}
