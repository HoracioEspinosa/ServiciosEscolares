<?php

namespace Caribbean\Http\Controllers\Modules\Students;
use Caribbean\Http\Controllers\Modules\Users;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\ServerException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use GuzzleHttp;

/**
 * Created by PhpStorm.
 * User: dany_
 * Date: 16/3/2017
 * Time: 08:58
 */
class ModulesStudentController
{
    private $result = "";

    public function create(){
        $this->setUserHeader();
        $users = Users\ModuleUsersController::getAllUsersInformation();
        $grupos = ModulesStudentController::getGrupos();
        $carreras = ModulesStudentController::getCarreras();
        $generaciones = ModulesStudentController::getGeneraciones();
        //dd($generaciones);
        $result = $this->result;
        return view('modules/students/create', compact('result', 'users', 'grupos', 'carreras', 'generaciones'));
    }

    public function index(){
        $this->setUserHeader();
        $users = Users\ModuleUsersController::getAllUsersInformation();
        $result = $this->result;
        $allUsuarios = ModulesStudentController::getInformation();

        //dd($allUsuarios);
        return view('modules/students/index', compact('result', 'users', 'allUsuarios'))->with("token", Cookie::get('token'));
    }

    public function update(Request $request){
        $this->setUserHeader();
        $result = $this->result;
        $alumno = $this->getInformationByIdAlumno($request->id);
        $alumno = $alumno[0];
        $grupos = ModulesStudentController::getGrupos();
        $carreras = ModulesStudentController::getCarreras();
        $generaciones = ModulesStudentController::getGeneraciones();
        return view('modules/students/update', compact('result', 'users', 'alumno', 'grupos', 'carreras', 'generaciones'))->with("token", Cookie::get('token'));
    }
    /**
     * @return string
     */
    public function getInformation() {
        if (cookie::get('token') == "" || cookie::get('token') == null){
            return redirect('/login');
        }
        else{
            try{
                try{
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')]  );
                    $headers = [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $result = $client->get( 'api/students', [ 'headers' => $headers ] );
                    $result= json_decode($result->getBody()->getContents(), JSON_PRETTY_PRINT);
                    return $result;
                }catch (ClientException $exception){
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }
    public function getInformationByIdAlumno($idAlumnos) {
        if (cookie::get('token') == "" || cookie::get('token') == null){
            return redirect('/login');
        }
        else{
            try{
                try{
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')]  );
                    $my_request = $client->request('POST', '/api/students/update', [
                        'form_params' => [
                            'idAlumnos' => $idAlumnos,
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

    public function getGrupos(){
        if (cookie::get('token') == "" || cookie::get('token') == null){
            return redirect('/login');
        }
        else{
            try{
                try{
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')]  );
                    $headers = [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $result = $client->get( 'api/students/getGrupos', [ 'headers' => $headers ] );


                    $result = json_decode($result->getBody()->getContents(), JSON_PRETTY_PRINT);
                    return $result;
                }catch (ClientException $exception){
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }

    public function getCarreras(){
        if (cookie::get('token') == "" || cookie::get('token') == null){
            return redirect('/login');
        }
        else{
            try{
                try{
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')]  );
                    $headers = [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $result = $client->get( 'api/students/getCarreras', [ 'headers' => $headers ] );
                    $result = json_decode($result->getBody()->getContents(), JSON_PRETTY_PRINT);
                    return $result;
                }catch (ClientException $exception){
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }

    public function getGeneraciones(){
        if (cookie::get('token') == "" || cookie::get('token') == null){
            return redirect('/login');
        }
        else{
            try{
                try{
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')]  );
                    $headers = [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $result = $client->get( 'api/students/getGeneraciones', [ 'headers' => $headers ] );
                    $result = json_decode($result->getBody()->getContents(), JSON_PRETTY_PRINT);
                    return $result;
                }catch (ClientException $exception){
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }

    public  function updateStudent(Request $request){
        if (cookie::get('token') == "" || cookie::get('token')  == null) {
            return redirect('/login');
        }
        else{
            try{
                try{
                    $idInformacion = $request->id;
                    $name = $request->input('name');
                    $lastname = $request->input('lastname');
                    $genero = $request->input('genero');
                    $age = $request->input('age');
                    $curp = $request->input('curp');
                    $foto = 'Foto cambiada';
                    if ($request->input('estado') == 'on')
                        $estado = 'Activo';
                    else
                        $estado = 'Inactivo';
                    $matricula = $request->input('matricula');
                    $turno = $request->input('turno');
                    $carrera = $request->input('carrera');
                    $grupo = $request->input('grupo');
                    $generacion = $request->input('generacion');
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                    $headers = [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $my_request = $client->request('POST', '/api/students/updateAlumno', [
                        'form_params' => [
                            'name' => $name,
                            'lastname' => $lastname,
                            'genero' => $genero,
                            'age' => $age,
                            'curp' => $curp,
                            'foto' => $foto,
                            'estado' => $estado,
                            'matricula' => $matricula,
                            'turno' => $turno,
                            'carrera' => $carrera,
                            'grupo' => $grupo,
                            'generacion' => $generacion,
                            'idInformacion' => $idInformacion,
                        ],
                        'headers' => $headers
                    ]);
                    $result = $my_request->getBody()->getContents();
                    //dd ($result);
                    $result = json_decode($result, JSON_PRETTY_PRINT);
                    $result = $result[0];
                    if ($result['MESSAGE'] == 'OK') {
                        return redirect('/students?2');
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

    public function createStudent(Request $request){
        if (cookie::get('token') == "" || cookie::get('token')  == null) {
            return redirect('/login');
        }
        else{
            try{
                try{
                    $name = $request->input('name');
                    $lastname = $request->input('lastname');
                    $genero = $request->input('genero');
                    $age = $request->input('age');
                    $curp = $request->input('curp');
                    $matricula = $request->input('matricula');
                    $turno = $request->input('turno');
                    $carrera = $request->input('carrera');
                    $grupo = $request->input('grupo');
                    $generacion = $request->input('generacion');
                    $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
                    $headers = [
                        'Content-Type' => 'application/x-www-form-urlencoded',
                        'Authorization' => 'Bearer '. cookie::get('token'),
                    ];
                    $my_request = $client->request('POST', '/api/students/create', [
                        'form_params' => [
                            'name' => $name,
                            'lastname' => $lastname,
                            'genero' => $genero,
                            'age' => $age,
                            'curp' => $curp,
                            'matricula' => $matricula,
                            'turno' => $turno,
                            'carrera' => $carrera,
                            'grupo' => $grupo,
                            'generacion' => $generacion,
                        ],
                        'headers' => $headers
                    ]);
                    $result = $my_request->getBody()->getContents();
                    //dd ($result);
                    $result = json_decode($result, JSON_PRETTY_PRINT);
                    $result = $result[0];
                    if ($result['MESSAGE'] == 'OK') {
                        return redirect('/students?1');
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
                    //dd($resultado);
                    $this->result = $resultado;
                }catch (ClientException $exception){
                    return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
                }
            }catch (ServerException $serverException) {
                return redirect('/logout');
            }
        }
    }
}