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
                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
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

          <!-- modal editar -->
          <div id="modalCrud" class="modal fade"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- formulario -->
                                <form  id="formulario">
                                <input type="hidden" name="id" id="update_id">
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="InsertarNombre">Nombres</label>
                                                <input class="form-control py-4" name="nombre" id="nombre" type="text" placeholder="Ingrese nombres" required/>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="InsertarApellido">Apellidos</label>
                                                <input class="form-control py-4" name="apellido" id="apellido" type="text" placeholder="Ingrese apellidos" required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="small mb-1" for="InsertarUsuario">Usuario</label>
                                        <input class="form-control py-4" name="usuario" id="usuario" type="text" aria-describedby="emailHelp" placeholder="Ingresar nombre de usuario" required />
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="InsertarContraseña">Contraseña</label>
                                                <input class="form-control py-4" name="contraseña" id="contraseña" type="password" placeholder="Ingresar contraseña" required />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="small mb-1" for="rol">Rol </label>
                                                <select name="rol" class="form-control" name="rol" id="rol" required>
                                                    <option selected disabled value="">Seleccione un tipo de usuario</option>
                                                    <option value="1">administrador</option>
                                                    <option value="2">instructor</option>
                                                    <option value="3">coordinador</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="InsertarUsuario">Correo electronico</label>
                                                <input class="form-control py-4" name="correo" id="correo" type="email" placeholder="Ingresar su correo electronico"required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="small mb-1" for="InsertarUsuario">telefono</label>
                                                <input class="form-control py-4" name="telefono" id="telefono" type="int" placeholder="Ingresar su correo electronico"required />
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" id="btnGuardar" class="btn btn-success">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            <!-- modal eliminar -->
            

        </div>


</div>


<?php include_once "includes/footer.php"; ?>