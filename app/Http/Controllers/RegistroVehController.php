<?php

namespace App\Http\Controllers;
use  Carbon\Carbon;
use App\Models\registroVeh;
use Illuminate\Http\Request;
use App\Http\Requests\CreateRequestRegistroVehic;
use App\Models\vehiculo;

class RegistroVehController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $listaVehiculos=registroVeh::where('horaSal','!=',null)->take(3)->orderBy('montoPagar','desc')->get(); 
            return  $listaVehiculos;
        }catch(\Exception $e){
            throw $e;
        }
        return  "Informe Vacio";

       
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
    public function store(CreateRequestRegistroVehic $request)
    {
        $date=Carbon::now();

        $horaEnt=$date;
        $result=null;
        try{
           $result= registroVeh::create(['chapa_id'=>$request->input('chapa'),'horaEnt'=> $horaEnt,'horaSal'=>null,'tiempoEst'=>0,'montoPagar'=>0]);
        }catch(\Exception $e){
                throw $e;
        }
        return $result;

    
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     /**
      * Obtengo el vehiculo que esta en el estacionamiento
      * verificando que no tenga hora de salida
      */

    public function updateVehicleOut(CreateRequestRegistroVehic $request)
    {
        $vehicEst=null;
        $horaEnt=null;
        //Obteniendo el vehiculo con la chapa requerida y que no posea hora de salida
                try{  
                    $vehicEst=registroVeh::where('chapa_id','=',$request->input('chapa'))->where('horaSal','=',null)->get();
                    if( isset($vehicEst[0])){
                         $horaEnt= $vehicEst[0]->horaEnt;
                    }
                }catch(\Exception $e){
                    throw $e;
                }
               

       //Actualizando el vehiculo con los datos de salida del esacionamiento
              if( isset($vehicEst[0])){
                $dateEnt=Carbon::parse($horaEnt);
                $horaSal=Carbon::now();
                $vehicEst[0]->horaSal=$horaSal;
                $vehicEst[0]->tiempoEst=$dateEnt->diffInMinutes($horaSal);
                $vehicEst[0]->montoPagar=$vehicEst[0]->tiempoEst * 0.5;
                try{
                        $vehicEst[0]->save();
                }catch(\Exception $e){
                    throw $e;
                }
            }
       
 
        return isset($vehicEst[0])==true ? "Salida registrada" : "Salida del vehiculo no registrada" ;
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\registroVeh  $registroVeh
     * @return \Illuminate\Http\Response
     */
    public function show(registroVeh $registroVeh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\registroVeh  $registroVeh
     * @return \Illuminate\Http\Response
     */
    public function edit(registroVeh $registroVeh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\registroVeh  $registroVeh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, registroVeh $registroVeh)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\registroVeh  $registroVeh
     * @return \Illuminate\Http\Response
     */
    public function destroy(registroVeh $registroVeh)
    {
        //
    }
}
