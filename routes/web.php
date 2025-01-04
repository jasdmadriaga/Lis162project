<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryStaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\WaitlistController;
use App\Http\Controllers\HoldController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReservationController;


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
    Route::resource('waitlists', WaitlistController::class);
    Route::resource('holds', HoldController::class);
    Route::resource('resources', ResourceController::class);
    Route::resource('reports', ReportController::class);
    Route::resource('borrows', BorrowController::class);
    Route::resource('requests', ReservationController::class);
});
