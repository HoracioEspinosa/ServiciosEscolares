<?php

namespace Caribbean\Http\Controllers\Modules\Students;
use Caribbean\Http\Controllers\Modules\Users;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Support\Facades\Cookie;
use GuzzleHttp;

/**
 * Created by PhpStorm.
 * User: dany_
 * Date: 16/3/2017
 * Time: 08:58
 */
class ModulesStudentController
{
    private $result = "";

    public function Create(){
        $this->setUserHeader();
        $users = Users\ModuleUsersController::getAllUsersInformation();
        $grupos = ModulesStudentController::getGrupos();
        $carreras = ModulesStudentController::getCarreras();
        //dd($grupos);
        $result = $this->result;
        return view('modules/students/create', compact('result', 'users', 'grupos', 'carreras'));
    }

    public function index(){
        $this->setUserHeader();
        $users = Users\ModuleUsersController::getAllUsersInformation();
        $result = $this->result;
        $allUsuarios = ModulesStudentController::getInformation();

        //dd($allUsuarios);
        return view('modules/students/index', compact('result', 'users', 'allUsuarios'))->with("token", Cookie::get('token'));
    }

    /**
     * @return string
     */
    public function getInformation() {
        if (cookie::get('token') == "" || cookie::get('token') == null){
            return redirect('/login');
        }
        else{
            try{
                try{
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')]  );
                    $headers = [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $result = $client->get( 'api/Alumnos', [ 'headers' => $headers ] );
                    $result= json_decode($result->getBody()->getContents(), JSON_PRETTY_PRINT);

                    return $result;
                }catch (ClientException $exception){
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }

    public function getGrupos(){
        if (cookie::get('token') == "" || cookie::get('token') == null){
            return redirect('/login');
        }
        else{
            try{
                try{
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')]  );
                    $headers = [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $result = $client->get( 'api/Alumnos/getGrupos', [ 'headers' => $headers ] );


                    $result = json_decode($result->getBody()->getContents(), JSON_PRETTY_PRINT);
                    return $result;
                }catch (ClientException $exception){
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }

    public function getCarreras(){
        if (cookie::get('token') == "" || cookie::get('token') == null){
            return redirect('/login');
        }
        else{
            try{
                try{
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')]  );
                    $headers = [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $result = $client->get( 'api/Alumnos/getCarreras', [ 'headers' => $headers ] );
                    $result = json_decode($result->getBody()->getContents(), JSON_PRETTY_PRINT);
                    return $result;
                }catch (ClientException $exception){
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }


    public function setUserHeader(){
        if (cookie::get('token') == "" || Cookie::get('token')  == null) {
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
                    //dd($resultado);
                    $this->result = $resultado;
                }catch (ClientException $exception){
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }
}