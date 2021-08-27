<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Tutorials;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function show(Course $course, Tutorials $tutorials)
    {

        return view('pages.tutorials', [
            'name_course' => $course->name,
            'tutorials' => $course->tutorials,
            'get_vote' => $tutorials->votes
        ]);
    }
}
