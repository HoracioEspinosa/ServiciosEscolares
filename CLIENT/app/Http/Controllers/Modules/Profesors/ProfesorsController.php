<?php

namespace Caribbean\Http\Controllers\Modules\Profesors;

use Caribbean\Http\Controllers\Modules\Users\ModuleUsersController;
use Illuminate\Http\Request;
use Caribbean\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use GuzzleHttp;

/**
 * Created by PhpStorm.
 * User: Lic. José Ángel Peña Godínez
 * Date: 19/03/2017
 * Time: 15:52
 */



class ProfesorsController extends Controller
{
    private $result = "";

    public function index()
    {
        $this->setUserHeader();
        $users = ModuleUsersController::getAllUsersInformation();
        $result = $this->result;
        return view('profesores', compact('result', 'users'));
    }

    public function create()
    {
        $this->setUserHeader();
        $users = ModuleUsersController::getAllUsersInformation();
        $result = $this->result;
        return view('agregarProfesor', compact('result', 'users'));
    }


    public function setUserHeader(){
        if (cookie::get('token') == "" || cookie::get('token')  == null) {
            return redirect('/login');
        }else{
            try{
                try{
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')]  );
                    $headers = [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $result = $client->get( 'api/auth/me', [ 'headers' => $headers ] );
                    $resultado= json_decode($result->getBody()->getContents(), JSON_PRETTY_PRINT)["user"];
                    $this->result=$resultado;
                }catch (ClientException $exception){;
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }

    public function createProfesor(Request $request)
    {
        if (cookie::get('token') == "" || cookie::get('token')  == null) {
            return redirect('/login');
        }
        else{
            try{
                try{
                    $name = $request->input('name');
                    $lastname = $request->input('plname' + ' ' + 'mlname');
                    $cedula = $request->input('cedula');
                    $genero = $request->input('genero');
                    $age = $request->input('age');
                    $curp = $request->input('curp');
                    $matricula = $request->input('matricula');
                    $turno = $request->input('turno');
                    $carrera = $request->input('carrera');
                    $grupo = $request->input('grupo');
                    $generacion = $request->input('generacion');
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                    $headers = [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $my_request = $client->request('POST', '/api/students/create', [
                        'form_params' => [
                            'name' => $name,
                            'lastname' => $lastname,
                            'genero' => $genero,
                            'age' => $age,
                            'curp' => $curp,
                            'matricula' => $matricula,
                            'turno' => $turno,
                            'carrera' => $carrera,
                            'grupo' => $grupo,
                            'generacion' => $generacion,
                        ],
                        'headers' => $headers
                    ]);
                    $result = $my_request->getBody()->getContents();
                    //dd ($result);
                    $result = json_decode($result, JSON_PRETTY_PRINT);
                    $result = $result[0];
                    if ($result['MESSAGE'] == 'OK') {
                        return redirect('/students?1');
                    }
                    else{
                    }
                    //return $result;
                }catch (ClientException $exception){
                    //dd($exception->getResponse()->getBody()->getContents());
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            } catch (ServerException $serverException) {
                //dd($serverException);
                return redirect('/login');
            }
        }
    }
}