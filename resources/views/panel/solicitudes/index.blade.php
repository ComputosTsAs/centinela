@extends('templates.panel-template')

@section('title-head', 'Administración de equipos')

@section('head')


@endsection

@section('breadcrumb')
    {{-- Content Header (Page header) --}}
    <section class="content-header">
        <h1>
            <i class="fa fa-desktop"></i> Equipos
            <small>Administración</small>
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
                    <div class="col-lg-3 col-xs-6">
                        <div class="small-box bg-yellow">
                            <div class="inner">
                              <h4>Administrar</h4>
                              <p>Solicitudes</p>
                            </div>
                            <div class="icon">
                              <i class="fa fa-hdd-o"></i>
                            </div>
                            <a href="equipos/solicitudes" class="small-box-footer">
                              Ver <i class="fa fa-arrow-circle-right"></i>
                            </a>
                          </div>
                    </div>{{-- ./col --}}
                    
                </div>
            @endif
    </div>{{-- /.col --}}

@endsection

@section('script')


    {{-- Scripts necesarios para tooltip --}}
    @include('panel.partials.scripts.tooltip')

@endsection
