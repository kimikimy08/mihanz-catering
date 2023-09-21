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
    Route::get('/users', 'App\Http\Controllers\UserController@usermanagement')->name('admin.users.index');
    Route::get('/users/{user}', 'App\Http\Controllers\UserController@usermanagement_show')->name('admin.users.view');
    Route::get('/users/{user}/edit', 'App\Http\Controllers\UserController@usermanagement_edit')->name('admin.users.edit');
    Route::put('/users/{user}', 'App\Http\Controllers\UserController@usermanagement_update')->name('users.update');

    Route::delete('/users/{user}','App\Http\Controllers\UserController@usermanagement_destroy')->name('users.destroy');
    
    Route::get('/menu/{category?}', 'App\Http\Controllers\MenuController@menu')->name('admin.menu.index');
    Route::get('/menu/all/create', 'App\Http\Controllers\MenuController@menucreate')->name('admin.menu.create');
    Route::post('/menu', 'App\Http\Controllers\MenuController@menustore')->name('admin.menu.store');
    Route::get('/menu/all/{id}/edit', 'App\Http\Controllers\MenuController@menuedit')->name('admin.menu.edit');
    Route::put('/menu/all/{id}', 'App\Http\Controllers\MenuController@menuupdate')->name('admin.menu.update');
    Route::delete('/menu/{id}', 'App\Http\Controllers\MenuController@menudestroy')->name('admin.menu.destroy');
    Route::get('/menu/all/{id}', 'App\Http\Controllers\MenuController@menuview')->name('admin.menu.view');

    Route::get('/service', 'App\Http\Controllers\ServiceController@adminindex')->name('admin.services.index');
    Route::get('/service/create', 'App\Http\Controllers\ServiceController@admincreate')->name('admin.services.create');
    Route::post('/service', 'App\Http\Controllers\ServiceController@adminstore')->name('admin.services.store');
    Route::get('/service/{id}/edit', 'App\Http\Controllers\ServiceController@adminedit')->name('admin.services.edit');
    Route::put('/service/{id}', 'App\Http\Controllers\ServiceController@adminupdate')->name('admin.services.update');
    Route::delete('/service/{id}', 'App\Http\Controllers\ServiceController@admindestroy')->name('admin.services.destroy');
    Route::get('/services/{id}', 'App\Http\Controllers\ServiceController@adminview')->name('admin.services.view');

    Route::get('/services/{id}/create', 'App\Http\Controllers\ServiceController@pckgcreate')->name('admin.packages.create');
    Route::post('/services/{id}', 'App\Http\Controllers\ServiceController@pckgstore')->name('admin.packages.store');
    Route::get('/services/{id}/{p_id}/edit', 'App\Http\Controllers\ServiceController@pckgedit')->name('admin.packages.edit');
    Route::put('/services/{id}/{p_id}', 'App\Http\Controllers\ServiceController@pckgupdate')->name('admin.packages.update');
    Route::delete('/service/{id}/{p_id}', 'App\Http\Controllers\ServiceController@pckgdestroy')->name('admin.packages.destroy');
    

    Route::get('/theme', 'App\Http\Controllers\ServiceController@admin_theme_index')->name('admin.themes.index');
    Route::get('/theme/create', 'App\Http\Controllers\ServiceController@admin_theme_create')->name('admin.themes.create');
    Route::post('/theme', 'App\Http\Controllers\ServiceController@admin_theme_store')->name('admin.themes.store');
    Route::get('/theme/{id}/edit', 'App\Http\Controllers\ServiceController@admin_theme_edit')->name('admin.themes.edit');
    Route::put('/theme/{id}', 'App\Http\Controllers\ServiceController@admin_theme_update')->name('admin.themes.update');
    Route::delete('/theme/{id}', 'App\Http\Controllers\ServiceController@admin_theme_destroy')->name('admin.themes.destroy');
    Route::get('/theme/{id}', 'App\Http\Controllers\ServiceController@admin_theme_view')->name('admin.themes.view');

});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user-dashboard', 'App\Http\Controllers\UserController@index')->name('user.dashboard');
    Route::get('/user/{id}', 'App\Http\Controllers\UserController@show')->name('user.show');
    Route::get('/user/{id}/edit', 'App\Http\Controllers\UserController@edit')->name('user.edit');
    Route::put('/user/{id}', 'App\Http\Controllers\UserController@update')->name('user.update');
    Route::get('/services/{serviceCategory}/promos/{servicePromo}/reservations', 'App\Http\Controllers\ReservationController@premade_create')->name('user.premade.create');
    Route::post('/user/services/{serviceCategory}/promos/{servicePromo}', 'App\Http\Controllers\ReservationController@premade_store')->name('user.premade.store');
    Route::get('/summary', 'App\Http\Controllers\ReservationController@showSummary')->name('user.premade.summary');
});

Route::get('/menus', 'App\Http\Controllers\MenuController@index')->name('guest.menus');
Route::get('/menus/{category?}', 'App\Http\Controllers\MenuController@specificmenuindex')->name('guest.specific_menu');

Route::get('/services', 'App\Http\Controllers\ServiceController@index')->name('guest.services');
Route::get('/themes', 'App\Http\Controllers\ServiceController@themesindex')->name('guest.themes');
Route::get('/services/{serviceCategory}/promos', 'App\Http\Controllers\ServiceController@servicePromoIndex')->name('guest.servicePromoIndex');
Route::get('/services/{serviceCategory}/promos/{servicePromo}', 'App\Http\Controllers\ServiceController@servicePromoPic')->name('guest.servicePromoPic');
Route::get('/services/{serviceCategory}/promos/{servicePromo}/order', 'App\Http\Controllers\ServiceController@serviceOrder')->name('guest.serviceOrder');





Auth::routes();
Route::view('/userprofile', 'userprofile.index');
Route::view('/history', 'user.history');
Route::view('/bookings', 'admin.bookings');
Route::view('/reservations', 'admin.reservation');

