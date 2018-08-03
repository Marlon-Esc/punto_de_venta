$(document).on('click','.create-client', function() {
  $('#create-client').modal('show');
  $('.modal-title').text('Añadir cliente');
});
$("#addClient").click(function() {

    $.ajax({
      type: 'POST',
      url: 'addClient',
      data: {
        '_token': $('input[name=_token]').val(),
        'nombre': $('input[name=nombre]').val(),
        'email': $('input[name=email]').val(),
        'telefono': $('input[name=telefono]').val(),
      },
      success: function(data){
        console.log(data)
         if ((data.errors)) {          
          $('.error').removeClass('hidden');
          $('#nm-cl').text(data.errors.nombre);
          $('#mail-cl').text(data.errors.email);
          $('#tlfn-cl').text(data.errors.telefono);
        } else {
          $('.error').remove();
          $('.tbl_client').append("<tr class='" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.nombre_complet + "</td>"+
          "<td>" + data.email + "</td>"+
          "<td>" + data.telefono + "</td>"+
          "<td class='td-actions text-right'><div class='row'>"+
            "<div class='col-6 col-sm-4 col-md-offset-2'>"+
              "<a href='#'' data-id='"+data.id+"' data-nom='"+data.nombre_complet+"' data-corre='"+data.email+"' data-tel='"+data.telefono+"' title='Editar cliente' class='edit-client btn btn-primary'>Editar</a>"+
            "</div>"+
            "<div class='col-6 col-sm-2'>"+
              "<a href='#' data-id='"+data.id+"' data-nom='"+data.nombre_complet+"' data-corre='"+data.email+"' data-tel='"+data.telefono+"' title='Eliminar cliente' class='delete-client btn btn-danger'>Eliminar</a>"+
            "</div>"+
          "</td>");
        }
      },
    });
    
    $('input[name=nombre]').val('');
    $('input[name=email]').val('');
    $('input[name=telefono]').val('');
    $('input[name=direccion]').val('');
  });
// ------------------------- Editar y borrar---------------------------------------
$(document).on('click', '.edit-client', function() {
   $('#btn_opcion').text(" Guardar");
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('editClient');
    $('.modal-title').text('Editar cliente');
    $('.deleteContent').hide();
    $('#id-client').val($(this).data('id'));
    $('#nom-client').val($(this).data('nom'));
    $('#email-client').val($(this).data('corre'));
    $('#tel-client').val($(this).data('tel'));
    $('#myModal').modal('show');
});

$('#sbm_client').on('click', '.editClient', function() {
  $.ajax({
    type: 'POST',
    url: 'editClient',
    data: {
      	'_token': $('input[name=_token]').val(),
      	'id' :  $('#id-client').val(),
	    'nombre':  $('#nom-client').val(),
	    'email': $('#email-client').val(),
	    'telefono': $('#tel-client').val(),
	    
    },
success: function(data) {
    console.log(data.id);
      $('.'+ data.id).replaceWith(" "+
     	  "<tr id='" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.nombre_complet + "</td>"+
          "<td>" + data.email + "</td>"+
          "<td>" + data.telefono + "</td>"+
          "<td class='td-actions text-right'><div class='row'>"+
            "<div class='col-6 col-sm-4 col-md-offset-2'>"+
              "<a href='#'' data-id='"+data.id+"' data-nom='"+data.nombre_complet+"' data-corre='"+data.email+"' data-tel='"+data.telefono+"' title='Editar cliente' class='edit-client btn btn-primary'>Editar</a>"+
            "</div>"+
            "<div class='col-6 col-sm-2'>"+
              "<a href='#' data-id='"+data.id+"' data-nom='"+data.nombre_complet+"' data-corre='"+data.email+"' data-tel='"+data.telefono+"' title='Eliminar cliente' class='delete-client btn btn-danger'>Eliminar</a>"+
            "</div>"+
          "</td>"
       );
    }
  });
});
// form Delete function
$(document).on('click', '.delete-client', function() {
    $('#btn_opcion').text("Borrar cliente");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('deleteClient');
    $('.modal-title').text('Borrar cliente');
    $('.id_client').text($(this).data('id'));
    $('.deleteContent').show();
    $('#form-del').hide();
    $('#myModal').modal('show');
    $('.title').html($(this).data('nom'));
});
$('#sbm_client').on('click', '.deleteClient', function(){  
  $.ajax({
    type: 'POST',
    url: 'disableClient',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('.id_client').text(),

    },
    success: function(data){
      //console.log(data);
      $('.' +$('.id_client').text()).remove();
    }
  });
});
