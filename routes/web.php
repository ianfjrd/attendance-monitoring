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
    Route::get('/dashboard', [UserController::class, 'userDashboard'] )->name('dashboard');
});


Route::prefix('admin')->group(function () {
    Route::resource('user', UserController::class);
    Route::get('user/update-role', [UserController::class, 'updateRole'])->name('updateRole');
    Route::delete('user,',[UserController::class, 'destroy'])->name('userDestroy');
    Route::get('users/deleted', [UserController::class, 'usersDeleted'])->name('usersDeleted');
    Route::get('user/restore/{id}', [UserController::class, 'userRestore'])->name('userRestore');
    Route::get('/admindashboard', function () {
        return view('admin.admindashboard');
    })->name('admindashboard');
    Route::get('/forgottotimeout', function () {
        return view('admin.forgot-timeout');
    })->name('forgottotimeout');
    Route::get('/reqovertime', function () {
        return view('admin.request-overtime');
    })->name('reqovertime');
    Route::get('/employeelist', function () {
        return view('admin.admin-employeeList');
    })->name('employeelist');
    Route::get('/addnewuser', function () {
        return view('admin.admin-addUser');
    })->name('addnewuser');
    Route::get('/employeeleaves', function () {
        return view('admin.admin-employeeLeaves');
    })->name('employeeleaves');
    Route::get('/employeedep', function () {
        return view('admin.admin-employeeDepart');
    })->name('employeeDep');
    Route::get('/employeedeleted', function () {
        return view('admin.admin-employeeDeleted');
    })->name('employeeDeleted');
    Route::get('/admintimestamp', function () {
        return view('admin.admin-timestamp');
    })->name('admintimestamp');
    Route::get('/admintimestamp/create', function () {
        return view('admin.timestamp-create');
    })->name('timestampCreate');
    Route::get('/admintimestamp/update', function () {
        return view('admin.timestamp-update');
    })->name('timestampEdit');
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

    // POST
    Route::prefix('attend')->group(function () {
        Route::get('/', [TimestampController::class, 'create'])->name('timestamp.create');
        Route::post('/store', [TimestampController::class, 'store'])->name('timestamp.store');
    });
});
