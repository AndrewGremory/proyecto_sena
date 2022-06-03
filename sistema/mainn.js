$(document).ready(function() {

    tablaPersonas = $('#tablaPersonas').DataTable({
        "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-success btnEditar'><i class='fas fa-edit'></i></button> <button class='btn btn-danger btnBorrar'><i class='fas fa-trash'></i></button></div></div>"
      }],
            
      language: {
        "decimal": "",
        "emptyTable": "No hay datos",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
        "infoEmpty": "Mostrando 0 a 0 de 0 registros",
        "infoFiltered": "(Filtro de _MAX_ total registros)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ registros",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "No se encontraron coincidencias",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        },
        "aria": {
          "sortAscending": ": Activar orden de columna ascendente",
          "sortDescending": ": Activar orden de columna desendente"
        }
      },
     
    });

    

  $('#formulario').submit(function(e){
    e.preventDefault();
    // id = $.trim($("#update_id").val());
    nombre = $.trim($('#nombre').val());
    apellido = $.trim($('#apellido').val());
    usuario = $.trim($('#usuario').val());
    contraseña = $.trim($('#contraseña').val());
    rol = $.trim($('#rol').val());
    correo = $.trim($('#correo').val());
    telefono = $.trim($('#telefono').val());

      $.ajax({
        url: "../crud.php",
        type: "POST",
        dataType: "json",
        data: {id:id, nombre:nombre, apellido:apellido, usuario:usuario, contraseña:contraseña, rol:rol, correo:correo, telefono:telefono},
        success: function(data){
          console.log(data);

          // var datos = JSON.parse(data);
          // id = data[0].id;
          // nombre = data[0].nombre;
          // apellido = data[0].apellido;
          // usuario = data[0].usuario;
          // contraseña = data[0].contraseña;
          // rol = data[0].rol;
          // correo = data[0].correo;
          // telefono = data[0].telefono;
          // tablaPersonas.row.add([id, nombre, apellido, usuario, contraseña, rol, correo, telefono]).draw();

          tablaPersonas.ajax.reload(null, false);
        }

      });
    $('#modalCrud').modal('hide');
  });

  $("#btnNuevo").click(function(){
    $("#formulario").trigger("reset");
    $(".modal-header").css("background-color", "#28a745");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo usuario");

    $("#modalCrud").modal("show");
    id=null;
  });
$(document).on("click", ".btnEditar", function(){
  
})


  $(".btnEditar").click(function(){
    $("#formulario").trigger("reset");
    $(".modal-header").css("background-color", "#6c757d");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar usuario");

    $("#modalCrud").modal("show");
  });


  
 });



$(document).ready(function() {

    Fichas = $('#dataTable').DataTable({
            
      language: {
        "decimal": "",
        "emptyTable": "No hay datos",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
        "infoEmpty": "Mostrando 0 a 0 de 0 registros",
        "infoFiltered": "(Filtro de _MAX_ total registros)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ registros",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "No se encontraron coincidencias",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        },
        "aria": {
          "sortAscending": ": Activar orden de columna ascendente",
          "sortDescending": ": Activar orden de columna desendente"
        }
      },
      "createdRow":function(row,data,index){
                    if (data[6] == "Evaluado"){
                        // $(row).addClass( 'important');
                        $('td', row).eq(5).css({
                            'background-color':'#008000',
                            'color':'white',
                        })
                    }
                    if (data[6] == "Pendiente"){
                        // $(row).addClass( 'important');
                        $('td', row).eq(5).css({
                            'background-color':'#FF3333',
                            'color':'white',
                        })
                    }
                    if (data[6] == "En ejecución"){
                        // $(row).addClass( 'important');
                        $('td', row).eq(5).css({
                            'background-color':'#FFAC33',
                            'color':'white',
                        })
                    }
                },
              

      
      
    });
  

  $("#btnEditar").click(function(){
    alert("editar");
}); });