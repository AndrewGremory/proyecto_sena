<?php include_once "includes/header.php"; 


// $usuarios = "SELECT * FROM usuarios";


// $resultado = $conexion->prepare($usuarios);
// $resultado->execute();
// $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
// ?>



<div id="layoutSidenav_content">
    <main class="container"> 
        <br>
        <div class="col-lg">
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal" >Nuevo</button>
        </div>
        <br>
    <div class="table-responsive">
        <table class="table table-bordered" id="tablaUsuarios" width="100%" cellspacing="0">
            <br>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Correo electronico</th>
                    <th>Telefono</th>
                    <th>Editar</th>
                    <!-- <th>Eliminar</th>    -->

                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Correo electronico</th>
                    <th>Telefono</th>
                    <th>Editar</th>
                    <!-- <th>Eliminar</th> -->

                </tr>
            </tfoot>
            <tbody>
            
            </tbody>
        </table>
    </div>

</div>
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formUsuarios">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" required>
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Apellido:</label>
                    <input type="text" class="form-control" id="apellido" required>
                    </div> 
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Usuario:</label>
                    <input type="text" class="form-control" id="usuario" required>
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Contraseña: </label>
                    <input type="password" class="form-control" id="pw" required>
                    </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label for="" class="col-form-label">Rol: </label>
                        <select name="rol" class="form-control" name="rol" id="rol" required>
                            <option selected disabled value="">Seleccione un tipo de usuario</option>
                            <option value="1">administrador</option>
                            <option value="2">instructor</option>
                            <option value="3">coordinador</option>
                        </select>
                        </div>
                    </div>    
                    <div class="col-lg-8">    
                        <div class="form-group">
                        <label for="" class="col-form-label">Correo: </label>
                        <input type="email" class="form-control" id="correo">
                        </div>            
                    </div>    
                </div>        
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label for="" class="col-form-label">Telefono: </label>
                        <input type="text" class="form-control" id="telefono" required>
                        </div>
                    </div>
                </div>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-success">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  


<?php include_once "includes/footer.php"; ?>