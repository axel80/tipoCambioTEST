<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\PeticionesTipoCambio;
use App\Http\Controllers\Network\ServicioSoapController;

class PeticionesController extends Controller
{
    public function pedicionesView(){
        return view('home');
    }


    public function peticionTC(Request $request){
        if (!$request->ajax()) return redirect()->route('home');

        $fFin = $request->fecha_fin;
        $finicio = $request->fecha_inicio;
        $moneda = $request->moneda_id;

        $tipo = "rangoMoneda";
        if(!$request->moneda){
            $tipo = "rango";
        }

        $rangosReq = new ServicioSoapController();
        $rangoResultado = collect($rangosReq->obtenerCambioRango($finicio, $fFin, $tipo, $moneda));

        $countResult = sizeof($rangoResultado['Var']);

        $ultimaPeticion = PeticionesTipoCambio::select('numero_peticion')->orderBy('id', 'desc')->first();
        if(!$ultimaPeticion){
            $nuevaPeticion =  1;

        }else{
            $nuevaPeticion  =  intval($ultimaPeticion->numero_peticion) + 1;
        }

        for($i = 0; $i < $countResult; $i++){
            $fecha = explode('/',$rangoResultado['Var'][$i]->fecha);
            $fechaGuardar = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];

            $peticion = new PeticionesTipoCambio($request->all());
            $peticion->numero_peticion  =  $nuevaPeticion;
            $peticion->fecha_peticion   =  $fechaGuardar;
            $peticion->tc_compra        =  $rangoResultado['Var'][$i]->compra;
            $peticion->tc_venta         =  $rangoResultado['Var'][$i]->venta;
            $peticion->moneda_id        =  $rangoResultado['Var'][$i]->moneda;
            $peticion->save();
        }

        $resultado = PeticionesTipoCambio::orderBy('id', 'desc')->get();

        $data = [
            'code'  => 200,
            'peticionTC' => $resultado
        ];

        return response()->json($data);




    }

    public function getLista(Request $request){
        if (!$request->ajax()) return redirect()->route('home');
          $resultado = PeticionesTipoCambio::orderBy('numero_peticion', 'desc')->get();

        $data = [
            'code'       => 200,
            'peticionTC' => $resultado
        ];

        return response()->json($data);
    }



}
