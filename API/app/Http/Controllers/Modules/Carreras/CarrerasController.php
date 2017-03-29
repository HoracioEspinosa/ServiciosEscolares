<?php

namespace App\Http\Controllers\Modules\Carreras;

use GuzzleHttp\Exception\ServerException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;

class CarrerasController extends Controller
{
    public function getInformation()
    {

        $carreras= DB::table('carreras')->get();
        $carreras=json_encode($carreras, true);
        return json_decode($carreras, JSON_PRETTY_PRINT);

    }
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
    public function create(Request $request)
    {
        try{
            $error=array('error'=>true);
            if(DB::table('carreras')->insert([

                'Clave'=>$request->input('clave'),
                'Nombre_carrera'=>$request->input('nombre'),
                'Tipo'=>$request->input('tipo'),
                'Estado_Carrera'=>$request->input('estado'),
                'Grupos_idGrupos'=>$request->input('grupo')
            ]))
            {
                return array('error'=>false);
            }else{
                return array('error'=>true);
            }

        }catch (Exception $exception){}
        catch (QueryException $queryException){}
        catch (ServerException $serverException){}
        return array('error'=>true);

    }

    function delete(Request $request) {
        $id = $request->input('Clave');
        $data = array($id);
        $user = DB::select('CALL DELETE_USER(?)', $data);
        $user = json_encode($user, true);
        return json_decode($user, JSON_PRETTY_PRINT);
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
