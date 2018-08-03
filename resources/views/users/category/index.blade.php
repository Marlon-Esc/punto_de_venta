@extends('layouts.app')
@section('content')
	<div class="row justify-content-center">
            <ol class="breadcrumb">
                <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
                <li class="active">Almacen / Categorias</li>
            </ol>
        </div><!--/.row-->
        
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Categoria</h1>
            </div>
        </div><!--/.row-->

			@if (session('result_success'))
				<div class="alert bg-success" role="alert">
					<em class="fa fa-lg fa-warning">&nbsp;</em> 
					{{ session('result_success') }} 
					<a href="{{ route('category.index') }}" class="pull-right">
						<em class="fa fa-lg fa-close"></em>
					</a>
				</div>
			@endif

   <div class="row">
   	 	<div class="col-sm-12">
   	 		<div class="panel panel-primary">
   	 			<div class="panel-heading">TABLA DE CATEGORIAS
					<a href="#"  type="button" title="Agregar categoria" class=" create-modal btn btn-primary btn-md pull-right"><em class="fa fa-plus-square"></em></a>
					<a  href="{{ url('/home') }}" type="button" title="Regresar al inicio" class="btn btn-primary btn-md pull-right"><em class="fa fa-reply"></em></a>
   	 			</div>
   	 			<div class="panel-body">
   	 				<div class="col-xs-12">
	   	 				<table class="table table-hover" id="myTable">
							<thead>
								<tr>
									<th>#</th>
									<th>Descripción</th>
									<th class="text-center">Acciones</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($category as $categoria)
								@if ($categoria->edo == 1)
									<tr class="idcat{{ $categoria->id }}">
										<td>{{ $categoria->id }}</td>
										<td>{{ $categoria->descripcion  }}</td>
										<td class="td-actions text-right" >
											<div class="row">
												<div class="col-6 col-sm-4 col-md-offset-2 "><a href="#" data-id="{{ $categoria->id }}" data-descrp="{{$categoria->descripcion}}" title="Editar categoria" class="edit-modal btn btn-primary">Editar</a></div>
												<div class="col-6 col-sm-2"><a href="#" data-id="{{ $categoria->id }}" data-descrp="{{$categoria->descripcion}}" title="Eliminar categoria" class="delete-modal btn btn-danger">Eliminar</a></div>
											</div>
										</td>
									</tr>
								@endif	
								@empty
									<tr >
										<td colspan="7" class="text-center">Lo sentimos no hay categorias</td>
									</tr>
								@endforelse
							</tbody>
						</table>	
					</div>
   	 			</div>
   	 		</div>
   	 	</div>
   	 	
   </div>
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ route('category.store') }}" role="form" method="post" >
        	{{ csrf_field() }}
			{{ method_field('PUT') }}
          <div class="form-group row add">
            <div class="col-sm-10 col-md-offset-1">
              <input type="text" class="form-control" id="title" name="descripcion"
              placeholder="Añade nombre de la categoria..." value="{{ old('descripcion') }}" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
            @if ($errors->has('descripcion'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('descripcion') }}</strong>
                </span>
            @endif
          </div>
			<div class="modal-footer">
          	<button class="btn btn-success" type="submit">
              <span class="glyphicon glyphicon-plus"></span> Guardar
            </button>
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="glyphicon glyphicon-remobe"></span>Cancelar
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
 </div></div>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal">
          <div class="form-group">
            <div class="col-sm-10 col-md-offset-1">
              <input type="text" class="form-control" id="id-desc" disabled>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-10 col-md-offset-1">
            <input type="name" class="form-control" id="edit-desc">
            </div>
          </div>
        </form>
                {{-- Form Delete Post --}}
        <div class="deleteContent">
          Esta seguro que deseas eliminar la categoria <b><span class="title"></span></b>?
          <span class="hidden id"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button id="btn_opcion" type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>Cerrar
        </button>
      </div>
    </div>
  </div>
</div>
 
@endsection
