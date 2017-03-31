<?php

namespace Caribbean\Http\Controllers\Modules\Groups;

use Caribbean\Http\Controllers\Controller;
use Caribbean\Http\Controllers\Modules\Users\ModuleUsersController;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Support\Facades\Cookie;
use GuzzleHttp;

class GroupsController extends Controller{
    private $result='';
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
                    $this->result = $resultado;
                }catch (ClientException $exception){;
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }
    public function getHorarios(){
        try{
            try{
                $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                $headers = [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => 'Bearer '. cookie::get('token'),
                ];
                $my_request = $client->request('GET', '/api/input/getHorarios', [ 'headers' => $headers ] );
                $horarios = $my_request->getBody()->getContents();
                $horarios = json_decode($horarios, JSON_PRETTY_PRINT);
                return $horarios;
            }catch (ClientException $exception){;
                return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
            }
        }catch (ServerException $serverException) {

            return $serverException;
        }
    }
    public function getCarreras(){
        try{
            try{
                $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                $headers = [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => 'Bearer '. cookie::get('token'),
                ];
                $my_request = $client->request('GET', '/api/input/getCarreras', [ 'headers' => $headers ] );
                $carreras = $my_request->getBody()->getContents();
                $carreras = json_decode($carreras, JSON_PRETTY_PRINT);
                return $carreras;
            }catch (ClientException $exception){;
                return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
            }
        }catch (ServerException $serverException) {

            return $serverException;
        }
    }

    public function getAllStudentsById($id)
    {
        try{
            try{
                $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                $headers = [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => 'Bearer '. cookie::get('token'),
                ];
                $my_request = $client->request('GET', '/api/groups/'.$id, [ 'headers' => $headers ] );
                $result = $my_request->getBody()->getContents();
                return $result;
            }catch (ClientException $exception){;
                return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
            }
        }catch (ServerException $serverException) {

            return $serverException;
        }
    }

    public function getAllGroups(){
        try{
            try{
                $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                $headers = [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => 'Bearer '. cookie::get('token'),
                ];
                $my_request = $client->request('GET', '/api/groups', [ 'headers' => $headers ] );
                $result = $my_request->getBody()->getContents();
                $result = json_decode($result, JSON_PRETTY_PRINT);
                return $result;
            }catch (ClientException $exception){;
                return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
            }
        }catch (ServerException $serverException) {
            return $serverException;
        }
    }
    public function index()
    {
        $this->setUserHeader();
        $users=ModuleUsersController::getAllUsersInformation();
        $result=$this->result;
        $groups = $this->getAllGroups();
        return view('modules.groups.index', compact('result','users', 'groups'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setUserHeader();
        $users=ModuleUsersController::getAllUsersInformation();
        $result=$this->result;
        $horarios = $this->getHorarios();
        $carreras = $this->getCarreras();
        return view('modules.groups.create', compact('result','users', 'horarios', 'carreras'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $nombre = $request->input('nombre');
            $cantidad = "0";
            $horario = $request->get('horario');
            $carrera = $request->get('carrera');
            $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
            $headers = [
                'Content-Type' => 'application/x-www-form-urlencoded',
                'Authorization' => 'Bearer '. cookie::get('token'),
            ];
            $my_request = $client->request('POST', '/api/groups', [
                'form_params' => [
                    'nombre' => $nombre,
                    'cantidadAlumnos' => $cantidad,
                    'Horarios_idHorarios' => $horario,
                    'Carreras_idCarreras' => $carrera,
                ],
                'headers' => $headers
            ]);
            $result = $my_request->getBody()->getContents();
            $result = json_decode($result, JSON_PRETTY_PRINT);
            $result = $result[0];
            if ($result['MESSAGE'] == 'OK') {
                return redirect('/grupos');
            }
            else{
            }
            //return $result;
        }catch (ClientException $exception){
            //dd($exception->getResponse()->getBody()->getContents());
            return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->setUserHeader();
        $users=ModuleUsersController::getAllUsersInformation();
        $result=$this->result;
        return view('modules.groups.groupInfo', compact('result','users', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
