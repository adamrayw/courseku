<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TutorialsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [HomeController::class, 'index']);

Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/learn/{course:slug}', [CoursesController::class, 'show']);

Route::get('/course/{slug}', [TutorialsController::class, 'show']);

Route::post('/course/{slug}/comment', [CommentController::class, 'store']);

// Route::post('/course/{slug}/like', [CommentController::class, 'storevote']);
// Route::post('/course/{slug}/dislike', [CommentController::class, 'removevote']);

// Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

Route::get('/{category:slug}', function (Category $category) {
    return view('pages.field', [
        'name_category' => $category->name,
        'courses' => $category->course,
        'title' => $category->name,
    ]);
});
