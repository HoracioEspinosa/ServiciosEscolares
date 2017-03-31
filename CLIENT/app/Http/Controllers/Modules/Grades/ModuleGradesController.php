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
            //dd($result);
            if($result['tipo']==3){
                $userInf=$this->getStudentInfobyId($result['idUsuarios']);
                //dd($userInf);
                $studentGroup=$this->getStudentGroupbyId($userInf[0]);
                //dd($studentGroup);
                $studentCareer=$this->getStudentCareerbyId($studentGroup[0]);
                //dd($studentCareer);
                $studentSubject=$this->getStudentSubjectbyId($userInf[0]);
                //dd($studentSubject);
                $studentGrades=$this->getStudentGrades($userInf[0]);
                return view('modules.grades.calif', compact('result', 'users','userInf','studentGroup','studentCareer','studentSubject','studentGrades'));
            }
            elseif ($result['tipo']==2){
                return view('modules.grades.califprof',compact('result', 'users'));
            }


        } catch (\Exception $ex) {
            return $ex;
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

    public function getStudentInfobyId($idUsuarios){
        try{

            $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
            $headers = [
                'Content-Type' => 'application/x-www-form-urlencoded'
            ];
            $my_request = $client->request('POST', '/api/calificaciones/info', [
                'form_params' => [
                    'idUsuarios' => $idUsuarios
                ],
                'headers' => $headers
            ]);
            $result = $my_request->getBody()->getContents();
            $result = json_decode($result, JSON_PRETTY_PRINT);
            return $result;

        }catch (ClientException $exception){;
            return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
        }
    }

    public function getStudentGroupbyId($idAlumnos){
        try{

            $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
            $headers = [
                'Content-Type' => 'application/x-www-form-urlencoded'
            ];
            $my_request = $client->request('POST', '/api/calificaciones/infoGroup', [
                'form_params' => [
                    'idAlumnos' => $idAlumnos
                ],
                'headers' => $headers
            ]);
            $result = $my_request->getBody()->getContents();
            $result = json_decode($result, JSON_PRETTY_PRINT);
            return $result;

        }catch (ClientException $exception){;
            return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
        }
    }

    public function getStudentCareerbyId($idGrupos){
        try{

            $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
            $headers = [
                'Content-Type' => 'application/x-www-form-urlencoded'
            ];
            $my_request = $client->request('POST', '/api/calificaciones/infoCareer', [
                'form_params' => [
                    'idGrupos' => $idGrupos
                ],
                'headers' => $headers
            ]);
            $result = $my_request->getBody()->getContents();
            $result = json_decode($result, JSON_PRETTY_PRINT);
            return $result;

        }catch (ClientException $exception){;
            return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
        }
    }

    public function getStudentSubjectbyId($idAlumnos){
        try{

            $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
            $headers = [
                'Content-Type' => 'application/x-www-form-urlencoded'
            ];
            $my_request = $client->request('POST', '/api/calificaciones/infoGrades', [
                'form_params' => [
                    'idAlumnos' => $idAlumnos
                ],
                'headers' => $headers
            ]);
            $result = $my_request->getBody()->getContents();
            $result = json_decode($result, JSON_PRETTY_PRINT);
            return $result;

        }catch (ClientException $exception){;
            return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
        }
    }

    public function getStudentGrades($idAlumnos){
        try{

            $client = new GuzzleHttp\Client( ['base_uri' => env('SERVER_API')] );
            $headers = [
                'Content-Type' => 'application/x-www-form-urlencoded'
            ];
            $my_request = $client->request('POST', '/api/calificaciones/infoGradesUnit', [
                'form_params' => [
                    'idAlumnos' => $idAlumnos
                ],
                'headers' => $headers
            ]);
            $result = $my_request->getBody()->getContents();
            $result = json_decode($result, JSON_PRETTY_PRINT);
            return $result;

        }catch (ClientException $exception){;
            return json_decode($exception->getResponse()->getBody()->getContents(), JSON_PRETTY_PRINT);
        }
    }




}
