<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth.student')->group(function () {
    Route::get('/student/profile', [StudentController::class, 'showProfile'])->name('student.profile');
    Route::get('/student/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/student/update', [StudentController::class, 'update'])->name('student.update');
});

Route::middleware('auth.teacher')->group(function () {
    Route::get('/teacher/profile', [TeacherController::class, 'showProfile'])->name('teacher.profile');
    Route::get('/teacher/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::put('/teacher/update', [TeacherController::class, 'update'])->name('teacher.update');
});

// Index
Route::get('/', function () {
    return view('index');
})->name('index');
