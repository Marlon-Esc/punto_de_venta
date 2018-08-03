@extends('layouts.app')
@section('content')
  	<div class="row justify-content-center">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Almacen / Proveedores</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Proveedores</h1>
            </div>
        </div><!--/.row-->

			@if (session('result_success'))
				<div class="alert bg-success" role="alert">
					<em class="fa fa-lg fa-warning">&nbsp;</em> 
					{{ session('result_success') }} 
					<a href="{{ route('provider.index') }}" class="pull-right">
						<em class="fa fa-lg fa-close"></em>
					</a>
				</div>
			@endif

   <div class="row">
   	 	<div class="col-sm-12">
   	 		<div class="panel panel-primary">
   	 			<div class="panel-heading">TABLA DE PROVEEDORES
					<a href="#"  type="button" title="Agregar categoria" class=" create-modal btn btn-primary btn-md pull-right"><em class="fa fa-plus-square"></em></a>
					<a  href="{{ url('/home') }}" type="button" title="Regresar al inicio" class="btn btn-primary btn-md pull-right"><em class="fa fa-reply"></em></a>
   	 			</div>
   	 			<div class="panel-body">
   	 				<div class="col-xs-12">
	   	 			<table class="table table-hover tbl_prov"  id="myTable">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Empresa</th>
									<th>telefono</th>
									<th>Direccion</th>
									<th class="text-center">Acciones</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($providers as $provider)
								@if ($provider->edo == 1)
									<tr id="{{ $provider->id }}">
										<td>{{ $provider->id }}</td>
										<td>{{ $provider->nombre_complet  }}</td>
										<td>{{ $provider->empresa  }}</td>
										<td>{{ $provider->telefono  }}</td>
										<td>{{ $provider->direccion  }}</td>
										<td class="td-actions text-right" >
											<div class="row">
												<div class="col-6 col-sm-4 col-md-offset-2 "><a href="#" data-id="{{ $provider->id }}" data-nom="{{$provider->nombre_complet}}" data-empre="{{$provider->empresa}}" data-tel="{{$provider->telefono}}" data-direc="{{$provider->direccion}}" title="Editar categoria" class="edit-prov btn btn-primary">Editar</a></div>
												<div class="col-6 col-sm-2"><a href="#" data-id="{{ $provider->id }}" data-nom="{{$provider->nombre_complet}}" data-empre="{{$provider->empresa}}" data-tel="{{$provider->telefono}}" data-direc="{{$provider->direccion}}" title="Eliminar categoria" class="delete-prove btn btn-danger">Eliminar</a></div>
											</div>
										</td>
									</tr>
								@endif	
								@empty
									<tr >
										<td colspan="7" class="text-center">Lo sentimos no hay provedores</td>
									</tr>
								@endforelse
							</tbody>
						</table>	
					</div>
   	 			</div>
   	 		</div>
   	 	</div>
   	 	
   </div>
<div id="create-provider" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"></h4>
          </div>
              <div class="modal-body">
                <form  role="form" >
                    {{ csrf_field() }}
                    
                    <div class="row">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" required>
                                    <p id="nm-pr" class="error text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Empresa</label>
                                <input type="text" class="form-control" name="empresa" required>
                                <p id="nm-em" class="error text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Telefono</label>
                                <input type="text" class="form-control" name="telefono" required>
                                <p id="tlfn" class="error text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Dirección</label>
                                <input type="text" class="form-control" name="direccion" required>
                                <p id="address" class="error text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                    </div>
                 </form>   
             </div>
            <div class="modal-footer">
                 <button class="btn btn-success" type="submit" id="addProv">
                  <span class="glyphicon glyphicon-plus"></span> Guardar

                </button>
                <button class="btn btn-warning" type="button" data-dismiss="modal">
                  <span class="glyphicon glyphicon-remobe"></span>Cancelar
                </button>
           </div>
       
  </div>
 </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Agregar Provedor</h4>
          </div>
          <div class="modal-body">
             <form id="form-del" role="modal">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group label-floating is-focused">
                            <label class="control-label">ID</label>
                            <input type="text" class="form-control" id="id-prov" disabled>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group label-floating is-focused">
                            <label class="control-label">Nombre</label>
                            <input type="text" class="form-control" id="nom-prov">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating is-focused">
                            <label class="control-label">Empresa</label>
                            <input type="text" class="form-control" id="em-prov">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating is-focused">
                            <label class="control-label">Telefono</label>
                            <input type="text" class="form-control" id="tel-prov">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group label-floating is-focused">
                            <label class="control-label">Dirección</label>
                            <input type="text" class="form-control" id="direc-prov">
                        </div>
                    </div>
                </div>
               </form> 
                <div class="deleteContent">
                  Esta seguro que deseas eliminar <b><span class="title"></span></b>?
                  <span class="hidden id_prov"></span>
        </div>
         </div>
          <div id="sbm_prov_footer" class="modal-footer">
            <button type="button" id="btn_opcion" class="btn btn-success actionBtn"  data-dismiss="modal"></button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
          </div>
        </div>

      </div>
</div>
@endsection