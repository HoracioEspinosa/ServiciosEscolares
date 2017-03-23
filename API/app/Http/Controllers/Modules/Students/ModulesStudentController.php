<?php


namespace App\Http\Controllers\Modules\Students;


use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use League\Flysystem\Exception;
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
        $info = DB::select('SELECT * FROM alumnos INNER JOIN informacion ON alumnos.idInformacionFK=informacion.idInformacion ORDER BY estado,nombre');
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

    public function getGeneraciones(){
        $generaciones = DB::table('generaciones')->get();
        $generaciones = json_encode($generaciones, true);
        return json_decode($generaciones, JSON_PRETTY_PRINT);
    }

    public function create(Request $request){
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
        $data = array($name, $lastname, $genero, $age, $curp, $matricula, $turno, $grupo, $generacion);
        $user = json_encode($data, true);
        //dd(json_decode($user, JSON_PRETTY_PRINT));
        try{
            $user = DB::select("CALL InsertAlumno(?,?,?,?,?,?,?,?,?)", $data);
            $user = json_encode($user, true);
            return json_decode($user, JSON_PRETTY_PRINT);
        }catch (Exception $ex){
            return $ex;
        }
    }

    public function update(Request $request){
        $idInformacion = $request->input('idInformacion');
        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $genero = $request->input('genero');
        $age = $request->input('age');
        $curp = $request->input('curp');
        $foto = $request->input('foto');
        $estado = $request->input('estado');
        $matricula = $request->input('matricula');
        $turno = $request->input('turno');
        $carrera = $request->input('carrera');
        $grupo = $request->input('grupo');
        $generacion = $request->input('generacion');
        $data = array($name, $lastname, $genero, $age, $curp, $foto, $estado, $matricula, $turno, $grupo, $generacion, $idInformacion);
        $user = json_encode($data, true);
        try{
            $user = DB::select("CALL UpdateAlumno(?,?,?,?,?,?,?,?,?,?,?,?)", $data);
            $user = json_encode($user, true);
            return json_decode($user, JSON_PRETTY_PRINT);
        }catch (Exception $ex){
            return $ex;
        }
    }

    public function getInformationByIdAlumno(Request $request){
        $idAlumno = $request->input('idAlumnos');
        $query = DB::table('alumnos')
            ->join('informacion', 'alumnos.idInformacionFK', '=', 'informacion.idInformacion')
            ->join('grupos', 'alumnos.idGrupos','=','grupos.idGrupos')
            ->select('idAlumnos','estado', 'matricula','turno', 'alumnos.idGrupos', 'idGeneraciones','idInformacion','informacion.nombre','apellido','genero','edad','curp','foto','Carreras_idCarreras')
            ->where('alumnos.idAlumnos', '=', $idAlumno)
            ->get();


        //dd($idAlumno);
        //$info = DB::select('SELECT * FROM alumnos INNER JOIN informacion ON alumnos.idInformacionFK=informacion.idInformacion WHERE alumnos.idAlumnos='.$idAlumno);
        $info = json_encode($query, true);
        return json_decode($info, JSON_PRETTY_PRINT);
    }
}