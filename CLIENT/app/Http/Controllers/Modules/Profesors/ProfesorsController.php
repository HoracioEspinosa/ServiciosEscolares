<?php

namespace Caribbean\Http\Controllers\Modules\Profesors;

use Caribbean\Http\Controllers\Modules\Users\ModuleUsersController;
use Caribbean\Http\Controllers\Modules\Users\UsersController;
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
        $users = ModuleUsersController::getAllUsersINformation();
        $result = $this->result;
        return view('profesores', compact('result', 'users'));
    }

    public function create()
    {
        $this->setUserHeader();
        $users = ModuleUsersController::getAllUsersINformation();
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
}