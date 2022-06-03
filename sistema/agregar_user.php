<?php include_once "includes/header.php"; 

$usuarios = "SELECT * FROM usuarios";

$resultado = $conexion->prepare($usuarios);
$resultado->execute();

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$pw = (isset($_POST['pw'])) ? $_POST['pw'] : '';
$rol = (isset($_POST['rol'])) ? $_POST['rol'] : '';
$correo = (isset($_POST['correo'])) ? $_POST['correo'] : '';
$telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$per1 = (isset($_POST['per1'])) ? $_POST['per1'] : '';
$per2 = (isset($_POST['per2'])) ? $_POST['per2'] : '';
$per3= (isset($_POST['per3'])) ? $_POST['per3'] : '';
$per4 = (isset($_POST['per4'])) ? $_POST['per4'] : '';
$per5 = (isset($_POST['per5'])) ? $_POST['per5'] : '';
$per6 = (isset($_POST['per6'])) ? $_POST['per6'] : '';
$per7 = (isset($_POST['per7'])) ? $_POST['per7'] : '';
$per8 = (isset($_POST['per8'])) ? $_POST['per8'] : '';
$per9 = (isset($_POST['per9'])) ? $_POST['per9'] : '';
$per10 = (isset($_POST['per10'])) ? $_POST['per10'] : '';
$per11 = (isset($_POST['per11'])) ? $_POST['per11'] : '';
$per12 = (isset($_POST['per12'])) ? $_POST['per12'] : '';
$per13 = (isset($_POST['per13'])) ? $_POST['per13'] : '';



?>
<div id="layoutSidenav_content">
            <div class="container-fluid">
            <h1 class="mt-4">Ingrese los datos del usuario </h1>
                <div class="card-body">
                    <form id="agregarUsuario" role="form" method="post" action="">
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="InsertarNombre" required >Nombres</label>
                                <input class="form-control py-4" name="nombre" type="text" placeholder="Ingrese nombres" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="InsertarApellido">Apellidos</label>
                                <input class="form-control py-4" name="apellido" type="text" placeholder="Ingrese apellidos"required />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="InsertarUsuario">Usuario</label>
                        <input class="form-control py-4" name="usuario" type="text" aria-describedby="emailHelp" placeholder="Ingresar nombre de usuario" required/>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="InsertarContraseña">Contraseña</label>
                                <input class="form-control py-4" name="contraseña" type="password" placeholder="Ingresar contraseña" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="small mb-1" for="InsertarContraseña">Confirmar contraseña</label>
                                <input class="form-control py-4" name="contraseña" type="password" placeholder="Confirmar contraseña"required />
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="small mb-1" for="Rol">Rol </label>
                                <select name="rol" class="form-control" name="Rol" required>
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
                            <input class="form-control py-4" name="correo" type="email" placeholder="Ingresar su correo electronico" required/>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="small mb-1" for="InsertarUsuario">telefono</label>
                            <input class="form-control py-4" name="telefono" type="int" placeholder="Ingresar su correo electronico"required />
                            </div>
                        </div>

                        <!-- <div class="form-group">
                            <p id=permisos >Permisos</p>
                            <div class="container">
                                <div class="row row-cols-3">
                                <input type="checkbox" name="permiso1"> Agregar usuario <br>
                                <input type="checkbox" name="permiso2"> Agregar programa <br>
                                <input type="checkbox" name="permiso3"> Agregar ficha <br>
                                <input type="checkbox" name="permiso4"> Agregar programa <br>
                                <input type="checkbox" name="permiso5"> Modificar usuario <br>
                                <input type="checkbox" name="permiso6"> Modificar ficha <br>
                                <input type="checkbox" name="permiso7"> Administrar ficha <br>
                                <input type="checkbox" name="permiso8"> Eliminar usuario <br>
                                <input type="checkbox" name="permiso9"> Eliminar ficha <br>
                                <input type="checkbox" name="permiso10"> Eliminar programa <br>
                                <input type="checkbox" name="permiso11"> Consultar usuario <br> 
                                <input type="checkbox" name="permiso12"> Consultar ficha<br> 
                                <input type="checkbox" name="permiso13"> Consultar rap <br> 
                                <input type="checkbox" name="permiso15"> Agregar contenido rap<br>
                                </div>
                            </div>
                            
                        </div> -->
                        <div class="form-group">
                            <p id=permisos >Permisos</p>
                            <div  class="container">
                                <div class="row row-cols-3">
                                    <div class="col"><label><input type="checkbox" name='per1' value="1"> Agregar usuario</label></div>
                                    <div class="col"><label><input type="checkbox" name='per2' value="1"> Agregar programa</label></div>
                                    <div class="col"><label><input type="checkbox" name='per3' value="1"> Agregar ficha</label></div>
                                    <div class="col"><label><input type="checkbox" name='per4' value="1"> Subir Excel</label></div>
                                    <div class="col"><label><input type="checkbox" name='per5' value="1"> Modificar usuario</label></div>
                                    <div class="col"><label><input type="checkbox" name='per6' value="1"> Modificar ficha</label></div>
                                    <div class="col"><label><input type="checkbox" name='per7' value="1">Administrar ficha</label> </div>
                                    <div class="col"><label><input type="checkbox" name='per8' value="1"> Eliminar usuario</label></div>
                                    <div class="col"><label><input type="checkbox" name='per9' value="1"> Eliminar ficha</label></div>
                                    <div class="col"><label><input type="checkbox" name='per10' value="1"> Eliminar programa</label></div>
                                    <div class="col"><label><input type="checkbox" name='per11' value="1"> Consultar usuario</label></div>
                                    <div class="col"><label><input type="checkbox" name='per12' value="1"> Consultar ficha</label></div>
                                    <div class="col"><label><input type="checkbox" name='per13' value="1"> Consultar rap</label></div>

                                </div>
                            </div>
                            
                        </div>
                                       
                        <input type="submit" class="btn btn-primary btn-block" name="Guardar" value="Guardar">
                      
                    </form>
                </div>
            </div>
        </div>

    </div>



<?php include_once "includes/footer.php"; ?>
