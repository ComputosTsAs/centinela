@extends('templates.panel-template')

@section('title-head', 'Nuevo producto')

@section('head')
    {{-- Estilos para form-validator --}}
    @include('panel.partials.heads.form-validator-styles')
    {{-- Estilos para datatables --}}
    @include('panel.partials.heads.datatables-styles')
    
@endsection

@section('breadcrumb')
{{-- Content Header (Page header) --}}

<section class="content-header">
    <h1>
        <i class="fa fa-shopping-cart"></i> Pedidos
        <small>Nuevo pedido</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Pedidos</li>
        <li class="active">Nuevo pedido</li>
    </ol>
</section>
@endsection

@section('main-content')

<div id="container-products">
    @include('panel.orders.products')

</div>

@endsection

@section('script')
    {{-- Scripts necesarios para datatables --}}
    @include('panel.partials.scripts.datatables-pedProd')

    {{-- Scripts necesarios para form-validator --}}
    @include('panel.partials.scripts.form-validator')

    {{-- Scripts necesarios para CK Editor 
    @include('panel.partials.scripts.ckeditor') --}}

    {{-- Scripts necesarios para tooltip --}}
    @include('panel.partials.scripts.tooltip')

@endsection



