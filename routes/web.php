<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\front\HomeController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\admin\ArtikelController;
use App\Http\Controllers\admin\CategoryController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('up');
});

Route::group(['prefix' => 'user/'], function () {
    Route::get("register", [UserController::class, "register"])->middleware('guest');
    Route::post("proses-daftar", [UserController::class, "ProsesDaftar"]);
    Route::get("login", [UserController::class, "login"])->name('login')->middleware('guest');
    Route::post("proses-login", [UserController::class, "authenticate"]);
    Route::post("logout", [UserController::class, "logout"]);
});

//routing bagian admin
Route::resource('user', UsersController::class)->middleware('auth');
Route::resource('category', CategoryController::class)->middleware('auth');
Route::resource('artikel', ArtikelController::class)->middleware('auth');

//routing reader
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get("/detail/{id}", [HomeController::class, "Detail"])->middleware('auth');