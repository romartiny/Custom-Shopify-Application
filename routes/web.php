<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminLogController;

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
Route::middleware(['verify.shopify'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->middleware(['verify.shopify'])->name('home');

    Route::get('/admin-logs', [AdminLogController::class, 'showAdminLogs'])->name('adminLogs');

    Route::get('/theme-logs', [AdminLogController::class, 'showThemeLogs'])->name('themeLogs');

    Route::get('/important-logs', [AdminLogController::class, 'showImportantLogs'])->name('importantLogs');

    Route::get('/staff-logs', [AdminLogController::class, 'showStaffLogs'])->name('staffLogs');

});
