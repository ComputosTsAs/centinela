<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Http\Requests\OrderRequest;
use App\Models\User;
use App\Models\Order;
use App\Models\StatusOutput;


class SolicitudesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitudes = Order::all();
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

        //si modifico el estado (se entrego o cancelo) guardo el usuario y fecha
        if($request->status_id != $solicitud->status_id){
            $solicitud->user_id_deliver   = \Auth::user()->id;

            if($request->status_id  == 2){
                $solicitud->delivery_date = date('Y-m-d G:i:s');
            }
           
            $solicitud->save();
        }

        $solicitud->fill($request->all());
        $solicitud->save();
       

        $msj = '*Modificó la solicitud "'.$solicitud->description. '" de "'. $solicitud->user->name.' '.$solicitud->user->lastname .'"con exito *';
               
      // Muestro msj correspondiente
      flash('Modificó* la solicitud *'.$solicitud->description. '* de *'. $solicitud->user->name.' '.$solicitud->user->lastname .'* con exito *')->success();
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
       
    }
}
