<?php

use App\Http\Controllers\AdminController;
use App\Models\Admin;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/login', 'admin.login')->middleware('guest:admin')->name('login');

    $limiter = config('fortify.limiters.login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
        ->middleware(array_filter([
            'guest:admin',
            $limiter ? 'throttle:' . $limiter : null,
        ]));

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->middleware('auth:admin')
        ->name('logout');


    Route::get('/home', [AdminController::class, 'home'])->middleware('auth:admin')->name('home');

    Route::post('/updateversion', [AdminController::class, 'updateVersion'])->middleware('auth:admin');

    Route::get('/add-admin', [AdminController::class, 'viewAdmin'])->middleware('auth:admin');

    Route::post('/add-admin', [AdminController::class, 'addAdmin'])->middleware('auth:admin');

    Route::get('/manage-users', [AdminController::class, 'manageUsers'])->middleware('auth:admin');

    Route::get('/manage-users/{id}', [AdminController::class, 'deleteUser'])->middleware('auth:admin');

    Route::post('/manage-courses/user/{id}', [AdminController::class, 'editUser'])->middleware('auth:admin');

    Route::get('/manage-courses', [AdminController::class, 'manageCourses'])->middleware('auth:admin');

    Route::get('/manage-tutorials', [AdminController::class, 'manageTutorial'])->middleware('auth:admin');

    Route::get('/manage-comments', [AdminController::class, 'manageComments'])->middleware('auth:admin');

    Route::get('/add-course', [AdminController::class, 'addCourse'])->middleware('auth:admin');

    Route::post('/add-course/post', [AdminController::class, 'storeCourse'])->middleware('auth:admin');

    Route::get('/add-category', [AdminController::class, 'addCategory'])->middleware('auth:admin');

    Route::get('/add-tutorial', [AdminController::class, 'viewTutorial'])->middleware('auth:admin');

    Route::post('/add-tutorial', [AdminController::class, 'addTutorial'])->middleware('auth:admin');

    Route::post('/add-category/post', [AdminController::class, 'storeCategory'])->middleware('auth:admin');

    Route::get('/manage-courses/{id}', [AdminController::class, 'deleteCourse'])->middleware('auth:admin');

    Route::post('/manage-courses/category', [AdminController::class, 'updateCategory'])->middleware('auth:admin');

    Route::post('/manage-courses/course', [AdminController::class, 'updateCourse'])->middleware('auth:admin');

    Route::get('/manage-tutorials/{id}', [AdminController::class, 'deleteTutorial'])->middleware('auth:admin');

    Route::post('/manage-tutorials/{id}', [AdminController::class, 'updateTutorial'])->middleware('auth:admin');

    Route::get('/manage-comments/{id}', [AdminController::class, 'deleteComment'])->middleware('auth:admin');
});