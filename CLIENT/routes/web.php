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

/**
 * Modulo periodo
 */

Route::get('/periodos', 'Modules\Periodos\PeriodosController@index');
Route::get('/periodos/information', 'Modules\Periodos\PeriodosController@getInformation');
Route::get('/periodos/update/{id}', 'Modules\Periodos\PeriodosController@getInformationByID');
Route::post('/periodos/create', 'Modules\Periodos\PeriodosController@create');
Route::post('/periodos/update', 'Modules\Periodos\PeriodosController@update');
Route::post('/periodos/delete', 'Modules\Periodos\PeriodosController@delete');
Route::post('/periodos/changeStatus', 'Modules\Periodos\PeriodosController@changeStatus');


/*Route::get('/horarios', function(){
	return view('horario');
});*/

Route::resource('/horarios', 'Modules\Horarios\HorariosController');
