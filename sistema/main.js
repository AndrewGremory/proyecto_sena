$(document).ready(function() {
    
    var id_usuario, opcion;
    opcion = 4;
        
    tablaUsuarios = $('#tablaUsuarios').DataTable({  
        "ajax":{            
            "url": "../bd/crud.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "id_usuario"},
            {"data": "nombre"},
            {"data": "apellido"},
            {"data": "usuario"},
            {"data": "pw"},
            {"data": "rol"},
            {"data": "correo"},
            {"data": "telefono"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-success btnEditar'><i class='fas fa-edit'></i></button> <button class='btn btn-danger btnBorrar'><i class='fas fa-trash'></i></button></div></div>"}
        ]
    });  
       
    
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formUsuarios').submit(function(e){                         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        nombre = $.trim($('#nombre').val());    
        apellido = $.trim($('#apellido').val());
        usuario = $.trim($('#usuario').val());    
        pw = $.trim($('#pw').val());    
        rol = $.trim($('#rol').val());
        correo = $.trim($('#correo').val());                            
        telefono = $.trim($('#telefono').val());                            
            $.ajax({
              url: "../bd/crud.php",
              type: "POST",
              datatype:"json",    
              data:  {id_usuario:id_usuario, nombre:nombre, apellido:apellido, usuario:usuario, pw:pw, rol:rol, correo:correo ,telefono:telefono ,opcion:opcion},    
              success: function(data) {
                tablaUsuarios.ajax.reload(null, false);
               }
            });			        
        $('#modalCRUD').modal('hide');											     			
    });
            
     
    
    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevo").click(function(){
        opcion = 1; //alta           
        id_usuario=null;
        $("#formUsuarios").trigger("reset");
        $(".modal-header").css( "background-color", "#28a745");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Nuevo Usuario");
        $('#modalCRUD').modal('show');	    
    });
    
    //Editar        
    $(document).on("click", ".btnEditar", function(){		        
        opcion = 2;//editar
        fila = $(this).closest("tr");	        
        id_usuario = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        nombre = fila.find('td:eq(1)').text();
        apellido = fila.find('td:eq(2)').text();
        usuario = fila.find('td:eq(3)').text();
        pw = fila.find('td:eq(4)').text();
        rol = fila.find('td:eq(5)').text();
        correo = fila.find('td:eq(6)').text();
        telefono = fila.find('td:eq(7)').text();
        $("#nombre").val(nombre);
        $("#apellido").val(apellido);
        $("#usuario").val(usuario);
        $("#pw").val(pw);
        $("#rol").val(rol);
        $("#correo").val(correo);
        $("#telefono").val(telefono);
        $(".modal-header").css("background-color", "#343a40");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Usuario");		
        $('#modalCRUD').modal('show');		   
    });
    
    //Borrar
    $(document).on("click", ".btnBorrar", function(){
        fila = $(this);           
        id_usuario = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 3; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro "+id_usuario+"?");                
        if (respuesta) {            
            $.ajax({
              url: "../bd/crud.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, id_usuario:id_usuario},    
              success: function() {
                  tablaUsuarios.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });
         
    });



// TABLA FICHAS

$(document).ready(function() {
    
    var id_ficha, opcion;
    opcion = 8;
        
    tablaFichas = $('#tablaFichas').DataTable({  
        "ajax":{            
            "url": "../bd/crud.php", 
            "method": 'POST', //usamos el metodo POST
            "data":{opcion:opcion}, //enviamos opcion 4 para que haga un SELECT
            "dataSrc":""
        },
        "columns":[
            {"data": "id_ficha"},
            {"data": "tipo_programa"},
            {"data": "pro_nombre"},
            {"data": "lider"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-success btnAdministrar'>Administrar</button></div></div>"},
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-success btnEditarFicha'><i class='fas fa-edit'></i></button> <button class='btn btn-danger btnBorrarFicha'><i class='fas fa-trash'></i></button></div></div>"}
        ]
    });  
       
    
    var fila; //captura la fila, para editar o eliminar
    //submit para el Alta y Actualización
    $('#formFichas').submit(function(e){         
        e.preventDefault(); //evita el comportambiento normal del submit, es decir, recarga total de la página
        id_ficha = $.trim($('#id_ficha').val());    
        tipo_programa = $.trim($('#tipo_programa').val());                         
        pro_nombre = $.trim($('#nombre_programa').val());                         
        lider_ficha = $.trim($('#lider_ficha').val());       
            $.ajax({
              url: "../bd/crud.php",
              type: "POST",
              datatype:"json",    
              data:  {id_ficha:id_ficha, tipo_programa:tipo_programa, pro_nombre:pro_nombre, lider_ficha:lider_ficha, opcion:opcion},    
              success: function(data) {
                tablaFichas.ajax.reload(null, false);
               }
            });			        
        $('#modalCrudFicha').modal('hide');	
										     			
    });
            
     
    
    //para limpiar los campos antes de dar de Alta una Persona
    $("#btnNuevaFicha").click(function(){
        
        opcion = 5; //alta ficha           
        // id_usuario=null;
        $("#formFichas").trigger("reset");
        $(".modal-header").css( "background-color", "#28a745");
        $(".modal-header").css( "color", "white" );
        $(".modal-title").text("Nueva Ficha");
        $('#modalCrudFicha').modal('show');	    
        
    });
    
    //Editar        
    $(document).on("click", ".btnEditarFicha", function(){		  
             
        opcion = 6;//editar
        fila = $(this).closest("tr");	        
        id_ficha = parseInt(fila.find('td:eq(0)').text()); //capturo el ID		            
        lider_ficha = fila.find('td:eq(3)').text();
        


        $("#id_ficha").val(id_ficha);
        $("#lider_ficha").val(lider_ficha);

        

        $(".modal-header").css("background-color", "#343a40");
        $(".modal-header").css("color", "white" );
        $(".modal-title").text("Editar Ficha: "+id_ficha);		
        $('#modalCrudFichaEditar').modal('show');		   
    });

    
    //Borrar
    $(document).on("click", ".btnBorrarFicha", function(){
        fila = $(this);           
        id_ficha = parseInt($(this).closest('tr').find('td:eq(0)').text()) ;		
        opcion = 7; //eliminar        
        var respuesta = confirm("¿Está seguro de borrar el registro "+id_ficha+"?");                
        if (respuesta) {            
            $.ajax({
              url: "../bd/crud.php",
              type: "POST",
              datatype:"json",    
              data:  {opcion:opcion, id_ficha:id_ficha},    
              success: function() {
                tablaFichas.row(fila.parents('tr')).remove().draw();                  
               }
            });	
        }
     });

     
    $(document).on("click", ".btnAdministrar", function(){
        location.href = "seguimiento.php";
        let id_ficha = 
        alert(id_ficha);
    });
         
    });
