
<div class="row">
    @foreach ( $products as $product)
        <div class="col-sm-12">
            <div class="col-sm-3">

                <div class="thumbnail">

                    @if ( $product->image != null )
                        <img src="{{ asset('img/products/' . $product->image ) }}" alt="{{ $product->name }}">
                    @else
                        <img src="{{ asset('AdminLTE/img/producto-sin-foto.png') }}" alt="producto-sin-foto.png">
                    @endif
        
                </div>
            </div>

            <div class="col-sm-9">
                <h3>
                    {!! $product->name !!}
                </h3>
                <p>
                    {!! $product->description !!}
                </p>

                @if ( $product->stock != 0 )
                    <a class="btn btn-primary btn-sm" data-target="#myModal{!! $product->id !!}" data-toggle="modal" href="#">
                        <b>
                            Solicitar
                        </b>
                    </a>
                @else
                    <p class="text-danger">No poseemos stock de {!! $product->name !!}</p>
                @endif

                {{-- Modal --}}
                <div class="modal fade" id="myModal{!! $product->id !!}" role="dialog">
                    <div class="modal-dialog">
                        {{-- Modal content --}}
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dismiss="modal" type="button">
                                    ×
                                </button>
                                <h4 class="modal-title">
                                    <i class="fa fa-bullhorn">
                                    </i>
                                    Solicitar
                                    <strong>
                                        "{!! $product->name !!}"
                                    </strong>
                                </h4>
                                {!! $product->description !!}
                            </div>

                            {{-- Pregunto si el producto es papel --}}
                            @if (($product->id == 10) || ($product->id == 11) || ($product->id == 12))
                            <div class="row">

                                <div class="col-md-6">
                                @endif

                                    {!! Form::open(['route' => 'orders.store', 'method' => 'POST']) !!}
                                    <div class="modal-body">
        
                                        {{ Form::hidden('product_id', $product->id) }}
    
                                        {{-- Cantidad --}}
                                        <div class="form-group">
                                            {!! Form::label('quantity', 'Cantidad (máximo 3 unidades)') !!}
                                            {!! Form::text('quantity', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la cantidad', 'data-validation' => 'number', 'data-validation-allowing' => 'range[1;3]']) !!}
                                        </div>
                                        {{-- Description --}}
                                        <div class="form-group">
                                            {!! Form::label('description', 'Descripción') !!}
                                            {!! Form::textarea('description', null, ['class' => 'form-control', 'data-validation' => 'required', 'placeholder' => 'Ingrese descripción. Ej: Razón de la solicitud, recuento de páginas impresas en caso de solicitar toner.', 'style' => 'resize:none']) !!}
                                        </div>
                                        
                                    </div>
                                
                                {{-- Cierro el div  --}}
                                @if (($product->id == 10) || ($product->id == 11) || ($product->id == 12))
                                </div>
                                @endif

                                @if (($product->id == 10) || ($product->id == 11) || ($product->id == 12))
                                <div class="col-md-6">
                                    <center>
                                        <img src="{{ asset('AdminLTE/img/cuidar-papel.jpg') }}" alt="cuidar papel" class="img-responsive">
                                    </center>
                                </div>

                            </div>
                            @endif

                            <div class="modal-footer">
                                {{ Form::submit('Solicitar', ['class' => 'btn btn-success btn-sm btn-sm']) }}
                                <button class="btn btn-danger btn-sm btn-sm" data-dismiss="modal" type="button">
                                    Cancelar
                                </button>
                                {{ Form::close() }}
                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
        
        </div>

        <hr>

    @endforeach

</div>

