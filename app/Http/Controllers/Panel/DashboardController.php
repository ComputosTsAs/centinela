<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Mail;

use App\Models\Machine;

use App\Models\OutputProduct;

use App\Models\User;

use App\Models\Product;

use App\Models\WorkAssignment;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( \Auth::user()->isAdmin() ) {
            // Cantidad de mails
            $mails = Mail::orderBy('id', 'ASC')->count();
            // Cantidad de maquinas de escritorio
            $desktops = Machine::where('machinetype_id', 1)->orderBy('id', 'ASC')->count();
            // Cantidad de notebooks
            $laptops = Machine::where('machinetype_id', 2)->orderBy('id', 'ASC')->count();
            // Cantidad de impresoras
            $printers = Machine::where('machinetype_id', 5)->orderBy('id', 'ASC')->count();
            // Cantidad de pedidos
            $outputproducts = OutputProduct::where('statusoutput_id', 1)->orderBy('id', 'ASC')->count();
            // Cantidad de usuarios registrados
            $users = User::orderBy('id', 'ASC')->count();
            // Productos bajos de stock
            $low_stock = Product::where('stock', '<=', '5')->get();

            $pendingTasks = WorkAssignment::where('Working_state_id', 1)->where ('user_id', NULL)->count();
            //contador de pndientes de bandeja de entrada
            $user = User::find(\Auth::user()->id);
            $inbox =$user->tareasPendientes(\Auth::user()->id);//
            
            // Retorno vista correspondiente
            return view('panel.dashboard', compact('mails', 'desktops', 'laptops', 'printers', 'outputproducts', 'users', 'low_stock', 'pendingTasks', 'inbox'));
        }
        else
        {
            // Pedidos de cada usuario
            $userOrders = OutputProduct::where('user_id', \Auth::user()->id)->orderBy('id', 'ASC')->count();
            // Listado de usuarios para agenda
            $users = User::orderBy('name', 'ASC')->get();

            // Retorno vista correspondiente
            return view('panel.dashboard', compact('userOrders', 'users'));
        }
    }

}
