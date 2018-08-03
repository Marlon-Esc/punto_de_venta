@extends('layouts.app')
@section('content')
	<div class="row justify-content-center">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Compras / ventas</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Historial de ventas</h1>
            </div>
        </div><!--/.row-->

			@if (session('result_success'))
				<div class="alert bg-success" role="alert">
					<em class="fa fa-lg fa-warning">&nbsp;</em> 
					{{ session('result_success') }} 
					<a href="{{--route('products.index) --}}" class="pull-right">
						<em class="fa fa-lg fa-close"></em>
					</a>
				</div>
			@endif
   <div class="row">
   	 	<div class="col-sm-12">
   	 		<div class="panel panel-warning">
   	 			<div class="panel-heading">TABLA DE VENTAS
					<a href="{{ route('sales.index') }}"  type="button" title="Agregar producto" class="btn btn-warning btn-md pull-right"><em class="fa fa-plus-square"></em></a>
					<a  href="{{ url('/home') }}" type="button" title="Regresar al inicio" class="btn btn-warning btn-md pull-right"><em class="fa fa-reply"></em></a>
   	 			</div>
   	 			<div class="panel-body">
   	 				<table class="table table-hover" id="myTable">
						<thead>
							<tr>
								<th>#</th>
								<th>usuario</th>
								<th>cliente</th>
								<th>Subtotal</th>
								<th>IVA</th>
								<th>total</th>
								<th class="text-center">Acciones</th>
							</tr>
						</thead>
						<tbody>
							@forelse ($ventas as $venta)
								<tr>
									<td>{{ $venta->id }}</td>
									<td>{{ $venta->name  }}</td>
									<td>{{ $venta->client_id }}</td>
									<td>$ {{ $venta->subtotal }}</td>
									<td>$ {{ $venta->IVA }}</td>
									<td>$ {{ $venta->total }}</td>
									<td class="td-actions text-right" >
										<div class="row">
											<div class="col-6 col-sm-4 col-md-offset-3"><a href="{{-- route('ventas.edit',$venta->id) --}}" title="Ver detalles" class="btn btn-sm btn-primary detalleVent" data-toggle="modal" data-target="#modalDetalles"  data-id={{ $venta->id }} >Detalles</a></div>
										</div>
									</td>
								</tr>
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

   <!-- Modal -->
<div id="modalDetalles" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <strong class="modal-title">Venta</strong>
      </div>
      <div class="modal-body">
        <table class="table tbl_produ">
        	<caption>Detalle de la venta</caption>
        	<thead>
        		<tr>
        			<th>N° venta</th>
        			<th>Producto</th>
        			<th>Cantidad</th>
        			<th>Total</th>
        		</tr>
        	</thead>
        	<tbody class="details">
        		
        	</tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

@endsection

