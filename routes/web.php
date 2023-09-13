<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GlazeController;
use App\Http\Controllers\ReportController;

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

Route::redirect('/', 'login');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    // User routes
    Route::middleware(['user-access:user'])->group(function () {
        Route::get('/home', [HomeController::class, 'index'])->name('user.home');
        Route::resource('/home/glaze', GlazeController::class);
    });

    // Admin routes
    Route::middleware(['user-access:admin'])->group(function () {
        Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
        Route::resource('/admin/user', UserController::class);
        Route::get('/admin/exportpdf', [ReportController::class, 'exportpdf'])->name('admin.exportpdf');
        Route::get('/admin/data', [ReportController::class, 'data'])->name('admin.data');
        Route::get('/admin/export', [ReportController::class, 'export'])->name('admin.exportxlsx');
        Route::get('/admin/userpdf', [UserController::class, 'userpdf'])->name('admin.userpdf');
    });
});
