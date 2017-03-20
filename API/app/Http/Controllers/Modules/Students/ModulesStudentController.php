<?php


namespace App\Http\Controllers\Modules\Students;


use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

/**
 * Created by PhpStorm.
 * User: dany_
 * Date: 17/3/2017
 * Time: 11:12
 */
class ModulesStudentController extends Controller
{
    public function getInformation(){
        $info = DB::select('SELECT * FROM alumnos INNER JOIN informacion ON alumnos.idInformacionFK=informacion.idInformacion');
        $info = json_encode($info, true);
        return json_decode($info, JSON_PRETTY_PRINT);
    }

    public function getGrupos(){
        $grupos = DB::table('grupos')->get();
        $grupos = json_encode($grupos, true);
        return json_decode($grupos, JSON_PRETTY_PRINT);
    }

    public function getCarreras(){
        $carreras = DB::table('carreras')->get();
        $carreras = json_encode($carreras, true);
        return json_decode($carreras, JSON_PRETTY_PRINT);
    }

    public function getGeneracion(){
        $carreras = DB::table('carreras')->get();
        $carreras = json_encode($carreras, true);
        return json_decode($carreras, JSON_PRETTY_PRINT);
    }

    public function create(Request $request){
        $nombre = $request->input('name');
    }

    public function getInformationByIdAlumno(Request $request){
        $idAlumno = $request->input('idAlumnos');
        //dd($idAlumno);
        $info = DB::select('SELECT * FROM alumnos INNER JOIN informacion ON alumnos.idInformacionFK=informacion.idInformacion WHERE alumnos.idAlumnos='.$idAlumno);
        $info = json_encode($info, true);
        return json_decode($info, JSON_PRETTY_PRINT);
    }
}