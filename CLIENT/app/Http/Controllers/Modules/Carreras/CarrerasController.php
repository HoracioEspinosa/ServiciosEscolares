<?php

namespace Caribbean\Http\Controllers\Modules\Carreras;

use Caribbean\Http\Controllers\Modules\Users\ModuleUsersController;
use Illuminate\Http\Request;
use Caribbean\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use GuzzleHttp;

class CarrerasController extends Controller
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
        $carreras=$this->getInformation();

        $result=$this->result;
        return view('modules.carreras.agregarCarrera', compact('result','users','carreras'));
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
                    $result = $client->get( 'api/carreras/get', [ 'headers' => $headers ] );
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
    public function create(Request $request)
    {


        if (cookie::get('token') == "" || cookie::get('token')  == null) {
            return redirect('/login');
        }else{
            try{
                try{
                    $test=array(
                        'clave'=>$request->input('clave'),
                        'nombre'=>$request->input('nombre'),
                        'tipo'=>$request->input('tipo'),
                        'estado'=>$request->input('estado'),
                        'grupo'=>$request->input('grupo')
                    );

                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                    $headers = [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $my_request = $client->request('POST', '/api/carreras/create', [
                        'form_params' => $test,
                        'headers' => $headers
                    ]);
                    $result = $my_request->getBody()->getContents();
                    /*$result = json_encode($result, true);*/
                    $result = json_decode($result, JSON_PRETTY_PRINT);
                    return $result;
                }catch (ClientException $exception){;
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            } catch (ServerException $serverException) {
                return redirect('/login');
            }
        }
    }
    //eliminar un elemento seleccinado en el registro de carreras
    public static function delete(Request $request) {
        try{
            try{
                $id = $request->input('clave');
                $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                $headers = [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ];
                $test = array(
                    'clave' => $id,
                );
                $my_request = $client->request('DELETE', '/api/carreras/delete', [ 'form_params' => $test, 'headers' => $headers ] );
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
