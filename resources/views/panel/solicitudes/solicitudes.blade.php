@extends('templates.panel-template')

@section('title-head', 'Solicitudes')

@section('head')

 {{-- Estilos para datatables --}}
 @include('panel.partials.heads.datatables-styles')

@endsection

@section('breadcrumb')
    {{-- Content Header (Page header) --}}
    <section class="content-header">
        <h1>
            <i class="glyphicon glyphicon-list-alt"></i> Solicitudes
            <small>Listado</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Solicitudes</li>
            <li class="active">Administración</li>
        </ol>
    </section>
@endsection

@section('main-content')

    <div class="col-md-12">
        {{-- Info box --}}
        <div class="box box-info">

            <div class="box-body">


            @if (Auth::user()->isAdmin())
                {{-- Small boxes (Stat box) --}}
                {{-- <div class="row"> --}}
                    <a href="{{ route('solicitudes.create') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Nueva solicitud"><i class="fa fa-list-alt"></i> Nueva solicitud</a><br><br>

                    <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Solicitante</th>
                                <th>Pedido</th>
                                <th>Estado</th>
                                <th>Fecha de entrega</th>
                                <th>Entregó</th>
                                <th>Retiró</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $solicitudes as $solicitud )
                            <tr>
                                <td><a href="{{ route('solicitudes.show', $solicitud->id) }}" data-toggle="tooltip" title="Ver">{!! date('d-m-Y', strtotime($solicitud->admission_date)) !!}</a></td>
                              
                                <td>{!! $solicitud->applicant !!}</td>
                                <td>{!! $solicitud->description !!}</td>

                                @if($solicitud->status->id == 1)
                                    <td class="text-warning">{!! $solicitud->status->name !!}</td>
                                @elseif($solicitud->status->id == 2)
                                    <td class="text-success">{!! $solicitud->status->name !!}</td>
                                @else
                                    <td class="text-danger">{!! $solicitud->status->name !!}</td>
                                @endif

                                <td>
                                    @if($solicitud->delivery_date)
                                        {!! date('d-m-Y', strtotime($solicitud->delivery_date)) !!}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if($solicitud->user_id_deliver)
                                        {!! $solicitud->user->name !!} {!! $solicitud->user->lastname !!} 
                                    @else
                                        -
                                    
                                    @endif
                                </td>
                                <td>
                                    @if($solicitud->who_takes)
                                        {!!$solicitud->who_takes!!}
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Fecha</th>
                                <th>Solicitante</th>
                                <th>Pedido</th>
                                <th>Estado</th>
                                <th>Fecha de entrega</th>
                                <th>Entregó</th>
                                <th>Retiró</th>
                            </tr>
                        </tfoot>
                    </table>
                    </div>
                {{-- </div> --}}
            @endif
        </div>
    </div>{{-- /.col --}}

@endsection

@section('script')


    {{-- Scripts necesarios para datatables --}}
    @include('panel.partials.scripts.datatables')

    {{-- Scripts necesarios para tooltip --}}
    @include('panel.partials.scripts.tooltip')

@endsection
