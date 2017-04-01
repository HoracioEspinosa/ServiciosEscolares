<?php

namespace Caribbean\Http\Controllers\Modules\Periodos;

use Caribbean\Http\Controllers\Modules\Users\ModuleUsersController;
use Illuminate\Http\Request;
use Caribbean\Http\Controllers\Controller;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp;
use Illuminate\Cookie\CookieJar;
use Illuminate\Support\Facades\Cookie;

/**
 * Class ModulesController
 * @package Caribbean\Http\Controllers\Modules
 */
class PeriodosController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */

    private $result= '';
    public function index()
    {
    	# GET
        $this->setUserHeader();
        $users=ModuleUsersController::getAllUsersInformation();
        $result = $this->result;
        $datosPeriodos = $this->getInformation();
        //dd($datosPeriodos);
        return view('modules.periodos.index', compact('result', 'users', 'datosPeriodos'))->with("token", Cookie::get('token'));
    }

    /*
     *
     *
     */
    public function getInformation(){
        if (cookie::get('token') == "" || cookie::get('token') == null ) {
            return redirect('/login');
        }else{
            try{
                try{
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')]  );
                    $headers = [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $result = $client->get( 'api/periodos', [ 'headers' => $headers ] );
                    $result = json_decode($result->getBody()->getContents(), JSON_PRETTY_PRINT);
                    return $result;
                }catch (ClientException $exception){;
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }

    public function getInformationByID($id){
        if (cookie::get('token') == "" || cookie::get('token')  == null) {
            return redirect('/login');
        }
        else{
            try {
                try {

                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')]  );
                    $my_request = $client->request('POST', '/api/periodos/getByID', [
                        'form_params' => [
                            'id' => $id,
                        ],
                    ]);
                    $result = $my_request->getBody()->getContents();
                    $result = json_decode($result, JSON_PRETTY_PRINT);
                    //dd($result);
                    return $result;
                }catch (ClientException $exception){;
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                dd($serverException);
                //return redirect('/logout');
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

    public function create(Request $request){
        if (cookie::get('token') == "" || cookie::get('token')  == null) {
            return redirect('/login');
        }
        else{
            try{
                try{
                    $idPeriodo = $request->input('periodo');
                    $anio = $request->input('anio');
                    $status = 1;
                    if ($idPeriodo == 1){
                        $inicio = "enero";
                        $fin = "abril";
                    }elseif ($idPeriodo == 2){
                        $inicio = "mayo";
                        $fin = "agosto";
                    }else{
                        $inicio = "septiembre";
                        $fin = "diciembre";
                    }

                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                    $headers = [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $my_request = $client->request('POST', '/api/periodos/create', [
                        'form_params' => [
                            'startPeriod' => $inicio,
                            'endPeriod' => $fin,
                            'year' => $anio,
                            'status' => $status,
                        ],
                        'headers' => $headers
                    ]);
                    $result = $my_request->getBody()->getContents();
                    $result = json_decode($result, JSON_PRETTY_PRINT);
                    $result = $result[0];
                    if ($result['MESSAGE'] == 'OK') {
                        //return redirect('/periodos');
                        return 'OK';
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

    public function update(Request $request){
        if (cookie::get('token') == "" || cookie::get('token')  == null) {
            return redirect('/login');
        }
        else{
            try{
                try{
                    $idPeriodo = $request->input('id');
                    $tmpPeriodo = $request->input('periodo');
                    $anio = $request->input('anio');
                    if ($tmpPeriodo == 1){
                        $inicio = "enero";
                        $fin = "abril";
                    }elseif ($tmpPeriodo == 2){
                        $inicio = "mayo";
                        $fin = "agosto";
                    }else{
                        $inicio = "septiembre";
                        $fin = "diciembre";
                    }

                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                    $headers = [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $my_request = $client->request('POST', '/api/periodos/update', [
                        'form_params' => [
                            'id' => $idPeriodo,
                            'startPeriod' => $inicio,
                            'endPeriod' => $fin,
                            'year' => $anio,
                        ],
                        'headers' => $headers
                    ]);
                    $result = $my_request->getBody()->getContents();
                    return $result = json_decode($result, JSON_PRETTY_PRINT);
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

    public function delete(Request $request){
        if (cookie::get('token') == "" || cookie::get('token')  == null) {
            return redirect('/login');
        }
        else{
            try{
                try{
                    $idPeriodo = $request->input('id');
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                    $headers = [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $my_request = $client->request('POST', '/api/periodos/delete', [
                        'form_params' => [
                            'id' => $idPeriodo,
                        ],
                        'headers' => $headers
                    ]);
                    $result = $my_request->getBody()->getContents();
                    return $result = json_decode($result, JSON_PRETTY_PRINT);
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

    public function changeStatus(Request $request){
        if (cookie::get('token') == "" || cookie::get('token')  == null) {
            return redirect('/login');
        }
        else{
            try{
                try{
                    $idPeriodo = $request->input('id');
                    $status = $request->input('status');
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                    $headers = [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $my_request = $client->request('POST', '/api/periodos/changeStatus', [
                        'form_params' => [
                            'id' => $idPeriodo,
                            'status' => $status,
                        ],
                        'headers' => $headers
                    ]);
                    $result = $my_request->getBody()->getContents();
                    return $result = json_decode($result, JSON_PRETTY_PRINT);
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
    /*public function createView()
    {
        $this->setUserHeader();
        $users=ModuleUsersController::getAllUsersInformation();
        $result = $this->result;
        return view('modules.periodos.create', compact('result', 'users'))->with("token", Cookie::get('token'));
    }*/
}
