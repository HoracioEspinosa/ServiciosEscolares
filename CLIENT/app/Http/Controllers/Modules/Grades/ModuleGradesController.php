<?php

namespace Caribbean\Http\Controllers\Modules\Grades;

use Caribbean\Http\Controllers\Controller;
use Caribbean\Http\Controllers\Modules\Users\ModuleUsersController;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Support\Facades\Cookie;
use GuzzleHttp;
/**
 * Class ModuleGradesController
 * @package Caribbean\Http\Controllers\Grades
 */
class ModuleGradesController extends Controller
{
    private $result = '';
    public function index(){
        try {
            $this->setUserHeader();
            $result = $this->result;
            $users = ModuleUsersController::getAllUsersInformation();
            return view('modules.grades.calif', compact('result', 'users'));
        } catch (\Exception $ex) {
            return 'Hubo un error';
        }
        //return view('modules.grades.index');
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

    public static function getPeriodByUsername($username)
    {
        if (cookie::get('token') == "" || cookie::get('token')  == null) {
            return redirect('/login');
        }else{
            try{
                try{
                    $client = new GuzzleHttp\Client(
                        ['base_uri' => env('SERVER_API')]
                    );
                    $headers = [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    //return $username;
                    $result = $client->get('api/users/profile/username?username='.$username, [ 'headers' => $headers ] );
                    return json_decode($result->getBody()->getContents(), JSON_PRETTY_PRINT);
                }catch (ClientException $exception){;
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return json_decode($serverException->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
            }
        }
    }


}