@extends('layouts.app')
@section('content')
  	<div class="row justify-content-center">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Ventas / Clientes</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Clientes</h1>
            </div>
        </div><!--/.row-->

			@if (session('result_success'))
				<div class="alert bg-success" role="alert">
					<em class="fa fa-lg fa-warning">&nbsp;</em> 
					{{ session('result_success') }} 
					<a href="{{ route('client.index') }}" class="pull-right">
						<em class="fa fa-lg fa-close"></em>
					</a>
				</div>
			@endif

   <div class="row">
   	 	<div class="col-sm-12">
   	 		<div class="panel panel-success">
   	 			<div class="panel-heading">TABLA DE CLIENTES
					<a href="#"  type="button" title="Agregar cliente" class=" create-client btn btn-success btn-md pull-right"><em class="fa fa-plus-square"></em></a>
					<a  href="{{ url('/home') }}" type="button" title="Regresar al inicio" class="btn btn-success btn-md pull-right"><em class="fa fa-reply"></em></a>
   	 			</div>
   	 			<div class="panel-body">
   	 				<div class="col-xs-12">
	   	 			<table class="table table-hover tbl_client" id="myTable">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Correo</th>
									<th>telefono</th>
									<th class="text-center">Acciones</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($clientes as $cliente)
								@if ($cliente->edo == 1)
									<tr class="{{ $cliente->id }}">
										<td>{{ $cliente->id }}</td>
										<td>{{ $cliente->nombre_complet  }}</td>
										<td>{{ $cliente->email  }}</td>
										<td>{{ $cliente->telefono  }}</td>										
										<td class="td-actions text-right" >
											<div class="row">
												<div class="col-6 col-sm-4 col-md-offset-2 "><a href="#" data-id="{{ $cliente->id }}" data-nom="{{$cliente->nombre_complet}}" data-corre="{{$cliente->email}}" data-tel="{{$cliente->telefono}}" title="Editar cliente" class="edit-client btn btn-primary">Editar</a></div>
												<div class="col-6 col-sm-2"><a href="#" data-id="{{ $cliente->id }}" data-nom="{{$cliente->nombre_complet}}" data-corre="{{$cliente->email}}" data-tel="{{$cliente->telefono}}" title="Eliminar cliente" class="delete-client btn btn-danger">Eliminar</a></div>
											</div>
										</td>
									</tr>
								@endif	
								@empty
									<tr >
										<td colspan="7" class="text-center">Lo sentimos no hay clientes</td>
									</tr>
								@endforelse
							</tbody>
						</table>	
					</div>
   	 			</div>
   	 		</div>
   	 	</div>
   	 	
   </div>
<div id="create-client" class="modal fade" role="dialog">
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
                                    <p id="nm-cl" class="error text-center alert alert-danger hidden"></p>
                                </div>
                            </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Email</label>
                                <input type="text" class="form-control" name="email" required>
                                <p id="mail-cl" class="error text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group label-floating">
                                <label class="control-label">Telefono</label>
                                <input type="text" class="form-control" name="telefono" required>
                                <p id="tlfn-cl" class="error text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        
                    </div>
                 </form>   
             </div>
            <div class="modal-footer">
                 <button class="btn btn-success" type="submit" id="addClient">
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
            <h4 class="modal-title">Editar cliente</h4>
          </div>
          <div class="modal-body">
             <form id="form-del" role="modal">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group label-floating is-focused">
                            <label class="control-label">ID</label>
                            <input type="text" class="form-control" id="id-client" disabled>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group label-floating is-focused">
                            <label class="control-label">Nombre</label>
                            <input type="text" class="form-control" id="nom-client">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating is-focused">
                            <label class="control-label">email</label>
                            <input type="text" class="form-control" id="email-client">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating is-focused">
                            <label class="control-label">Telefono</label>
                            <input type="text" class="form-control" id="tel-client">
                        </div>
                    </div>
                </div>
               </form> 
                <div class="deleteContent">
                  Esta seguro que deseas eliminar <b><span class="title"></span></b>?
                  <span class="hidden id_client"></span>
        </div>
         </div>
          <div id="sbm_client" class="modal-footer">
            <button type="button" id="btn_opcion" class="btn btn-success actionBtn"  data-dismiss="modal"></button>
            <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
          </div>
        </div>

      </div>
</div>
@endsection