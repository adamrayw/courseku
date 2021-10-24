<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiIndexHomeController extends Controller
{
    public function index() {
        $indexProgramming = Course::where('category_id', 1)->where('status', 'Release')->limit(5)->get();
        $response = [
            'message' => 'List index for programming',
            'data' => $indexProgramming
        ];

        return response()->json($response, Response::HTTP_OK);
    }
}
