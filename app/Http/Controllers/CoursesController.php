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
            'tutorials' => Tutorials::where('course_id', $course->id)->where('status', 'Release')->get()
            // 'courses' => Course::where('status', 'Released')->get(),
        ]);
    }

    public function field($slug)
    {
        $field = Category::where('slug', $slug)->with('course')->get();

        return view('pages.field', compact('field'));
    }
}
