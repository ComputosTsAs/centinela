@extends('templates.panel-template')

@section('title-head', 'Listado de egresos')

@section('head')
    
    {{-- Estilos para datatables --}}
    @include('panel.partials.heads.datatables-styles')

    {{-- Estilos para form-validator --}}
    @include('panel.partials.heads.form-validator-styles')

    {{-- Estilos necesarios para chosen --}}
    @include('panel.partials.heads.chosen-styles')

      {{-- Estilos para datetimepicker --}}
      @include('panel.partials.heads.datetimepicker-styles')

@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}
<section class="content-header">
    <h1>
        <i class="fa fa-level-up"></i> Egresos
        <small>Listado</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Egresos</li>
        <li class="active">Listado</li>
    </ol>
</section>
@endsection

@section('main-content')
@php
    setlocale(LC_TIME,"es_RA.UTF-8");
@endphp
<div class="col-md-12">
    {{-- Info box --}}
    <div class="box box-info">
        {{--
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-level-up"></i> Listado de egresos</h3>
            <div class="box-tools pull-right">
                <div class="label bg-aqua"></div>
            </div>
        </div>
        --}}
        <div class="box-body">
            <form class="row" action="filtrar">
                <div class="col-md-3 col-md-offset-3">
                    <div class="form-group">
                        {!! Form::label('productos', 'Productos') !!}
                        <select class="form-control select-simple" name="productos" id="selectproductos">
                            <option value="">--Seleccione producto--</option>
                            @foreach ($productos as $producto)
                                <option value="{{$producto->id}}">{{$producto->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {!! Form::label('start_date', 'Fecha inicial') !!}
                        {!! Form::text('start_date', null, ['class' => 'form-control', 'id' => 'datetimepicker1', 'readonly', 'required']) !!}
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        {!! Form::label('finish_date', 'Fecha final') !!}
                        {!! Form::text('finish_date', null, ['class' => 'form-control', 'id' => 'datetimepicker2', 'readonly','required']) !!}
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <button type="submit" class="btn btn-default btn-lg btn-block" id="filtrar" style="margin-top:2rem ">Filtrar</button>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="form-group">
                        <a href="{{url('admin/outputproducts/totaloutputs')}}" type="button" class="btn btn-default btn-lg btn-block" id="volver" style="margin-top:2rem">Volver</a>
                    </div>
                </div>
             </form>  
            <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>Area</th>
                        <th>Producto</th>
                        <th>Mes</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $resmas as $outputproduct )
                   
                        <tr>
                            <td>{!! $outputproduct->areaname !!}</td>                     
                            <td>{!! $outputproduct->productname !!}</td>
                            <td>{!! $outputproduct->mes !!}</td>
                            <td>{!! $outputproduct->cantidad !!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>   
                <!-- Modal -->
                {{-- <div class="modal-dialog" id="modalinformacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                ...
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Understood</button>
                            </div>
                        </div>
                    </div>
                </div>{{--fin div modal--}}   
            </div>{{-- /.box-body --}}
        <div class="box-footer">
            
        </div>{{-- /.box-footer--}}
    </div>{{-- /.box --}}
</div>{{-- /.col --}}

@endsection

@section('script')

    {{-- Scripts necesarios para form-validator --}}
    @include('panel.partials.scripts.form-validator')

    {{-- Scripts necesarios para datatables --}}
    @include('panel.partials.scripts.datatables-desc')

    {{-- Scripts necesarios para chosen --}}
    @include('panel.partials.scripts.chosen')

    {{-- Scripts necesarios para inputmask --}}
    @include('panel.partials.scripts.inputmask')

    {{-- Scripts necesarios para datetimepicker --}}
    @include('panel.partials.scripts.datetimepicker2')

@endsection