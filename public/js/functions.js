$(document).ready(function(){
      $('#myTable').DataTable();
      
});
//ajax Form Add Post
$(document).on('click','.create-modal', function() {
  $('#create').modal('show');
  $('.form-horizontal').show();
  $('.modal-title').text('Añadir categoria');
});
/*$(document).on('click','.edite-modal', function() {
  $('#edit').modal('show');
  $('.form-horizontal').show();
  $('.modal-title').text('Editar categoria');
});*/

// function Edit POST
$(document).on('click', '.edit-modal', function() {
  $('#btn_opcion').text(" Guardar");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit');
    $('.modal-title').text('Editar categoria');
    $('.deleteContent').hide();
    $('.form-horizontal').show();
    $('#id-desc').val($(this).data('id'));
    $('#edit-desc').val($(this).data('descrp'));
    $('#myModal').modal('show');
});

$('.modal-footer').on('click', '.edit', function() {
  $.ajax({
    type: 'POST',
    url: 'edicion',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('#id-desc').val(),
      'descripcion': $('#edit-desc').val(),
    },
success: function(data) {
      $('.idcat' + data.id).replaceWith(" "+
      "<tr class='idcat" + data.id + "'>"+
      "<td>" + data.id + "</td>"+
      "<td>" + data.descripcion + "</td>"+
      "<td class='td-actions text-right'><div class='row'><div class='col-6 col-sm-4 col-md-offset-2'><a href='#'' data-id='"+data.id+"' data-descrp='"+data.descripcion+"' title='Editar categoria' class='edit-modal btn btn-primary'>Editar</a></div><div class='col-6 col-sm-2'><a href='#' title='Eliminar categoria' class='delete-modal btn btn-danger'>Eliminar</a></div>"
      )
    }
  });
});

// form Delete function
$(document).on('click', '.delete-modal', function() {
    $('#btn_opcion').text("Borrar categoria");
    $('#footer_action_button').removeClass('glyphicon-check');
    $('#footer_action_button').addClass('glyphicon-trash');
    $('.actionBtn').removeClass('btn-success');
    $('.actionBtn').addClass('btn-danger');
    $('.actionBtn').addClass('delete');
    $('.modal-title').text('Borrar');
    $('.id').text($(this).data('id'));
    $('.deleteContent').show();
    $('.form-horizontal').hide();
    $('#myModal').modal('show');
    $('.title').html($(this).data('descrp'));
});
$('.modal-footer').on('click', '.delete', function(){  
  $.ajax({
    type: 'POST',
    url: 'delete',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('.id').text()
    },
    success: function(data){
      //console.log(data);
      $('.idcat' + $('.id').text()).remove();
    }
  });
});

$('.add-product').click(function(event) {
   var id = $(this).data('id');
   $.ajax({
     url: 'carrito',
     type: 'POST',
     data: {
      '_token': $('input[name=_token]').val(),
      'id': id,
      'cantidad': $('.'+id).val(),
    },
   })
   .done(function(data) {
     //console.log(data);
     $('.tbl_carrito').append("<tr>"+
          "<td>" + data.producto.id + "</td>"+
          "<td class='text-center'>" + data.cantidad+ "</td>"+
          "<td>" + data.producto.descripcion + "</td>"+
          "<td><span class='pull-right'>"+  data.producto.precio_vent +"</span></td>"+
          "<td><span class='pull-right'>"+  data.neto +"</span></td>");
     $('.gnr_vent').prop('disabled', false);
     $("#id_sub").html(data.sub_total.toFixed(2));
     $("#id_iva").html(data.iva.toFixed(2));
     $("#id_total").html(data.total.toFixed(2));
   })
   .fail(function(data) {
     console.log(data);
     console.log("error");
   });
});
 

$('.detalleVent').click(function(event) {
  var id = $(this).data('id');
  $('.details').html(' ');
  $.ajax({
    url: 'detalle',
    type: 'POST',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': id,
    },
  })
  .done(function(data) {
    $.each(data, function(index, val) {
       $('.tbl_produ').append("<tr>"+
          "<td class='text-center'>" + val.sales_id + "</td>"+
          "<td>" + val.descripcion+ "</td>"+
          "<td class='text-center'>" + val.cantidad + "</td>"+
          "<td class='text-center'>$ "+  val.Total.toFixed(2) + "</td></tr>");
    });
    $('.tbl_produ').append("<tr><td></td><td></td><td>TOTAL: </td><td colspan='4'>$ "+data['0'].total.toFixed(2)+"</td></tr>");
    
    console.log("success");
  })
  .fail(function(data) {
    console.log(data);
    console.log("error");
  })
  .always(function() {
    console.log("complete");
  });
  
});
 
 