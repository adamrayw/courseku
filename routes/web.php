<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContributorController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ExploreController;
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

Route::get('/submit-tutorial', [ProfileController::class, 'viewTutorial'])->middleware('auth');

Route::post('/submit-tutorial', [ProfileController::class, 'addTutorial'])->middleware('auth');

Route::get('/edit-profile', [ProfileController::class, 'editProfile'])->middleware('auth');

Route::post('/edit-profile', [ProfileController::class, 'updateProfile'])->middleware('auth');

Route::post('/delete-course', [ProfileController::class, 'deleteTutorial'])->middleware('auth');



Route::get('/', function () {
    return redirect('/home');
});
Route::get('/top-contributor', [ContributorController::class, 'contributor']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/explore', [ExploreController::class, 'explore']);

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');;

Route::get('/learn/{course:slug}', [CoursesController::class, 'show']);

Route::get('/course/{slug}', [TutorialsController::class, 'show']);

Route::post('/course/{slug}', [CommentController::class, 'store']);

Route::get('/{category:slug}', [CoursesController::class, 'field']);



// admin
require __DIR__ . '/admin.php';
