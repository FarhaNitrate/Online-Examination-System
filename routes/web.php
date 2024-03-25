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

    Route::get('/teachers', [StudentController::class, 'teachers'])->name('teachers');
    Route::get('/student-message/{id}', [StudentController::class, 'message'])->name('student-message');
    Route::post('/student-message', [StudentController::class, 'messageStore'])->name('student-message.store');
});

Route::middleware('auth.teacher')->group(function () {
    Route::get('/teacher/profile', [TeacherController::class, 'showProfile'])->name('teacher.profile');
    Route::get('/teacher/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::put('/teacher/update', [TeacherController::class, 'update'])->name('teacher.update');

    Route::get('/students', [TeacherController::class, 'students'])->name('students');
    Route::get('/message/{id}', [TeacherController::class, 'message'])->name('message');
    Route::post('/message', [TeacherController::class, 'messageStore'])->name('message.store');


    Route::get('/registration', [TeacherController::class, 'registration'])->name('registration');
    Route::post('/registration', [TeacherController::class, 'store'])->name('registration.store');
});




// Index
Route::get('/', function () {
    return view('index');
})->name('index');
