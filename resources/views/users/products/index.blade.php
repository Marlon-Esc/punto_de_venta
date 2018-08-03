@extends('layouts.app')
@section('content')
	<div class="row justify-content-center">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Almacen / articulos</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Articulos</h1>
            </div>
        </div><!--/.row-->

			@if (session('result_success'))
				<div class="alert bg-success" role="alert">
					<em class="fa fa-lg fa-warning">&nbsp;</em> 
					{{ session('result_success') }} 
					<a href="{{ route('products.index') }}" class="pull-right">
						<em class="fa fa-lg fa-close"></em>
					</a>
				</div>
			@endif
   <div class="row">
   	 	<div class="col-sm-12">
   	 		<div class="panel panel-warning">
   	 			<div class="panel-heading">TABLA DE PRODUCTOS
					<a href="{{ route('products.create') }}"  type="button" title="Agregar producto" class="btn btn-warning btn-md pull-right"><em class="fa fa-plus-square"></em></a>
					<a  href="{{ url('/home') }}" type="button" title="Regresar al inicio" class="btn btn-warning btn-md pull-right"><em class="fa fa-reply"></em></a>
   	 			</div>
   	 			<div class="panel-body">
   	 				<table class="table table-hover" id="myTable">
						<thead>
							<tr>
								<th>#</th>
								<th>Descripción</th>
								<th>Cantidad</th>
								<th>Precio_provedor</th>
								<th>Precio_venta</th>
								<th>Categoria</th>
								<th class="text-center">Acciones</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($products as $product)
							@if ($product->status == 1 )
								<tr>
									<td>{{ $product->id }}</td>
									<td>{{ $product->descripcion  }}</td>
									<td>{{ $product->cantidad }}</td>
									<td>$ {{ $product->precio_prov }}.00</td>
									<td>${{ $product->precio_vent }}.00</td>
									<td>{{ $product->categories_id }}</td>
									<td class="td-actions text-right" >
										<div class="row">
											<div class="col-6 col-sm-4 col-md-offset-1"><a href="{{ route('products.edit',$product->id) }}" title="Editar producto" class="btn btn-sm btn-primary">Editar</a></div>
											<div class="col-6 col-sm-4 "><a href="{{ route('products.delete',$product->id) }}" title="Eliminar producto" class="btn btn-sm btn-danger">Eliminar</a></div>
										</div>
									</td>
									
								</tr>
							@endif
							@empty
								<tr >
									<td colspan="7" class="text-center">Lo sentimos no hay productos</td>
								</tr>
							@endforelse
						</tbody>
					</table>	
   	 			</div>
   	 		</div>
   	 	</div>
   </div>
@endsection
