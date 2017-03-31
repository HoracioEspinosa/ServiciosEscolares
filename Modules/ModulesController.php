<?php

namespace Caribbean\Http\Controllers\Modules;

use Caribbean\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp;
use Illuminate\Cookie\CookieJar;
use Illuminate\Support\Facades\Cookie;

/**
 * Class ModulesController
 * @package Caribbean\Http\Controllers\Modules
 */
class ModulesController extends Controller
{
    public $token;
    public $result = "";

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View|mixed
     */
    public function index() {
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
                    $result = $client->get( 'api/auth/me', [ 'headers' => $headers ] );
                    $result = json_decode($result->getBody()->getContents(), JSON_PRETTY_PRINT)["user"];
                    return view('index', compact('result'))->with("token", Cookie::get('token'));
                }catch (ClientException $exception){;
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function login(Request $request, CookieJar $cookieJar) {
        //return $this->deleteCookie();
        if(cookie::get('token') == "" || cookie::get('token') == null ) {
            //return "no tiene token";
            try{
                try{
                    $username = $request->input('username');
                    $password = $request->input('password');
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                    $my_request= $client->post(
                        '/api/auth', [
                            'form_params' => [
                                'usuario' => $username,
                                'password' => $password
                            ],
                        ]
                    );
                    $result = $my_request->getBody()->getContents();
                    $result = json_decode($result, JSON_PRETTY_PRINT);
                    $cookieJar->queue(cookie('token', $result["token"], 45000));
                    return $result;
                }catch (ClientException $exception){
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                echo $serverException;

                return json_decode($serverException->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
            }
        }else{
            $token = array("token" => cookie::get('token'));
            $token = json_encode($token);
            $cookieJar->queue(cookie('token', $token, 45000));
            return json_decode($token, JSON_PRETTY_PRINT);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function checkLogin(Request $request, CookieJar $cookieJar) {
        if (cookie::get('token') == "" || cookie::get('token')  == null) {
            return view('auth.login');
        }else{
            return redirect('/');
        }
        return redirect('/');
    }

    public  function deleteCookie(){
        if (Cookie::queue(Cookie::forget('token'))){
            return 'OK';
        }else{
            return 'NOT FOUND';
        }
    }

    public static function setUserHeader(){
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
                    return $resultado;
                }catch (ClientException $exception){;
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }

    public static function reset() {
        return view('auth.reset-password');
    }

    public static function resetForm(Request $request) {
        //password/reset
        try{
            try{
                $email = $request->input('email');
                $token = $request->input('token');
                $password = $request->input('password');
                $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                $headers = [
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ];
                $my_request = $client->request('POST', '/api/password/reset', [
                    'form_params' => [
                        'email' => $email,
                        'token' => $token,
                        'password' => $password
                    ],
                    'headers' => $headers
                ]);
                $result = $my_request->getBody()->getContents();
                $result = json_decode($result, JSON_PRETTY_PRINT);
                return $result;
            }catch (ClientException $exception){;
                return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
            }
        }catch (ServerException $serverException) {
            return redirect('/login');
        }
    }

    public static function sendMail(Request $request) {
        try{
            try{
                $email = $request->input('email');
                $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                $headers = [
                    'Content-Type' => 'application/x-www-form-urlencoded'
                ];
                $my_request = $client->request('POST', '/api/password/email', [
                    'form_params' => [
                        'email' => $email
                    ],
                    'headers' => $headers
                ]);
                $result = $my_request->getBody()->getContents();
                $result = json_decode($result, JSON_PRETTY_PRINT);
                return $result;
            }catch (ClientException $exception){;
                return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
            }
        }catch (ServerException $serverException) {
            echo $serverException;
        }
    }
}