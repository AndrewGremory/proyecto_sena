<?php include_once "includes/header.php"; ?>

<div id="layoutSidenav_content">
    <div class="container-fluid">
    <h1 class="mt-4">Ingrese los datos de la ficha </h1>
        <div class="card-body">
            <form id="formulario" role="form" method="post" action="conexion.php">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="numeroFicha">Número ficha</label>
                            <input class="form-control" name="ficha" max="6" id="id" type="text" placeholder="Ingrese número de ficha" required />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="TipoPrograma" >Tipo de programa</label>
                            <select class="form-control" name="tipo_programa" id="TipoPrograma" required>
                                <option selected disabled value="">Selecciona una opción</option>
                                <option value="1">Especialización Tecnológica</option>
                                <option value="2">Tecnólogo	</option>
                                <option value="3">Técnico</option>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="small mb-1" for="NombrePrograma" >Nombre programa</label>
                    <?php 
                        // include('funciones.php');
                        // $miconexion=conectar_bd('root','login');
                        $consulta = "SELECT * FROM programa";
                        $resultado = mysqli_query($conexion, $consulta)or die(mysqli_error($conexion));
                        
                        ?>


                        <select class="form-control" name="nombre_programa" id="NombrePrograma" required>
                            <option selected disabled value="">Selecciona una opción</option>
                            <?php while ($opcion = $resultado -> fetch_object()) { ?>

                        <option value="<?php echo $opcion-> id_programa;?>"><?php echo $opcion-> pro_nombre;?></option>
                            <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#AgregarPrograma">Agregar Programa</button>
                    
                </div>

                        <div class="form-group">
                            
                            <label class="small mb-1" for="lider">Lider de ficha</label>
                            <?php 
                            // include('funciones.php');
                            // $miconexion=conectar_bd('root','login');
                            $consulta = "SELECT * FROM usuarios where rol = 'instructor'";
                            $resultado = mysqli_query($conexion, $consulta)or die(mysqli_error($conexion));
                            
                            ?>
                            <select class="form-control" name="lider_ficha" id="LiderFicha" required>
                                <option selected disabled value="">Seleccione un instructor</option>
                                <?php while ($opcion = $resultado -> fetch_object()) { ?>

                                <option value=" <?php echo $opcion -> id_usuario;?>"><?php echo $opcion-> nombre." ".$opcion -> apellido;?></option>
                                <?php } ?>

                            </select>

                <!-- <div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" href="inicio.php">Agregar ficha</a> -->
                <input type="submit" class="btn btn-primary btn-block orm-group mt-4 mb-0" value="Agregar Ficha">
            </div>
            </form>


</div>

<?php include_once "includes/footer.php"; ?>