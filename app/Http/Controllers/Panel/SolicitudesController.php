<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\OrderRequest;
use App\Models\User;
use App\Models\Order;
use App\Models\StatusOutput;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class SolicitudesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes = Order::orderBy('status_id', 'ASC')->get();
        // Retorno a la vista
        return view('panel.solicitudes.solicitudes',compact('solicitudes'));
    }

    public function create()
    {
        // Retorno a la vista
        return view('panel.solicitudes.create');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {
        // // Creo una nueva instacia de la solicitud con los datos del request
 
        $solicitud = new Order($request->all());

        $solicitud->admission_date = $request->admission_date;
        $solicitud->status_id = $request->status_id;
        $solicitud->description = $request->description;
        $solicitud->applicant= $request->applicant;

        // // Guardo viatic
         $solicitud->save();

        // Muestro msj correspondiente
        flash('Se ha registrado con exito!')->success();
        // Redirecciono a la vista correspondiente
        return redirect()->route('solicitudes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //busco al solicitud
        $solicitud = Order::find($id);

        //traigo datos que necesito para los select
        $users = User::orderBy('lastname', 'ASC')->get();
        $status = StatusOutput::orderBy('name', 'ASC')->get();

        // Retorno la vista
        return view('panel.solicitudes.show', compact('solicitud', 'status', 'users'));
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
    public function update(OrderRequest $request, $id)
    {
        // Busco el mail correspondiente
        $solicitud =  Order::find($id);
      
        //si modifico el estado actualizo los cambios
        if($request->status_id != $solicitud->status_id){
           
            // si entrego guardo el usuario y fecha y quien lo retiro
            if($request->status_id  == 2){
                $solicitud->user_id_deliver   = \Auth::user()->id;
                $solicitud->delivery_date = date('Y-m-d G:i:s');
                $solicitud->who_takes = $request->who_takes;
            }else{
                // sino los guardo en null
                $solicitud->delivery_date = null;
                $solicitud->user_id_deliver = null;
                $solicitud->who_takes = null;
            }
        }

        //guardo el resto de los datos
        $solicitud->status_id = $request->status_id;
        $solicitud->description = $request->description;
        $solicitud->applicant= $request->applicant;
        
        $solicitud->save();

        // $msj = '*Modificó la solicitud "'.$solicitud->description. '" de "'. $solicitud->user->name. ' '.$solicitud->user->lastname .'"con exito *';
        $msj = '*Se modificó la solicitud con exito *';
               
        // Muestro msj correspondiente
        flash($msj)->success();
                  // Redirecciono a la vista correspondiente
        return redirect()->route('solicitudes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //busco la solicitud
        $solicitud = Order::find($id);
        //la elimino
        $solicitud->delete();

        // $msj = "Eliminó la solicitud ".$solicitud->description;
    
        flash("Se eliminó la solicitud.")->success();
        return redirect()->route('solicitudes.index'); 
    }
}
