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
        return view('dashboard.home');
    })->name('dashboard');
});


Route::prefix('admin')->group(function () {

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
    Route::get('/breakTime', function () {
        return view('timestamp.break');
    })->name('breakTime');
});


// POST
Route::prefix('attend')->group(function () {
    Route::get('/', [TimestampController::class, 'create'])->name('timestamp.create');
    Route::post('/store', [TimestampController::class, 'store'])->name('timestamp.store');
});
