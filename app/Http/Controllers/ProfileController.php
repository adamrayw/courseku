<?php

namespace App\Http\Controllers;

use App\Models\Save;
use App\Models\User;
use App\Models\Course;
use App\Models\Voters;
use App\Models\Tutorials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::check()) {

            return view('pages.profile', [
                'votes' => Voters::where('user_id', Auth::user()->id)->with('tutorial')->get(),
                'saves' => Save::where('user_id', Auth::user()->id)->with('tutorials')->get(),
                'courses' => Course::where('status', 'Released')->get(),
            ]);
        }

        return redirect('login')->with('mustLogin', 'You must login for access it.');
    }

    public function viewTutorial()
    {
        $courses = Course::where('status', 'Release')->get();
        return view('pages.submit-tutorial', compact('courses'));
    }

    public function addTutorial(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required',
            'comment_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'description' => 'required',
            'author' => 'required',
            'type' => 'required',
            'level' => 'required',
            'source_link' => 'required',
            'submitted_by' => 'required',
            'views' => 'required',
        ]);

        Tutorials::create($validated);

        return back()->with('success', 'We will review your submission.');
    }
}
