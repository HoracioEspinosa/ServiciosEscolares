<?php

namespace App\Http\Controllers\Modules\Groups;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = DB::table('grupos')->get();
        return $groups;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre = $request->input('nombre');
        $cantidad = $request->input('cantidadAlumnos');
        $horario = $request->input('Horarios_idHorarios');
        $carrera = $request->input('Carreras_idCarreras');
        $data = array($nombre, $cantidad, $horario, $carrera);
        $grupo = json_encode($data, true);
        //dd(json_decode($user, JSON_PRETTY_PRINT));
        try{
            $grupo = DB::select("CALL registrarGrupo(?,?,?,?)", $data);
            $grupo = json_encode($grupo, true);
            return json_decode($grupo, JSON_PRETTY_PRINT);
        }catch (Exception $ex){
            return $ex;
        }
    }
    public function getHorarios(){
        $groups = DB::table('horario_alumno')->get();
        return $groups;
    }
    public function getCarreras(){
        $carreras = DB::table('Carreras')->get();
        return $carreras;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $information = DB::table('alumnos')->join('informacion', 'alumnos.idAlumnos', '=', 'informacion.idInformacion')->where('idGrupos', '=', $id)->get();
        return Datatables::of($information)->make(true);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
