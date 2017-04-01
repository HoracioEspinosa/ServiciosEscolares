<?php

namespace App\Http\Controllers\Modules\Periodos;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PeriodosController extends Controller
{
    public function getInfo()
    {
        //$info = DB::table('Periodos')->get();
        $info = DB::select('SELECT * FROM Periodos WHERE status != 2');
        $info = json_encode($info,true);
        return json_decode($info,JSON_PRETTY_PRINT);
    }

    public function getInfoByID(Request $request){
        $id = $request->input('id');
        $info = DB::select('SELECT * FROM Periodos WHERE idPeriodos ='.$id);
        $info = json_encode($info,true);
        return json_decode($info,JSON_PRETTY_PRINT);
    }

    public function create(Request $request){
        $start = $request->input('startPeriod');
        $end = $request->input('endPeriod');
        $year = $request->input('year');
        $status = $request->input('status');

        $respons = DB::table('periodos')->insert(
            ['inicio' => $start, 'fin' => $end, 'anio' => $year, 'status' => $status]
        );

        $respons = json_encode($respons, true);
        return json_decode($respons, JSON_PRETTY_PRINT);
    }

    public function update(Request $request){
        $id = $request->input('id');
        $start = $request->input('startPeriod');
        $end = $request->input('endPeriod');
        $year = $request->input('year');

        //dd($id."-".$start."-".$end."-".$year);
        $respons = DB::table('periodos')
            ->where('idPeriodos', $id)
            ->update(['inicio' => $start, 'fin' => $end, 'anio' => $year]);
        $respons = json_encode($respons, true);
        return json_decode($respons, JSON_PRETTY_PRINT);
    }

    public function delete(Request $request){
        $id = $request->input('id');
        $status = 2;
        //dd($id."-".$start."-".$end."-".$year);
        $respons = DB::table('periodos')
            ->where('idPeriodos', $id)
            ->update(['status' => $status]);
        $respons = json_encode($respons, true);
        return json_decode($respons, JSON_PRETTY_PRINT);
    }

    public function changeStatus(Request $request){
        $id = $request->input('id');
        $status = $request->input('status');
        //dd($id."-".$start."-".$end."-".$year);
        $respons = DB::table('periodos')
            ->where('idPeriodos', $id)
            ->update(['status' => $status]);
        $respons = json_encode($respons, true);
        return json_decode($respons, JSON_PRETTY_PRINT);
    }
}