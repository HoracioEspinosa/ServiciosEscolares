<?php

namespace Caribbean\Http\Controllers\Modules\Horarios;

use Caribbean\Http\Controllers\Modules\Users\ModuleUsersController;
use Illuminate\Http\Request;
use Caribbean\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use GuzzleHttp;

class HorariosController extends Controller
{
    private $result='';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setUserHeader();
        $users=ModuleUsersController::getAllUsersInformation();
        $informacion=$this->getInformation();

        $result=$this->result;
        return view('modules.horarios.horario', compact('result','users','informacion'));


    }
    public function disponible($id)
    {
        $this->setUserHeader();
        $users=ModuleUsersController::getAllUsersInformation();


        $informacion=$this->getInformationByIdProfesor($id);
        //dd($informacion);
        //$profesores=$this->getProfesores();

        $result=$this->result;
        return view('modules.horarios.TiempoDisponible', compact('result','users','informacion','id'));//,'profesores'));
    }

    public function getInformationByIdProfesor($idProfesor) {
        if (cookie::get('token') == "" || cookie::get('token') == null){
            return redirect('/login');
        }
        else{
            try{
                try{
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')]  );
                    $result = $client->get( 'api/horarios/get', [ 'headers' => $headers ] );
                    $result = $client->getBody()->getContents();
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
/*obtenemos la informacion del cliente*/

    public function getInformation(){
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
                    $result = $client->get( 'api/horarios/get', [ 'headers' => $headers ] );
                    $resultado= json_decode($result->getBody()->getContents(), JSON_PRETTY_PRINT);

                    return $resultado;
                }catch (ClientException $exception){;
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
