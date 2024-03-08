<?php

namespace App\Http\Controllers\Network;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RicorocksDigitalAgency\Soap\Facades\Soap;



class ServicioSoapController extends Controller
{

    public function getVariablesDisponibles(){
        try{

            $uri = config("app.urlSOAP");


            $soapProceso = Soap::to($uri)->VariablesDisponibles();

            $result = $soapProceso->response->VariablesDisponiblesResult->Variables->Variable;

            $data = [
                'code' => 200,
                'variables' => $result
            ];

            return response()->json($data);



        }catch(\Throwable $error){
            logger('system LOG -> No fue posible consultar mensaje: '.$error->getMessage());
            logger('system LOG -> No fue posible consultar linea: '.$error->getLine());
            logger('system LOG -> No fue posible consultar archivo: '.$error->getFile());


            return $error;
        }
    }
    public function obtenerCambioRango($init = '', $fin='', $tipoRango ='', $moneda=''){
        try{



            $uri = config("app.urlSOAP");
            $fInit = $init;
            $fFin = $fin;

            $soapProceso = Soap::to($uri)->TipoCambioRango(['fechainit' => $fInit, 'fechafin'=>$fFin]);
            $result = collect($soapProceso->response->TipoCambioRangoResult->Vars);
            if($tipoRango === 'rangoMoneda' && $moneda != 1){

                $soapProceso = Soap::to($uri)->TipoCambioRangoMoneda(['fechainit' => $fInit, 'fechafin'=>$fFin, 'moneda' => $moneda]);
                $result = collect( $soapProceso->response->TipoCambioRangoMonedaResult->Vars);

            }



            return $result;



        }catch(\Throwable $error){
            logger('system LOG -> No fue posible consultar mensaje: '.$error->getMessage());
            logger('system LOG -> No fue posible consultar linea: '.$error->getLine());
            logger('system LOG -> No fue posible consultar archivo: '.$error->getFile());

            return $error;
        }
    }


    public function obtenerCambioFechaInicial($finit=''){
        try{


            if(!$finit){
                $data = [
                    'code' => 404,
                    'message' => 'Data not found, param is required'
                ];
                return response()->json($data);
            }

            $uri = config("app.urlSOAP");

            $fInit = $finit;


            $soapProceso = Soap::to($uri)->TipoCambioFechaInicial(['fechainit' => $fInit]);

            $result = $soapProceso->response->TipoCambioFechaInicialResult->Vars->Var;
            $sortData = collect($result)->sortBy('venta', SORT_REGULAR, true);

            $sortResult = $sortData->values()->all();

            return response()->json($sortResult);



        }catch(\Throwable $error){
            logger('system LOG -> No fue posible consultar mensaje: '.$error->getMessage());
            logger('system LOG -> No fue posible consultar linea: '.$error->getLine());
            logger('system LOG -> No fue posible consultar archivo: '.$error->getFile());

            return $error;
        }

    }

  


}
