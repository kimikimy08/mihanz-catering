<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-dashboard', 'App\Http\Controllers\AdminController@index')->name('admin.dashboard');
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user-dashboard', 'App\Http\Controllers\UserController@index')->name('user.dashboard');
});







Auth::routes();
Route::view('/menu', 'guest.menu');
Route::view('/services', 'guest.services');
Route::view('/themes', 'guest.themes');
