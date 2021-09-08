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

    Route::get('/manage-users', [AdminController::class, 'manageUsers'])->middleware('auth:admin');

    Route::get('/manage-users/{id}', [AdminController::class, 'deleteUser'])->middleware('auth:admin');

    Route::post('/manage-courses/user/{id}', [AdminController::class, 'editUser'])->middleware('auth:admin');

    Route::get('/manage-courses', [AdminController::class, 'manageCourses'])->middleware('auth:admin');

    Route::get('/manage-comments', [AdminController::class, 'manageComments'])->middleware('auth:admin');

    Route::get('/add-course', [AdminController::class, 'addCourse'])->middleware('auth:admin');

    Route::post('/add-course/post', [AdminController::class, 'storeCourse'])->middleware('auth:admin');

    Route::get('/manage-courses/{id}', [AdminController::class, 'deleteCourse'])->middleware('auth:admin');

    Route::post('/manage-courses', [AdminController::class, 'updateCategory'])->middleware('auth:admin');
});
