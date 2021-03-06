<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('jwt.auth');

Route::get('/students', 'Modules\Students\ModulesStudentController@getInformation');
Route::post('/students/create', 'Modules\Students\ModulesStudentController@create');
Route::post('/students/update', 'Modules\Students\ModulesStudentController@getInformationByIdAlumno');
Route::post('/students/updateAlumno', 'Modules\Students\ModulesStudentController@update');
Route::get('/students/getGrupos', 'Modules\Students\ModulesStudentController@getGrupos');
Route::get('/students/getCarreras', 'Modules\Students\ModulesStudentController@getCarreras');
Route::get('/students/getGeneraciones', 'Modules\Students\ModulesStudentController@getGeneraciones');

Route::post('/users/create', 'ModuleUsersController@create')->middleware('jwt.auth');
Route::put('/users/update', 'ModuleUsersController@update');
Route::delete('/users/delete', 'ModuleUsersController@delete');
Route::put('/users/restore', 'ModuleUsersController@restore');
Route::get('/users/list', 'ModuleUsersController@get');
Route::get('/users/get/id', 'ModuleUsersController@getBranchID');
Route::get('/users/profile/username', 'ModuleUsersController@getAllUserInformationByUsername');

Route::get('/users/get/all', 'ModuleUsersController@getAllUsersInformation')->middleware('jwt.auth');

Route::get('/profesors/get/table', 'modules\profesores\ProfesorController@getAllProfesorsInformation');
Route::get('/profesors/get/tablebyid/{idProfesor}', 'modules\profesores\ProfesorController@getInformationByIdProfesor');
Route::post('/profesors/get/update', 'modules\profesores\ProfesorController@update');
Route::post('profesor/create', 'modules\profesores\ProfesorController@create');


Route::post('/login', 'ModuleUsersController@login')->middleware('jwt.auth');

Route::post('auth', 'Api\AuthController@authenticate');
Route::get('auth/me', 'Api\AuthController@getAuthenticatedUser');

Route::post('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

Route::resource('/groups', 'Modules\Groups\GroupsController');
Route::get('/input/getHorarios', 'Modules\Groups\GroupsController@getHorarios');
Route::get('/input/getCarreras', 'Modules\Groups\GroupsController@getCarreras');

Route::get('/carreras/get', 'Modules\Carreras\CarrerasController@getInformation');
Route::post('/carreras/create', 'Modules\Carreras\CarrerasController@create');
Route::delete('/carreras/delete', 'Modules\Carreras\CarrerasController@delete');
Route::resource('/carreras', 'Modules\Carreras\CarrerasController');


Route::get('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

Route::get('/periodos', 'Modules\Periodos\PeriodosController@getInfo');
Route::post('/periodos/getByID', 'Modules\Periodos\PeriodosController@getInfoByID');
Route::post('/periodos/create', 'Modules\Periodos\PeriodosController@create');
Route::post('/periodos/update', 'Modules\Periodos\PeriodosController@update');
Route::post('/periodos/delete', 'Modules\Periodos\PeriodosController@delete');
Route::post('/periodos/changeStatus', 'Modules\Periodos\PeriodosController@changeStatus');




//Route::get('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::post('/calificaciones/info','Grades\ModuleGradesController@getStudentInfo');
Route::post('/calificaciones/infoGroup','Grades\ModuleGradesController@getStudentGroup');
Route::post('/calificaciones/infoCareer','Grades\ModuleGradesController@getStudentCareer');
Route::post('/calificaciones/infoGrades','Grades\ModuleGradesController@getStudentGrades');
Route::post('/calificaciones/infoGradesUnit','Grades\ModuleGradesController@getStudentGradesUnit');
//Route::resource('/calificaciones','Grades\ModuleGradesController');

Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

