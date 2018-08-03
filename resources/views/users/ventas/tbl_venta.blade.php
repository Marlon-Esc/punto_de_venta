@extends('layouts.app')
@section('content')
	<div class="row justify-content-center">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Ventas / venta</li>
            </ol>
     </div><!--/.row-->
    <div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Agregar nueva venta</h1>
			</div>
		</div><!--/.row-->
				
   	 	@if (session('success'))
				<div class="alert bg-success" role="alert">
					<em class="fa fa-lg fa-warning">&nbsp;</em> 
					{{ session('success') }} 
					<a href="{{ route('sales.index') }}" class="pull-right">
						<em class="fa fa-lg fa-close"></em>
					</a>
				</div>
			@endif
   <section class="content">
          <!-- Default panel -->
          <div class="panel panel-default">
            <div class="panel-heading with-border">
              <h3 class="panel-title"><strong> Nueva Venta</strong></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                    <form action="{{ route('sales.pucharse') }}" method="POST" >
                    	{{ csrf_field() }}
		                <div class="panel panel-info">
		                    <div class="panel-heading with-border">
		                        <h3 class="panel-title pull-left ">Detalles de la Factura</h3>
								<div class="pull-right">
									<button type="submit" class="gnr_vent btn btn-success pull-right" disabled><i class="fa fa-print"></i> Generar venta</button>
								</div>
		                    </div>
		                    <div class="panel-background">
			                        <div class="panel-body">
			                            <div class="row">
				                            <div class="col-md-4">
				                                <label>Cliente</label>
												<select class="input-lg form-control" name="cliente_id" id="cliente_id" >
													<option value="0">Selecciona un cliente</option>
													@foreach ($clientes as $cliente)
								                     <option value="{{ $cliente->id }}">{{ $cliente->nombre_complet }}</option>
								                    @endforeach
												</select>
				                            </div>
				                            <div class="col-md-3">
				                                <label>Fecha</label>
				                                <div class="input-group">
				                                    <input type="text" class="form-control datepicker text-center" name="purchase_date" value="{{ $date }}" disabled="">
				                                    <div class="input-group-addon">
				                                        <a href="#"><i class="fa fa-calendar"></i></a>
				                                    </div>
				                                </div>
				                            </div>
											<div class="col-md-2">
				                                <label>Venta Nº</label>
				                                @isset($sale)
				                                	 <input type="text" class="form-control text-center" name="sale_number" id="sale_number" required="" value="{{ count($sale)+1 }}" >
				                                @endisset
				                                
				                            </div>
											<div class="col-md-3">
				                                <label>Agregar productos</label>
				                               <button type="button" class="btn btn-block btn-info" data-toggle="modal" data-target="#myModal"><i class="fa fa-search"></i> Buscar productos</button>
				                            </div>
			                            </div>
										<div class="row">
										</div>
										 <div class="row">
											
											<hr>
												 <div class="col-md-1">
													<input class="form-control" type="text" value="1" required="">
												 </div>	
												 <div class="col-md-6">
													<div class="input-group">
													  <input class="form-control" type="text" placeholder="Ingresa el código de barras">
														<span class="input-group-btn">
														  <button class="btn btn-default" type="submit"><i class="fa fa-barcode"></i> </button>
														</span>
													</div>
												 </div>		
												
										</div>
			                        </div><!-- /.panel-body -->
		                          </div>
		                </div>
		            </form>
                    <!-- /.panel -->
                </div>
                        <!--/.col end -->
                    </div>
			{{ session(['subtotal' => 0]) }}
			{{ session(['iva' => 0]) }}
			{{ session(['total' => 0]) }}
			{{ session(['productos' => ' ']) }}			
			<div id="resultados_ajax" class="col-md-12" style="margin-top:4px"></div><!-- Carga los datos ajax -->
			<div id="resultados" class="col-md-12" style="margin-top:4px"> 	
				<table class="table table-hover tbl_carrito">
					<thead>
						<tr>
							<th>CODIGO</th>
							<th class="text-center">CANT.</th>
							<th>DESCRIPCION</th>
							<th><span class="pull-right">PRECIO UNIT.</span></th>
							<th><span class="pull-right">PRECIO TOTAL</span></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4"><span class="pull-right">NETO $</span></td>
							<td><span id="id_sub" class="pull-right"></span></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="4"><span class="pull-right">IVA 16% $</span></td>
							<td><span id="id_iva" class="pull-right"></span></td>
							<td></td>
						</tr>
						<tr>
							<td colspan="4"><span class="pull-right">TOTAL $</span></td>
							<td><span id="id_total" class="pull-right"></span></td>
							<td></td>
						</tr>
					</tfoot>
				</table>
			</div><!-- Carga los datos ajax -->
			<div class="panel-footer"></div>	
		  </div><!-- /.panel-body -->
         </div><!-- /.panel -->	
        </section>
        @include('users.ventas.add_product')
@endsection
