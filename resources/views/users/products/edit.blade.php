@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Almacen / articulos / Editar</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"></h1>
            </div>
        </div><!--/.row-->
	<div class="panel panel-primary">
		<div class="panel-heading"> 
			<em class="fa fa-cart-plus"></em> Editar producto
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 ">
					<form role="form" action="{{ route('products.update', $Product->id) }}" method="post" >
						{{ csrf_field() }}
						{{ method_field('PUT') }}
						<div class="form-group col-md-12">
							<label>Descripción</label>
							<input class="form-control" name="descripcion" value="{{ $Product->descripcion }}" placeholder="Descripción del producto">
							@if ($errors->has('descripcion'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('descripcion') }}</strong>
                                </span>
                            @endif
						</div>
						<div class="form-group col-md-3">
					      <label>Cantidad</label>
					      <input type="text" class="form-control" name="cantidad" value="{{ $Product->cantidad }}" id="inputZip" placeholder="Existencia..">
					      @if ($errors->has('cantidad'))
					      	<span class="invalid-feedback">
					      		<strong>{{ $errors->first('cantidad') }}</strong>
					      	</span>
					      @endif
					    </div>
					    <div class="form-group col-md-9">
							<label>Categoria</label>
							<select class="form-control" name="categories_id">
								@foreach($category as $categorie)
							 	 	@if ($Product->categories_id == $categorie->id )
					                    <option value="{{ $categorie->id }}" selected>{{ $categorie->descripcion }}</option>
					                @else
					                    <option value="{{ $categorie->id }}">{{ $categorie->descripcion }}</option>
					                @endif
							 	@endforeach
							</select>
							@if ($errors->has('categories_id'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('categories_id') }}</strong>
                                </span>
                            @endif
						</div>
						   <div class="form-group col-md-12">
							<label>Proveedor</label>
							<select class="form-control" name="providers_id">
								@foreach($provider as $providers)
							 	 	<option value= "{{$providers->id}}">{{$providers->empresa}}</option>
							 	@endforeach
							</select>
							@if ($errors->has('providers_id'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('providers_id') }}</strong>
                                </span>
                            @endif
						</div>
						<div class="form-group col-md-6">
					      <label>Precio del provedor</label>
					      <input type="text" name="precio_prov" class="form-control" value="{{ $Product->precio_prov }}" placeholder="Precio al mayoreo..">
					      @if ($errors->has('precio_prov'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('precio_prov') }}</strong>
                                </span>
                            @endif
					    </div>
					    <div class="form-group col-md-6 ">
					      <label>Precio de venta</label>
					      <input type="text" name="precio_vent" class="form-control" value="{{ $Product->precio_vent }}" placeholder="Precio de venta..">
					        @if ($errors->has('precio_vent'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('precio_vent') }}</strong>
                                </span>
                            @endif
					    </div>
					  	
						<button type="submit" class="btn btn-primary col-md-6 col-md-offset-3">Enviar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection