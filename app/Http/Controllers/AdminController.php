<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Course;
use App\Models\Tutorials;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home()
    {
        // get users
        $users = User::orderBy('created_at', 'desc')->Limit(5)->get();

        // get tutorials
        $tutorials = Tutorials::all();
        // get courses
        $courses = Course::all();
        // get comments
        $comments = Comment::orderBy('created_at', 'desc')->with(['user', 'tutorial'])->get();


        return view(
            'admin/admin-dashboard',
            compact(
                [
                    'users',
                    'tutorials',
                    'courses',
                    'comments'
                ]
            )
        );
    }

    public function manageUsers()
    {
        // get users
        $users = User::orderBy('created_at', 'desc')->get();

        return view('admin.pages.manage-users', compact(['users']));
    }

    public function manageCourses()
    {
        // get users
        $courses = Course::orderBy('created_at', 'desc')->with('category')->get();

        return view('admin.pages.manage-courses', compact(['courses']));
    }

    public function manageComments()
    {
        $comments = Comment::orderBy('created_at', 'desc')->with(['tutorial'])->get();

        return view('admin.pages.manage-comments', compact('comments'));
    }
}
