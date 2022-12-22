@extends('templates.panel-template')

@section('title-head', 'Nuevo producto')

@section('head')
    
    {{-- Estilos para form-validator --}}
    @include('panel.partials.heads.form-validator-styles')

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
{{-- Buscador de productos --}}
<div class="col-sm-12">
    
    <div class="col-sm-8">
    </div>
    <div class="col-sm-4">
        <input class="form-control" placeholder="Ingrese un producto a buscar..." type="text" id="search-box">

    </div>

</div>
<br>
{{-- Fin Buscador de productos --}}
<div id="container-products">
    @include('panel.orders.products')

</div>



@endsection

@section('script')

    {{-- Scripts necesarios para form-validator --}}
    @include('panel.partials.scripts.form-validator')

    {{-- Scripts necesarios para CK Editor 
    @include('panel.partials.scripts.ckeditor') --}}
    <script src="{{asset('AdminLTE/js/searcher.js')}}"></script>

@endsection



