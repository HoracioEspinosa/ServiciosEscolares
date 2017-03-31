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


Route::post('/users/create', 'ModuleUsersController@create')->middleware('jwt.auth');
Route::put('/users/update', 'ModuleUsersController@update');
Route::delete('/users/delete', 'ModuleUsersController@delete');
Route::put('/users/restore', 'ModuleUsersController@restore');

Route::post('/login', 'ModuleUsersController@login')->middleware('jwt.auth');

Route::post('auth', 'Api\AuthController@authenticate');
Route::get('auth/me', 'Api\AuthController@getAuthenticatedUser');

Route::post('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

//Route::get('/horarios/get', 'Modules\Horarios\HorarioController@getInformation');
Route::get('/horarios/get', 'Modules\Horarios\HorarioController@getInformationByIdProfesor');
Route::resource('/horarios', 'Modules\Horarios\HorarioController');

Route::get('/carreras/get', 'Modules\Carreras\CarrerasController@getInformation');
Route::post('/carreras/create', 'Modules\Carreras\CarrerasController@create');
Route::delete('/carreras/delete', 'Modules\Carreras\CarrerasController@delete');
Route::resource('/carreras', 'Modules\Carreras\CarrerasController');

//Route::get('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');