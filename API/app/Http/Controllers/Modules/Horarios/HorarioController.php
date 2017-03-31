<?php

namespace App\Http\Controllers\Modules\Horarios;

use GuzzleHttp\Exception\ServerException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;
class HorarioController extends Controller
{

    public function getInformation()
    {

        $informacion= DB::table('profesores')->join('informacion','profesores.idProfesores','=','informacion.idInformacion')->get();
        //$informacion= User::all();
        $informacion=json_encode($informacion, true);
        return json_decode($informacion, JSON_PRETTY_PRINT);

    }
    public function getInformationByIdProfesor($idProfesor){
        $informacion = DB::select('SELECT * FROM Profesores INNER JOIN informacion ON Profesores.idInformacion=informacion.idInformacion WHERE Profesores.idProfesores='.$idProfesor);
        $informacion = json_encode($informacion, true);
        return json_decode($informacion, JSON_PRETTY_PRINT);
    }
    public function getProfesores()
    {
        $profesores= DB::table('profesores')->get();
        $profesores=json_encode($profesores, true);
        return json_decode($profesores, JSON_PRETTY_PRINT);
    }

    public function horarioDisponibleProfesores()
    {
        $disponible= DB::table('horario_disponible_profesor')->get();
        $disponible=json_encode($disponible, true);
        return json_decode($disponible, JSON_PRETTY_PRINT);
    }
    public function HorarioProfesores()
    {
        $horarioprofesores= DB::table('horario_profesor')->get();
        $horarioprofesores=json_encode($horarioprofesores, true);
        return json_decode($horarioprofesores, JSON_PRETTY_PRINT);
    }

    public function HorarioAlumno()
    {
        $horarioalumno= DB::table('Horario_Alumno')->get();
        $horarioalumno=json_encode($horarioalumno, true);
        return json_decode($horarioalumno, JSON_PRETTY_PRINT);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
