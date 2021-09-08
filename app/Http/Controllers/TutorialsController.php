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

        // $datas = Tutorials::where('slug', $slug)->firstOrFail();
        // $comments = Comment::where('tutorials_id', $datas->id)->with('user')->paginate(1);

        return view('pages.view-tutorial', [
            Tutorials::where('slug', $slug)->increment('views'),
            'datas' => Tutorials::where('slug', $slug)->with('comments')->limit(4)->get(),
            'isLiked' => Voters::whereHas('user', function ($q) {
                $q->where('tutorials_id');
            })->get(),
        ]);
    }
}
