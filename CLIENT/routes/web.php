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
 * Calificaciones
 */

Route::get('/calificaciones','Modules\Grades\ModuleGradesController@index');

/*Route::get('/horarios', function(){
	return view('horario');
});*/

Route::resource('/horarios', 'Modules\Horarios\HorariosController');
Route::resource('/horario/disponible', 'Modules\Horarios\TiempoDisponibleController');
Route::resource('/horario/docente', 'Modules\Horarios\HorarioDocenteController');


Route::resource('/horario/alumnos', 'Modules\Horarios\HorarioAlumnoController');
Route::resource('/horario/escolar', 'Modules\Horarios\HorarioAlumnoController');


Route::post('/carreras/create', 'Modules\Carreras\CarrerasControl   ler@create');
Route::delete('/carreras/delete', 'Modules\Carreras\CarrerasController@delete');
Route::resource('/carreras', 'Modules\Carreras\CarrerasController');

Route::get('/users/profile/{username}', 'Modules\Users\ModuleUsersController@profile');
Route::get('/users/get/id', 'Modules\Users\ModuleUsersController@getIDBranch');
Route::put('/users/update', 'Modules\Users\ModuleUsersController@updateX');
Route::delete('/users/delete', 'Modules\Users\ModuleUsersController@delete');
Route::put('/users/restore', 'Modules\Users\ModuleUsersController@restore');
Route::resource('/users', 'Modules\Users\ModuleUsersController');

Route::get('/profesores/create', 'Modules\Profesors\ProfesorsController@create');
Route::post('/profesores/create', 'Modules\Profesors\ProfesorsController@createProfesor');
Route::post('/profesores/update', 'Modules\Profesors\ProfesorsController@updateProfesor');
Route::resource('/profesores', 'Modules\Profesors\ProfesorsController');

