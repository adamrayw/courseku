<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Tutorials;
use Symfony\Component\HttpFoundation\Response;

class ApiIndexHomeController extends Controller
{

    public function carousel_artikel() {
        $artikel = Tutorials::where('type', 'Artikel')->limit(4)->get();

        return response()->json($artikel, Response::HTTP_OK);
    }

    public function index() {
        $indexProgramming = Course::where('category_id', 1)->where('status', 'Release')->limit(8)->get();

        return response()->json($indexProgramming, Response::HTTP_OK);
    }

    public function field() {
        $field = Category::all();

        return response()->json($field, Response::HTTP_OK);
    }

    public function show(Course $course)
    {
        $tutorial = Tutorials::Where('course_id', $course->id)->where('status', 'Release')->with('votes')->get();
        $data = [
            'course_name' => $course->name,
            'slug' => $course->slug,
            'tutorial' => $tutorial,
        ];

        return response()->json($data, response::HTTP_OK);
    }
}
