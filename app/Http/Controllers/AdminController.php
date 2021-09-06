<?php

namespace App\Http\Controllers;

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
        return view('admin/admin-dashboard', compact(['users', 'tutorials', 'courses']));
    }
}
