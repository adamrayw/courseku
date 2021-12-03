<?php

namespace App\Http\Controllers;

use App\Models\Save;
use App\Models\User;
use App\Models\Course;
use App\Models\Voters;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Tutorials;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class ApiIndexHomeController extends Controller
{

    public function carousel_artikel() {
        $data = [
            'artikel' => Tutorials::where('type', 'Artikel')->orderBy('created_at', 'desc')->limit(4)->get(),
        ];

        return response()->json($data, Response::HTTP_OK);
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
        $tutorial = Tutorials::Where('course_id', $course->id)->where('status', 'Release')->with(['votes', 'comments', 'saves'])->get();
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
            'datas' => Tutorials::where('slug', $slug)->with(['comments.user', 'votes', 'saves'])->get(),
        ];

        return response()->json($data, response::HTTP_OK);

    }

    public function field($slug) {
        $data = [
            'field' => Category::where('slug', $slug)->with('course')->get()
        ];

        return response()->json($data, Response::HTTP_OK);
    }

    public function profileData($id) {
        $result = [
            'user' => User::where('id', $id)->get(),
            'liked' => Voters::where('user_id', $id)->with('tutorial')->get(),
            'bookmarked' =>Save::where('user_id', $id)->with('tutorials')->get(),
            'submitted' => Tutorials::where('user_id', $id)->get(),
        ];

        return response()->json(['message'=>'Success','data'=> $result], Response::HTTP_OK);
    }

    public function storevote(Request $request) {
        $vote = Voters::create($request->all());

        return response()->json(['message'=>'success', 'data' => $vote], Response::HTTP_OK);
    }

    public function removevote($tid, $uid) {
        $removevote = Voters::where('user_id', $uid)->where('tutorials_id', $tid)->delete();

        return response()->json(['message'=>'success remove vote', 'data' => null], Response::HTTP_OK);
    }

    public function storesave(Request $request) {
        $vote = Save::create($request->all());

        return response()->json(['message'=>'success', 'data' => $vote], Response::HTTP_OK);
    }

    public function removesave($tid, $uid) {
        $removevote = Save::where('user_id', $uid)->where('tutorials_id', $tid)->delete();

        return response()->json(['message'=>'success remove vote', 'data' => null], Response::HTTP_OK);
    }

    public function comment(Request $request) {

        Comment::create($request->all());

        return response()->json(['message' => 'Success'], Response::HTTP_OK);
    }

    public function language() {
        $data = Course::all();

        return response()->json($data, Response::HTTP_OK);
    }

    public function submit(Request $request) {
        $validated = $request->validate([
            'user_id' => 'required',
            'course_id' => 'required',
            'comment_id' => 'required',
            'name' => 'required',
            'slug' => 'min:5',
            'description' => 'required',
            'description' => 'required',
            'author' => 'required',
            'type' => 'required',
            'level' => 'required',
            'source_link' => 'required',
            'submitted_by' => 'required',
            'views' => 'required',
        ]);

        $validated['slug'] = Str::slug($validated['name'], '-');
        $explodeUser = explode(' ', $validated['submitted_by']);
        $validated['submitted_by'] = $explodeUser[0];


        Tutorials::create($validated);

        return response()->json(['message' => 'Submit berhasil', 'data' => $validated], Response::HTTP_OK);
    }

    public function explore() {
        $data = Tutorials::where('status', 'Release')->with(['comments', 'votes', 'saves'])->orderBy('created_at' ,'desc')->get();

        return response()->json(['message' => 'success', 'data' => $data], Response::HTTP_OK);
    }
}
