@extends('templates.panel-template')

@section('title-head', 'Ver solicitud')

@section('head')
    
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
        <i class="fa fa-car"></i> Detalle/Modificar
        <small>Solicitud</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Solicitudes</li>
        <li><a href="{{ route('solicitudes.index') }}">Listado</a></li>
        <li class="active">Detalle/Modificar</li>
    </ol>
</section>
@endsection

@section('main-content')

<div class="row">

    <div class="col-md-3">

        {{-- Info box --}}
        <div class="box box-solid box-info">

            <div class="box-header">
                <h3 class="box-title">Detalle de la solicitud</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div>

            <div class="box-body">

               
                {{-- <td>{!! date('d-m-Y', strtotime($solicitud->admission_date)) !!}</td>
                <td>{!! $solicitud->user->lastname!!}, {!! $solicitud->user->name !!}</td>
                <td>{!! $solicitud->description !!}</td>
                <td>{!! $solicitud->status->name !!}</td>
                <td>@if($solicitud->delivery_date)
                    {!! date('d-m-Y', strtotime($solicitud->delivery_date)) !!}
                
                @endif
                </td>
                <td>@if($solicitud->user_id_deliver)
                    {!! $solicitud->user_id_deliver!!}
                @endif
                </td>

                <td>
                @if($solicitud->who_takes)
                    {!!$solicitud->who_takes!!}
                @endif
                </td> --}}


                {{----}}
                <strong><i class="fa fa-commenting-o margin-r-5"></i> Pedido</strong>

                <p class="text-muted">
                    {!! $solicitud->description !!}
                </p>

                <hr>

                {{-- <p class="text-muted">
                    {!! $solicitud->area->name !!}
                </p>
     --}}
           
                {{----}}
                <strong><i class="fa fa-calendar margin-r-5"></i> Fecha</strong>

                <p class="text-muted">
                    {!! date('d-m-Y', strtotime($solicitud->admission_date)) !!}
                </p>

                <hr>

                <strong><i class="fa fa-clock-o margin-r-5"></i> Hora</strong>

                <p class="text-muted">
                    {!! date('H:i', strtotime($solicitud->admission_date)) !!}
                </p>

                <hr>
                <strong><i class="fa fa-commenting-o margin-r-5"></i> Solicitante</strong>

                <p class="text-muted">
                    {!! $solicitud->user->name !!}  {!! $solicitud->user->lastname !!}
                </p>

                <hr>
               

                {{-- Boton eliminar  --}}
                <a href="#" class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#myModal"><b>Eliminar</b></a>

                {{-- Modal --}}
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        {{-- Modal content --}}
                        <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Alerta!</h4>
                        </div>
                        <div class="modal-body">
                            <p>Está seguro que desea eliminar la solicitud {!! $solicitud->description !!} de la fecha <b>"{!! date('d-m-Y', strtotime($solicitud->admission_date)) !!}"</b> ?</p>
                        </div>
                        <div class="modal-footer">

                            {{ Form::open(['route' => ['solicitudes.destroy', $solicitud->id], 'method' => 'DELETE']) }}
                                {{ Form::submit('Sí', ['class' => 'btn btn-danger btn-sm btn-sm']) }}

                                <button type="button" class="btn btn-default btn-sm btn-sm" data-dismiss="modal">No</button>
                            {{ Form::close() }}

                        </div>
                        </div>

                    </div>
                </div>
                
            </div>{{-- /.box-body --}}
        </div>{{-- /.box --}}

    </div>
    {{-- /.col --}}

    <div class="col-md-9">
        <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#settings" data-toggle="tab">Modificar</a></li>
        </ul>
        <div class="tab-content">

            <div class="tab-pane active" id="settings">

                  {{-- <td>{!! date('d-m-Y', strtotime($solicitud->admission_date)) !!}</td>
                <td>{!! $solicitud->user->lastname!!}, {!! $solicitud->user->name !!}</td>
                <td>{!! $solicitud->description !!}</td>
                <td>{!! $solicitud->status->name !!}</td>
                <td>@if($solicitud->delivery_date)
                    {!! date('d-m-Y', strtotime($solicitud->delivery_date)) !!}
                
                @endif
                </td>
                <td>@if($solicitud->user_id_deliver)
                    {!! $solicitud->user_id_deliver!!}
                @endif
                </td>

                <td>
                @if($solicitud->who_takes)
                    {!!$solicitud->who_takes!!}
                @endif
                </td> --}}


                {{-- form start --}}
                {!! Form::open(['route' => ['solicitudes.update', $solicitud->id], 'method' => 'PUT']) !!}
                <div class="box-body">
                    <div class="row">
                        {{-- Fecha --}}
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('work_date', 'Fecha') !!}
                                {!! Form::text('work_date', $solicitud->admission_date, ['class' => 'form-control', 'id' => 'datetimepicker1', 'readonly', 'required']) !!}
                            </div>
                        </div> --}}

                        {{-- Solicitante --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('user_id', 'Solicitante') !!}
                                <select class="form-control select-simple" id="user_id" name="user_id">
                                    @foreach ( $users as $user )
                                        @if ( $solicitud->user_id == $user->id)
                                            <option value="{{ $user->id }}" selected>{{ $user->lastname }}, {{ $user->name }} ({{ $user->area->name }})</option>
                                        @else
                                            <option value="{{ $user->id }}">{{ $user->lastname }}, {{ $user->name }} ({{ $user->area->name }})</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Estado --}}
                        <div class="col-md-6" >
                            <div class="form-group">
                                {!! Form::label( 'Estado') !!}
                                <select class="form-control select-simple" id="status_id" name="status_id">
                                    @foreach ( $status as $stat )
                                        @if ( $solicitud->status_id == $stat->id)
                                            <option value="{{ $stat->id }}" selected> {{ $stat->name }} </option>
                                        @else
                                            <option value="{{ $stat->id }}"> {{ $stat->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row " id="who_takes_row">
                        <div class="col-md-6"><div class="form-group" > 
                            {!! Form::label("who_takes", "Retiró") !!} 
                            {!! Form::text("who_takes", $solicitud->who_takes, ["class" => "form-control", "id"=> "who_takes"]) !!}
                        </div>
                    </div>
                    </div>  

                    <div class="row">
                        {{-- Description --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::label('description', 'Pedido') !!}
                                {!! Form::textarea('description', $solicitud->description, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    
                </div>

                {{-- <input type="hidden" name="user_id_deliver" value="{!! Auth::user()->id !!}"> --}}
                <input type="hidden" name="admission_date" value="{!!  $solicitud->admission_date !!}">
                <div class="box-footer">
                    {!! Form::submit('Modificar', ['class' => 'btn btn-warning']) !!}
                </div>
                {!! Form::close() !!}

            </div>
            {{-- /.tab-pane --}}
        </div>
        {{-- /.tab-content --}}
        </div>
        {{-- /.nav-tabs-custom --}}
    </div>
    {{-- /.col --}}
</div>
{{-- /.row --}}
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script	src="../../js/solicitudes.js"></script>
@endsection

@section('script')


    {{-- Scripts necesarios para form-validator --}}
    @include('panel.partials.scripts.form-validator')

    {{-- Scripts necesarios para chosen --}}
    @include('panel.partials.scripts.chosen')

    {{-- Scripts necesarios para CK Editor --}}
    @include('panel.partials.scripts.ckeditor')

    {{-- Scripts necesarios para datetimepicker --}}
    @include('panel.partials.scripts.datetimepicker')

@endsection