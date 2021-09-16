<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Tutorials;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function show(Course $course, Tutorials $tutorials)
    {

        return view('pages.tutorials', [
            'name_course' => $course->name,
            'slug' => $course->slug,
            'tutorials' => Tutorials::where('status', 'Release')->get(),
            'get_vote' => $tutorials->votes,
            // 'courses' => Course::where('status', 'Released')->get(),
        ]);
    }

    public function field($slug)
    {
        $field = Category::where('slug', $slug)->with('course')->get();
        $courses = Course::where('status', 'Released')->get();

        return view('pages.field', compact(['field', 'courses']));
    }
}
