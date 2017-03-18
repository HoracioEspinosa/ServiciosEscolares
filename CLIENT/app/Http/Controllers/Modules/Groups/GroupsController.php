<?php

namespace Caribbean\Http\Controllers\Modules\Groups;

use Caribbean\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Support\Facades\Cookie;
use GuzzleHttp;

class GroupsController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
    public function index(){
        $branch_offices = null;
        if (cookie::get('token') == "" || cookie::get('token')  == null) {
            return redirect('/groups');
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
                }catch (ClientException $exception){
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
        return view('modules.groups.index', compact('result', 'users', 'branch_offices'));
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