<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HolyController;
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

Route::get('/', [HolyController::class, 'view'])->name('home');
Route::get('/place', [HolyController::class, 'show'])->name('place');

Route::any('/location', [HolyController::class, 'getLocation'])->name('get-location');

Route::get('/login', [AdminController::class, 'view'])->middleware('guest')->name('login');
Route::post('/login', [AdminController::class, 'dologin'])->middleware('guest')->name('dologin');


Route::middleware(['auth'])->group(function () {
    Route::view('/home', 'admin.dashboard');
    Route::get('logout', [AdminController::class, 'dologout']);
});
