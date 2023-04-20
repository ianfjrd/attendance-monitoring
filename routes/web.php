<?php

use App\Http\Controllers\TimestampController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/csrf', function () {
    return  csrf_token();
});


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::prefix('admin')->group(function () {
    Route::resource('timestamp', TimestampController::class);

    Route::resource('user', UserController::class);
    Route::get('user/update-role', [UserController::class, 'updateRole']);


});


Route::prefix('dashboard')->group(function () {
    Route::get('/timein', function () {
        return view('timestamp.timeIn');
    })->name('timeIn');
    Route::get('/timeout', function () {
        return view('timestamp.timeOut');
    })->name('timeOut');
    Route::get('/breaktime', function () {
        return view('timestamp.break');
    })->name('breakTime');
    Route::get('/leaves', function () {
        return view('timestamp.leaves');
    })->name('leaves');
    Route::get('/employeedocs', function () {
        return view('timestamp.employeedocs');
    })->name('employeeDocs');
    Route::get('/summaryattendance', function () {
        return view('timestamp.summaryattendance');
    })->name('summaryAttendance');
    Route::get('/reqleave', function () {
        return view('timestamp.reqleave');
    })->name('reqLeave');
});


