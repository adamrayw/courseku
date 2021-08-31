<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\Voters;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('index', [
            'fields' => Category::all(),
            'courses' => Course::where('category_id', 1)->get(),
        ]);
    }
}
