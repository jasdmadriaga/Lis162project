<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryStaffController;
use App\Http\Controllers\StudentController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('librarystaffs', LibraryStaffController::class);
    Route::resource('students', StudentController::class);
});
