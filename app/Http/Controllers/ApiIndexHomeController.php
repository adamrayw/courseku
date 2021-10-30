<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ApiIndexHomeController extends Controller
{
    public function index() {
        $indexProgramming = Course::where('category_id', 1)->where('status', 'Release')->limit(8)->get();

        return response()->json($indexProgramming, Response::HTTP_OK);
    }

    public function field() {
        $field = Category::all();

        return response()->json($field, Response::HTTP_OK);
    }
}
