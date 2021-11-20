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

    public function fields() {
        $field = Category::all();

        return response()->json($field, Response::HTTP_OK);
    }

    public function show(Course $course)
    {
        $tutorial = Tutorials::Where('course_id', $course->id)->where('status', 'Release')->with(['votes', 'comments'])->get();
        $data = [
            'course_name' => $course->name,
            'slug' => $course->slug,
            'tutorial' => $tutorial,
        ];

        return response()->json($data, response::HTTP_OK);
    }

    public function course($slug) {

        $data = [
            Tutorials::where('slug', $slug)->increment('views'),
            'datas' => Tutorials::where('slug', $slug)->with('comments')->get(),
        ];

        return response()->json($data, response::HTTP_OK);

    }

    public function field($slug) {
        $data = [
            'field' => Category::where('slug', $slug)->with('course')->get()
        ];

        return response()->json($data, Response::HTTP_OK);
    }
}
