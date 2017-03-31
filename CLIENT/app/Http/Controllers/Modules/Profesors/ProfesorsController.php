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

    public function create(Request $request)
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
                    $plname = $request->input('plname');
                    $mlname = $request->input('mlname');
                    $cedula = $request->input('cedula');
                    $email = $request->input('email');
                    $phone = $request->input('phone');
                    $notes = $request->input('notes');
                    $estatus = $request->input('estatus');
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                    $headers = [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $my_request = $client->request('POST', '/api/profesor/create', [
                        'form_params' => [
                            'name' => $name,
                            'plname' => $plname,
                            'mlname' => $mlname,
                            'cedula' => $cedula,
                            'email' => $email,
                            'phone' => $phone,
                            'notes' => $notes,
                            'estatus' => $estatus
                        ],
                        'headers' => $headers
                    ]);
                    $result = $my_request->getBody()->getContents();
                    //dd ($result);
                    $result = json_decode($result, JSON_PRETTY_PRINT);
                    $result = $result[0];
                    if ($result['MESSAGE'] == 'OK') {
                        return redirect('/profesores');
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

    public function getInformationByIdProfesor($idProfesor) {
        if (cookie::get('token') == "" || cookie::get('token') == null){
            return redirect('/login');
        }
        else{
            try{
                try{
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')]  );
                    $my_request = $client->request('POST', '/profesors/get/tablebyid', [
                        'form_params' => [
                            'idProfesor' => $idProfesor,
                        ],
                    ]);
                    $result = $my_request->getBody()->getContents();
                    $result = json_decode($result, JSON_PRETTY_PRINT);
                    //dd($result);
                    return $result;
                }catch (ClientException $exception){
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }

    public function updateProfesor (Request $request){
        if (cookie::get('token') == "" || cookie::get('token')  == null) {
            return redirect('/login');
        }
        else{
            try{
                try{

                    $idInformacion = $request->input('idInformacion');
                    $name = $request->input('modname');
                    $plname = $request->input('modplname');
                    $mlname = $request->input('modmlname');
                    $cedula = $request->input('modcedula');
                    $email = $request->input('modemail');
                    $phone = $request->input('modphone');
                    $notes = $request->input('modnotes');
                    $estatus = $request->input('modestatus');
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                    $headers = [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $my_request = $client->request('POST', '/api/profesors/get/update', [
                        'form_params' => [
                            'modname' => $name,
                            'modplname' => $plname,
                            'modmlname' => $mlname,
                            'modcedula' => $cedula,
                            'modemail' => $email,
                            'modphone' => $phone,
                            'modnotes' => $notes,
                            'modestatus' => $estatus,
                            'idInformacion' => $idInformacion
                        ],
                        'headers' => $headers
                    ]);
                    $result = $my_request->getBody()->getContents();
                    //dd ($result);
                    $result = json_decode($result, JSON_PRETTY_PRINT);
                    $result = $result[0];
                    if ($result['MESSAGE'] == 'OK') {
                        return redirect('/profesores');
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