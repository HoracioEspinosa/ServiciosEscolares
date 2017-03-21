<?php
use Illuminate\Support\Facades\Cookie;
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

/**
 * Login & Index modules
 */

Route::get('/', 'Modules\ModulesController@index');
Route::get('/login', 'Modules\ModulesController@checkLogin');
Route::post('/login', 'Modules\ModulesController@login');

Route::get('/password/reset', 'Modules\ModulesController@reset');
Route::post('/password/reset', 'Modules\ModulesController@resetForm');
Route::post('/password/email', 'Modules\ModulesController@sendMail');
/**
 * Auth module
 */

Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/setToken', 'Auth\LoginController@setToken');

Route::resource('/profesores', 'Modules\Profesors\ProfesorsController@index');
Route::resource('/profesores/create', 'Modules\Profesors\ProfesorsController@create');
