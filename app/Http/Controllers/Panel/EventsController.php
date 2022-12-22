<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Validaciones
use App\Http\Requests\EventRequest;

use App\Models\Event;

use App\Models\User;

use App\Models\Action;

use App\Models\StatusRepair;

use App\Models\Machine;

class EventsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        // Creo una nueva instacia de event con los datos del request
        $event = new Event($request->all());
        // Guardo event
        $event->save();

        // Busco para armar msj
        $machine_event          = Machine::find($event->machine_id);
        $machine_user           = User::find($machine_event->user_id);
        $machine_statusrepair   = StatusRepair::find($event->statusrepair_id);
        // Notificación para Slack //
        $msj = '*Registró* un nuevo evento para la máquina *'.$machine_event->name.'* asociada a: *'.$machine_user->name.' '.$machine_user->lastname.'* de *'.$machine_user->area->name. '* y su estado es: *'.$machine_statusrepair->name.'*';

        // Muestro msj correspondiente
        flash('El evento se registró de forma exitosa!')->success();

        // Redirecciono a la vista correspondiente
        return redirect()->route('machines.show', $request->machine_id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Busco el evento
        $event = Event::find($id);
        // Usuarios de computos
        $users_computos = User::where('area_id', '=', 1)->get();
        // Busco todas las acciones
        $actions = Action::orderBy('id', 'ASC')->pluck('name', 'id')->all();
        // Busco los estados de reparación
        $status_repairs = StatusRepair::orderBy('id', 'ASC')->pluck('name', 'id')->all();
        // Retorno vista
        return view('panel.machines.events.edit', compact('event', 'users_computos', 'actions', 'status_repairs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $request, $id)
    {
        // Busco el evento
        $event = Event::find($id);
        // Cargo datos que vienen del request
        $event->fill($request->all());
        // Guardo los datos
        $event->save();
        
        // Busco para armar msj
        $machine_event          = Machine::find($event->machine_id);
        $machine_user           = User::find($machine_event->user_id);
        $machine_statusrepair   = StatusRepair::find($event->statusrepair_id);
        // Notificación para Slack //
        $msj = '*Modificó* un nuevo evento para la máquina *'.$machine_event->name.'* asociada a: *'.$machine_user->name.' '.$machine_user->lastname.'* y su estado es: *'.$machine_statusrepair->name.'*';

        // Muestro msj correspondiente
        flash('El evento ha sido modificado de forma exitosa!')->success();

        // Redirecciono a la vista correspondiente
        return redirect()->route('machines.show', $event->machine_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Busco el evento
        $event = Event::find($id);
        // Elimino el evento
        $event->delete();
        
        // Busco para armar el msj
        $machine_event  = Machine::find($event->machine_id);
        $machine_user   = User::find($machine_event->user_id);

        // Notificación para Slack //
        $msj = '*Eliminó* un nuevo evento para la máquina *'.$machine_event->name.'* asociada a: *'.$machine_user->name.' '.$machine_user->lastname.'* de *'.$machine_user->area->name. '*';

        // Muestro el msj correspondiente
        flash('El evento ha sido eliminado de forma exitosa!')->success();
        
        // Redirecciono a la vista correspondiente
        return redirect()->route('machines.show', $event->machine_id)->with("deleted" , $id );
    }


}
