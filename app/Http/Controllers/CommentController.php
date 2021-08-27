<?php

namespace App\Http\Controllers;

use App\Models\Voters;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Alert;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // $comment = $request->input('comment');
        // $user_id = $request->input('users_id');
        // $tutorials_id = $request->input('tutorials_id');

        Comment::create([
            'users_id' => $request->users_id,
            'tutorials_id' => $request->tutorials_id,
            'comment' => $request->comment,
        ]);


        return back();;
    }
}
