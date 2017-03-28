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
        $datosPeriodos = PeriodosController::getInformation();
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

    public static function getInformationByID(Request $request){
        $idPeriodo = $request->input('id');
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

    public function createView()
    {
        $this->setUserHeader();
        $users=ModuleUsersController::getAllUsersInformation();
        $result = $this->result;
        return view('modules.periodos.create', compact('result', 'users'))->with("token", Cookie::get('token'));
    }
}
