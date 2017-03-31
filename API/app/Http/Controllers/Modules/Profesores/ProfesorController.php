<?php

namespace App\Http\Controllers\Modules\Profesores;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class ProfesorController extends Controller
{
    public function getInformation(){
        $info = DB::select('SELECT * FROM Profesores INNER JOIN informacion ON Profesores.idInformacion=informacion.idInformacion');
        $info = json_encode($info, true);
        return json_decode($info, JSON_PRETTY_PRINT);
    }

    public function getAllProfesorsInformation() {
        $users = DB::table('Profesores')->join('informacion', 'Profesores.idInformacion', '=', 'informacion.idInformacion')->get();
        return Datatables::of($users)->make(true);
    }

    public function getGrupos(){
        $grupos = DB::table('grupos')->get();
        $grupos = json_encode($grupos, true);
        return json_decode($grupos, JSON_PRETTY_PRINT);
    }

    public function create(Request $request){
        $name = $request->input('name');
        $lastname = $request->input('plname')  . ' ' .  $request->input('mlname');
        $cedula = $request->input('cedula');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $notes = $request->input('notes');
        $estatus = $request->input('estatus');
        $data = array($name, $lastname, $estatus, $cedula,  $notes, $email, $phone);
        $profesor = json_encode($data, true);
        //dd(json_decode($user, JSON_PRETTY_PRINT));
        try{
            $profesor = DB::select("CALL REGISTRAR(?,?,?,?,?,?,?)", $data);
            $profesor = json_encode($profesor, true);
            return json_decode($profesor, JSON_PRETTY_PRINT);
        }catch (Exception $ex){
            return $ex;
        }
    }

    public function getInformationByIdProfesor($idProfesor, Request $request){
        $info = DB::select('SELECT * FROM Profesores INNER JOIN informacion ON Profesores.idInformacion=informacion.idInformacion WHERE Profesores.idProfesores='.$idProfesor);
        $info = json_encode($info, true);
        return json_decode($info, JSON_PRETTY_PRINT);
    }

    public function update(Request $request){
        $idInformacion = $request->input('idInformacion');
        $name = $request->input('modname');
        $lastname = $request->input('modplname')  . ' ' .  $request->input('modmlname');
        $cedula = $request->input('modcedula');
        $email = $request->input('modemail');
        $phone = $request->input('modphone');
        $notes = $request->input('modnotes');
        $estatus = $request->input('modestatus');
        $data = array($name, $lastname, $cedula,  $email, $phone, $notes,  $estatus, $idInformacion);
        $profesor = json_encode($data, true);
        try{
            $profesor = DB::select("CALL UPDATEPROF(?,?,?,?,?,?,?,?)", $data);
            $profesor = json_encode($profesor, true);
            return json_decode($profesor, JSON_PRETTY_PRINT);
        }catch (Exception $ex){
            return $ex;
        }
    }
}
