<?php

namespace Caribbean\Http\Controllers\Modules\Users;

use Caribbean\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Support\Facades\Cookie;
use GuzzleHttp;
/**
 * Class ModuleUsersController
 * @package Caribbean\Http\Controllers\Users
 */
class ModuleUsersController extends Controller
{
    public $result = "";

    public function profile($username = null)
    {
       try {
           $this->setUserHeader();
           $result = $this->result;
           $active = $this->getUserInformatioByUsername($username);
           if(!isset($active)) {
               return redirect('/');
           }
           return view('modules.users.profile', compact('result', 'active'));
       } catch (\Exception $ex) {
           return redirect('/');
       }
    }
    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index() {
        $branch_offices = null;
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
                    $result = $client->get(
                        'api/departments/branch-names', [
                            'headers' => $headers
                        ]
                    );
                    $branch_offices = $result->getBody()->getContents();
                }catch (ClientException $exception){;
                    //return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                //return json_decode($serverException->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
            }
        }
        $branch_offices = json_decode($branch_offices);

        $this->setUserHeader();
        $result = $this->result;
        $users = $this->getAllUsersInformation();
        return view('modules.users.index', compact('result', 'users', 'branch_offices'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public static function getUserInformation() {
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
                    $result = $client->get(
                        'api/getUserData', [
                            'headers' => $headers
                        ]
                    );
                    return json_decode($result->getBody()->getContents(), JSON_PRETTY_PRINT);
                }catch (ClientException $exception){;
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return json_decode($serverException->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
            }
        }
    }

    public static function getUserInformatioByUsername($username)
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

    public static function getAllUsersInformation() {
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
                    $result = $client->get(
                        'api/users/get/all', [
                            'headers' => $headers
                        ]
                    );
                    return json_decode($result->getBody()->getContents(), JSON_PRETTY_PRINT);
                }catch (ClientException $exception){;
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return json_decode($serverException->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
            }
        }
    }

    public static function getIDBranch(Request $request) {
        if (cookie::get('token') == "" || cookie::get('token')  == null) {
            return redirect('/login');
        }else{
            try{
                try{
                    $id = $request->input('id');
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                    $headers = [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $my_request = $client->request('POST', '/api/users/get/branch/id', [
                        'form_params' => [
                            'id' => $id,
                        ],
                        'headers' => $headers
                    ]);
                    $result = $my_request->getBody()->getContents();
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed|string
     */
    public static function getDepartmentsByBranch(Request $request) {
        if (cookie::get('token') == "" || cookie::get('token')  == null) {
            return redirect('/login');
        }else{
            try{
                try{
                    $id = $request->input('id');
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                    $headers = [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $my_request = $client->request('POST', '/api/users/departments/get/id', [
                        'form_params' => [
                            'id' => $id,
                        ],
                        'headers' => $headers
                    ]);
                    $result = $my_request->getBody()->getContents();
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

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed|string
     */
    public static function create(Request $request) {
        try{
            try{
                $code           =   $request->input('code');
                $branchId       =   $request->input('branch_id');

                $name           =   $request->input('name');
                $lastname       =   $request->input('lastname');
                $username       =   $request->input('username');
                $status         =   $request->input('status');
                $email          =   $request->input('email');
                $iDdepartment   =   $request->input('department_id');
                $type           =   $request->input('type');
                $phone          =   $request->input('mask_phone');
                $address        =   $request->input('address');
                $age            =   $request->input('age');
                $gender         =   $request->input('gender');


                $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                $headers = [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => 'Bearer '. cookie::get('token'),
                ];
                $my_request = $client->request('POST', '/api/users/create', [
                    'form_params' => [
                        'name' => $name,
                        'lastname' => $lastname,
                        'username' => $username,
                        'status' => $status,
                        'email' => $email,
                        'department_id' => $iDdepartment,
                        'type' => $type,
                        'phone' => $phone,
                        'address' => $address,
                        'age' => $age,
                        'gender' => $gender
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

    /**
     * @param Request $request
     * @return \Exception|ServerException|mixed|string
     */
    public static function updateX(Request $request) {
        try{
            try{
                $id             =   $request->input('identificator');
                $name           =   $request->input('name');
                $lastname       =   $request->input('lastname');
                $email          =   $request->input('email');
                $age            =   $request->input('age');
                $phone          =   $request->input('mask_phone');
                $gender         =   $request->input('gender');
                $type           =   $request->input('type');
                $iDdepartment   =   $request->input('department_id');
                $status         =   $request->input('status');
                $address        =   $request->input('address');

                $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                $headers = [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ];

                $params = array(
                    'id' => $id,
                    'name' => $name,
                    'lastname' => $lastname,
                    'email' => $email,
                    'age' => $age,
                    'phone' => $phone,
                    'gender' => $gender,
                    'type' => $type,
                    'department_id' => $iDdepartment,
                    'status' => $status,
                    'address' => $address
                );

                //$cosa = json_encode($params, true);
                //return json_decode($cosa, JSON_PRETTY_PRINT);
                $my_request = $client->request('PUT', '/api/users/update', [ 'form_params' => $params, 'headers' => $headers ] );
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

    public static function delete(Request $request) {
        try{
            try{
                $id = $request->input('id');
                $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                $headers = [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ];
                $params = array(
                    'id' => $id,
                );
                $my_request = $client->request('DELETE', '/api/users/delete', [ 'form_params' => $params, 'headers' => $headers ] );
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

    public function getRecords() {
        try{
            try{
                $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                $headers = [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => 'Bearer '. cookie::get('token'),
                ];
                $my_request = $client->request('GET', '/api/users/records', [ 'headers' => $headers ] );
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

    public function restore(Request $request) {
        try{
            try{
                $id = $request->input('id');
                $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                $headers = [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                    'Authorization' => 'Bearer '. cookie::get('token'),
                ];
                $params = array(
                    'id' => $id,
                );
                $my_request = $client->request('PUT', '/api/users/restore', [ 'form_params' => $params, 'headers' => $headers ]  );
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
}