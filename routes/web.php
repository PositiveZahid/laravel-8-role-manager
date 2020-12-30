<?php

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

Auth::routes();



Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/initial', 'HomeController@initial')->name('initial');;

	Route::resource('permissions', 'Admin\PermissionsController');
	Route::delete('permissions_mass_destroy', 'Admin\PermissionsController@massDestroy')->name('permissions.mass_destroy');

	Route::resource('roles', 'Admin\RolesController');
	Route::delete('roles_mass_destroy', 'Admin\RolesController@massDestroy')->name('roles.mass_destroy');

	Route::resource('users', 'Admin\UsersController');
	Route::delete('users_mass_destroy', 'Admin\UsersController@massDestroy')->name('users.mass_destroy');
});
