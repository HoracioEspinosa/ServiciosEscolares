<?php

namespace App\Http\Controllers\Grades;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Facades\Datatables;

class ModuleGradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getStudentInfo(Request $request){
        $idAlumno=$request->input('idUsuarios');

        //$information=DB::select('SELECT * FROM usuarios');
        $information = DB::table('usuarios')
            ->join('informacion', 'usuarios.Informacion_idInformacion', '=', 'informacion.idInformacion')
            ->join('alumnos','usuarios.Informacion_idInformacion','=','alumnos.idInformacionFK')
            ->select("alumnos.idAlumnos","alumnos.matricula", "informacion.nombre",'informacion.apellido','alumnos.turno')
            ->where('usuarios.IdUsuarios', '=', $idAlumno)
            ->get();
        $information = json_encode($information, true);
        return json_decode($information, JSON_PRETTY_PRINT);
}

    public function getStudentGroup(Request $request){
        $idAlumnos=$request->input('idAlumnos');

        $information = DB::table('alumnos')
            ->join('grupos', 'alumnos.idAlumnos', '=', 'grupos.idGrupos')
            ->join('generaciones','alumnos.idGeneraciones','=','generaciones.idGeneraciones')
            ->select('grupos.idGrupos',"grupos.nombre",'generaciones.generacion')
            ->where('alumnos.idAlumnos', '=', $idAlumnos)
            ->get();
        $information = json_encode($information, true);
        return json_decode($information, JSON_PRETTY_PRINT);
    }

    public function getStudentCareer(Request $request){
        $idGrupos=$request->input('idGrupos');

        $information = DB::table('grupos')
            ->join('carreras','grupos.Carreras_idCarreras','=','carreras.idCarreras')
            ->select('carreras.nombreCarrera')
            ->where('grupos.idGrupos', '=', $idGrupos)
            ->get();
        $information = json_encode($information, true);
        return json_decode($information, JSON_PRETTY_PRINT);
    }

    public function getStudentGrades(Request $request){
        $idAlumno=$request->input('idAlumnos');

        $information = DB::table('alumnosmaterias')
            ->join('materias', 'alumnosmaterias.idMaterias', '=', 'materias.idMaterias')
            ->join('periodos','alumnosmaterias.Periodos_idPeriodos','=','periodos.idPeriodos')
            ->select('materias.idMaterias','materias.nombre','periodos.idPeriodos','periodos.status','periodos.inicio','periodos.fin')
            ->where('alumnosmaterias.IdAlumnos', '=', $idAlumno)
            ->get();
        $information = json_encode($information, true);
        return json_decode($information, JSON_PRETTY_PRINT);
    }

    public function getStudentGradesUnit(Request $request){
        $idAlumno=$request->input('idAlumnos');

        $information = DB::table('materias_has_unidades')
            ->join('unidades','materias_has_unidades.idunidades','=','unidades.idunidades')
            ->select('materias_has_unidades.idMaterias','unidades.idunidades','unidades.numeroUnidad','unidades.calificacion')
            ->where('materias_has_unidades.IdAlumnos', '=', $idAlumno)
            ->get();
        $information = json_encode($information, true);
        return json_decode($information, JSON_PRETTY_PRINT);
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
            $user = AuthController::getAuthenticatedUserWithParameter($request);
            $id = $user["id_users"];
            $information = DB::table('users')
                ->join('user_information', 'users.user_information_iduser_information', '=', 'user_information.iduser_information')
                ->join('departments', 'users.Departments_id_departments','=','departments.id_departments')
                ->join('users_levels', 'users.Users_levels_idUsers_levels', '=', 'users_levels.idUsers_levels')
                ->select("users.username", "users.deleted", "users.id_users", "users.uname AS name", "users.lastname", "users.status AS status", "users.email", "user_information.code", "user_information.photo", "user_information.extra_phones", "user_information.address", "user_information.age", "user_information.gender", "departments.id_departments", "departments.name AS department_name", "users_levels.name AS level_name")
                ->where('users.id_users', '=', $id)
                ->get();
        $information = json_encode($information[0], true);
        return json_decode($information, JSON_PRETTY_PRINT);
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
