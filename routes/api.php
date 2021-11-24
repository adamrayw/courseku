<?php

use App\Http\Controllers\ApiAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiIndexHomeController;
use App\Http\Controllers\ApiUpdateProfileController;
use App\Http\Controllers\CoursesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [ApiAuthController::class, 'logout']);
});

Route::put('/update-profile/{id}', [ApiUpdateProfileController::class,'updateProfile']);

// Route::get('/programming', [IndexHomeController::class, 'index']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::post('/register', [ApiAuthController::class, 'register']);

Route::get('/home', [ApiIndexHomeController::class, 'index']);
Route::get('/field', [ApiIndexHomeController::class, 'fields']);
Route::get('/carousel', [ApiIndexHomeController::class, 'carousel_artikel']);

Route::get('/learn/{course:slug}', [ApiIndexHomeController::class, 'show']);
Route::get('/course/{slug}', [ApiIndexHomeController::class, 'course']);
Route::get('/{slug}', [ApiIndexHomeController::class,'field']);
Route::get('/profile/{id}', [ApiIndexHomeController::class,'profileData']);

Route::post('/storevote', [ApiIndexHomeController::class, 'storevote']);
Route::delete('/{tid}/{uid}', [ApiIndexHomeController::class, 'removevote']);
