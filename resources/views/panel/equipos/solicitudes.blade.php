@extends('templates.panel-template')

@section('title-head', 'Solicitudes')

@section('head')


@endsection

@section('breadcrumb')
    {{-- Content Header (Page header) --}}
    <section class="content-header">
        <h1>
            <i class="fa fa-desktop"></i> Equipos
            <small>Solicitudes</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Equipos</li>
            <li class="active">Administración</li>
        </ol>
    </section>
@endsection

@section('main-content')

    <div class="col-md-12">
        {{-- Info box --}}
            @if (Auth::user()->isAdmin())
                {{-- Small boxes (Stat box) --}}
                <div class="row">
                    <a href="{{ route('equipos.solicitudes.create') }}" class="btn btn-primary btn-sm" data-toggle="tooltip" title="Nuevo producto"><i class="fa fa-shopping-cart"></i> Nuevo solicitud</a><br><br>

                    <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Solicitante</th>
                                <th>Pedido</th>
                                <th>Lugar a usar/motivo</th>
                                <th>Fecha de entrega</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $solicitudes as $solicitud )
                            <tr>
                                <td>{!! date('d-m-Y', strtotime($solicitud->fecha_regis)) !!}</td>
    
                                <td>{!! $solicitud->solicitante !!}</td>
    
                                <td>{!! $solicitud->pedido !!}</td>

                                <td>{!! $solicitud->lugar_motivo !!}</td>

                                <td>@if($solicitud->fecha_entrega)
                                    {!! date('d-m-Y', strtotime($solicitud->fecha_entrega)) !!}
                                
                                @endif
                            </td>
                                <td>{!! $solicitud->estado !!}</td>

    
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    
                </div>
            @endif
    </div>{{-- /.col --}}

@endsection

@section('script')


    {{-- Scripts necesarios para datatables --}}
    @include('panel.partials.scripts.datatables')

    {{-- Scripts necesarios para tooltip --}}
    @include('panel.partials.scripts.tooltip')

@endsection
