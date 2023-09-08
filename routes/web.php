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
    Route::get('/user/{id}', 'App\Http\Controllers\UserController@show')->name('user.show');
    Route::get('/user/{id}/edit', 'App\Http\Controllers\UserController@edit')->name('user.edit');
    Route::put('/user/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');
    Route::get('/users', 'App\Http\Controllers\UserController@usermanagement')->name('admin.users');
    Route::get('/users/{user}', 'App\Http\Controllers\UserController@usermanagement_show')->name('users.show');
    Route::get('/users/create', 'App\Http\Controllers\UserController@usermanagement_create')->name('users.create');

    Route::post('/users', 'App\Http\Controllers\UserController@usermanagement_store')->name('users.store');
    Route::get('/users/{user}/edit', 'App\Http\Controllers\UserController@usermanagement_edit')->name('users.edit');
    Route::put('/users/{user}', 'App\Http\Controllers\UserController@usermanagement_update')->name('users.update');

    Route::delete('/users/{user}','App\Http\Controllers\UserController@usermanagement_destroy')->name('users.destroy');
    Route::get('/menu/{category?}', 'App\Http\Controllers\MenuController@menu')->name('admin.menu');

    Route::get('/service', 'App\Http\Controllers\ServiceController@adminindex')->name('admin.services');

    Route::get('/theme', 'App\Http\Controllers\ServiceController@admin_theme_index')->name('admin.themes');

});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user-dashboard', 'App\Http\Controllers\UserController@index')->name('user.dashboard');
    Route::get('/user/{id}', 'App\Http\Controllers\UserController@show')->name('user.show');
    Route::get('/user/{id}/edit', 'App\Http\Controllers\UserController@edit')->name('user.edit');
    Route::put('/user/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');
});

Route::get('/menus', 'App\Http\Controllers\MenuController@index')->name('guest.menus');
Route::get('/menus/{category?}', 'App\Http\Controllers\MenuController@specificmenuindex')->name('guest.specific_menu');

Route::get('/services', 'App\Http\Controllers\ServiceController@index')->name('guest.services');
Route::get('/themes', 'App\Http\Controllers\ServiceController@themesindex')->name('guest.themes');
Route::get('/services/{serviceCategory}/promos', 'App\Http\Controllers\ServiceController@servicePromoIndex')->name('guest.servicePromoIndex');
Route::get('/services/{serviceCategory}/promos/{servicePromo}', 'App\Http\Controllers\ServiceController@servicePromoPic')->name('guest.servicePromoPic');





Auth::routes();
Route::view('/userprofile', 'userprofile.index');
Route::view('/history', 'user.history');
Route::view('/bookings', 'admin.bookings');
Route::view('/reservations', 'admin.reservation');
Route::view('/services/customization', 'guest.customization');
