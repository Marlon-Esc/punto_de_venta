$(document).on('click','.create-modal', function() {
  $('#create-provider').modal('show');
  $('.modal-title').text('Añadir proveedor');
});
$("#addProv").click(function() {

    $.ajax({
      type: 'POST',
      url: 'addProv',
      data: {
        '_token': $('input[name=_token]').val(),
        'nombre': $('input[name=nombre]').val(),
        'empresa': $('input[name=empresa]').val(),
        'telefono': $('input[name=telefono]').val(),
        'direccion': $('input[name=direccion]').val(),
      },
      success: function(data){
        alert(data);
        console.log(data)
         if ((data.errors)) {          
          $('.error').removeClass('hidden');
          $('#nm-pr').text(data.errors.nombre);
          $('#nm-em').text(data.errors.empresa);
          $('#tlfn').text(data.errors.telefono);
          $('#address').text(data.errors.direccion);
        } else {
          $('.error').remove();
          $('.tbl_prov').append("<tr class='" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.nombre_complet + "</td>"+
          "<td>" + data.empresa + "</td>"+
          "<td>" + data.direccion + "</td>"+
          "<td>" + data.telefono + "</td>"+
          "<td class='td-actions text-right'><div class='row'>"+
            "<div class='col-6 col-sm-4 col-md-offset-2'>"+
              "<a href='#'' data-id='"+data.id+"' data-nom='"+data.nombre_complet+"' data-empre='"+data.empresa+"' data-tel='"+data.telefono+"' data-direc='"+data.direccion+"' title='Editar proveedor' class='edit-prov btn btn-primary'>Editar</a>"+
            "</div>"+
            "<div class='col-6 col-sm-2'>"+
              "<a href='#' data-id='"+data.id+"' data-nom='"+data.nombre_complet+"' data-empre='"+data.empresa+"' data-tel='"+data.telefono+"' data-direc='"+data.direccion+"' title='Eliminar proveedor' class='delete-prove btn btn-danger'>Eliminar</a>"+
            "</div>"+
          "</td>");
        }
      },
    });
    
    $('input[name=nombre]').val('');
    $('input[name=empresa]').val('');
    $('input[name=telefono]').val('');
    $('input[name=direccion]').val('');
  });
// ------------------------- Editar y borrar---------------------------------------
$(document).on('click', '.edit-prov', function() {
   $('#btn_opcion').text(" Guardar");
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('editProve');
    $('.modal-title').text('Editar PROVEDOR');
    $('.deleteContent').hide();
    $('#id-prov').val($(this).data('id'));
    $('#nom-prov').val($(this).data('nom'));
    $('#em-prov').val($(this).data('empre'));
    $('#tel-prov').val($(this).data('tel'));
    $('#direc-prov').val($(this).data('direc'));
    $('#myModal').modal('show');
});

$('#sbm_prov').on('click', '.editProve', function() {
  $.ajax({
    type: 'POST',
    url: 'editProv',
    data: {
      	'_token': $('input[name=_token]').val(),
      	'id' :  $('#id-prov').val(),
	    'nombre':  $('#nom-prov').val(),
	    'empresa': $('#em-prov').val(),
	    'telefono': $('#tel-prov').val(),
	    'direccion':$('#direc-prov').val(),
    },
success: function(data) {
    console.log(data);
      $('#'+ data.id).replaceWith(" "+
     	  "<tr class='" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.nombre_complet + "</td>"+
          "<td>" + data.empresa + "</td>"+
          "<td>" + data.telefono + "</td>"+
          "<td>" + data.direccion + "</td>"+
          "<td class='td-actions text-right'><div class='row'>"+
          "<div class='col-6 col-sm-4 col-md-offset-2'>"+
            "<a href='#'' data-id='"+data.id+"' data-nom='"+data.nombre_complet+"' data-empre='"+data.empresa+"' data-tel='"+data.telefono+"' data-direc='"+data.direccion+"' title='Editar proveedor' class='edit-prove btn btn-primary'>Editar</a>"+
          "</div>"+
            "<div class='col-6 col-sm-2'>"+
              "<a href='#' data-id='"+data.id+"' data-nom='"+data.nombre+"' data-empre='"+data.empresa+"' data-tel='"+data.telefono+"' data-direc='"+data.direccion+"' title='Eliminar proveedor' class='delete-prove btn btn-danger'>Eliminar</a>"+
            "</div>"+
          "</td>"
       );
    }
  });
});
// form Delete function
$(document).on('click', '.delete-prove', function() {
    $('#btn_opcion').text("Borrar provedor");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteProv');
    $('.modal-title').text('Borrar proveedor');
    $('.id_prov').text($(this).data('id'));
    $('.deleteContent').show();
    $('#form-del').hide();
    $('#myModal').modal('show');
    $('.title').html($(this).data('nom'));
});
$('#sbm_prov_footer').on('click', '.deleteProv', function(){  
  $.ajax({
    type: 'POST',
    url: 'disableProv',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('.id_prov').text(),

    },
    success: function(data){
      //console.log(data);
      $('.' +$('.id_prov').text()).remove();
    }
  });
});
