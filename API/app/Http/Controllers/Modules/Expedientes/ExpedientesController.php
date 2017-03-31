<?php

namespace App\Http\Controllers\Modules\Expedientes;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ExpedientesController extends Controller
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

    public function buscar(Request $request){

        $idAlumno =$request->input('idAlumno');
        $result=DB::table('expedientes')->where('alumnos_idAlumnos', '=',$idAlumno)->get();
        $result=json_encode($result,true);
        return json_decode($result,JSON_PRETTY_PRINT);
    }
    public function procedimientos(Request $request){

        try{
            $users =  DB::select("CALL expedientes(".$user_id.", '".$username."')");
            $result["error"] = false;
            $result["message"] = (sizeof($users) > 0) ? $users : "No users found";
        }catch (Exception $exception){
            $result["error"] = true;
            $result["message"] = $exception;
        }
        $result = json_encode($result);
        return json_decode($result, JSON_PRETTY_PRINT);
    }

}
