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
            'fields' => Category::where('status', 'Release')->get(),
            'courses' => Course::where('status', 'Release')->limit(5)->get(),
        ]);
    }
}
