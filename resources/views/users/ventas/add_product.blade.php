<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		          <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal">&times;</button>
		            <h4 class="modal-title">Buscar productos</h4>
		          </div>
		              <div class="modal-body">
		                <table class="table table-hover" id="myTable">
		                	<thead>
		                		<tr>
		                			<th>Código</th>
		                			<th>Descripción</th>
		                			<th>Stock</th>
		                			<th class="text-center">Cantidad</th>
		                			<th class="text-center">Precio</th>
		                		</tr>
		                	</thead>
		                	<tbody>
		                		@forelse ($productos as $producto)
		                			<tr>
			                			<td>{{ $producto->id }}</td>
			                			<td>{{ $producto->descripcion }}</td>
			                			<td>{{ $producto->cantidad }}</td>
		                				<td class="col-xs-1">
											<div class="pull-right">
												<input type="number" class="form-control {{ $producto->id }}" style="text-align:right" name="canti" value="1">
											</div>
										</td>
			                			<td class="col-xs-4">
			                			   <div class="input-group pull-left">
												<div class="input-group-addon">$</div>
												<input type="text" class="form-control" style="text-align:right;" name="pre_vent" value="{{ number_format($producto->precio_vent, 2, '.', ',')  }}">
											</div>	

			                			   <span class="pull-right">
		                					 <a href="#" data-id={{ $producto->id }} title="Agregar al carrito" class="add-product">
		                					   <i class="fa fa-cart-plus" style="font-size:24px;color: #5CB85C;"></i>
		                					 </a>
		                				   </span>
			                			</td>
			                		</tr>
		                		@empty
									<tr>
										<td colspan="5" class="text-center">Lo sentimos no hay productos</td>
									</tr>
								@endforelse
		                	</tbody>
		                </table>
		             </div>
		            <div class="modal-footer">		                 
		                <button class="btn btn-warning" type="button" data-dismiss="modal">
		                  <span class="glyphicon glyphicon-remobe"></span>Cerrar
		                </button>
		           </div>   
		      </div>
		   </div>
		</div>