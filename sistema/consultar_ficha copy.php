<?php include_once "includes/header.php"; ?>

    <div id="layoutSidenav_content">
        <main class="container">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <br>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>tipo programa</th>
                            <th>Nombre programa</th>
                            <th>Lider de ficha</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th>Administrar</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>tipo programa</th>
                            <th>Nombre programa</th>
                            <th>Lider de ficha</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th>Administrar</th>

                        </tr>
                    </tfoot>
                    <tbody>
                    <?php                            
                            foreach($ficha as $dat) {                                                        
                            
                            ?>
                            <tr>

                            <td><form action="seguimiento.php" method="post">
                                <input type="submit" collapse hidden id="ficha" class="btn btn-light" name="ficha" value="<?php echo $dat['id_ficha']; ?>"/><?php echo $dat['id_ficha']; ?></td>
                                <td><?php echo $dat['tipo_programa']; ?></td>
                                <td><?php echo $dat['pro_nombre']; ?></td>
                                <td><?php echo $dat['lider']; ?></td>
                                <td><button type="button" class="btn btn-success editbtn" data-toggle="modal" data-target="#editar"><i class="fas fa-edit"></i></button>
                                <td><button type="button" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#eliminar"><i class="fas fa-trash"></i></button></td>
                                
                                <input type="hidden" name="pro_nombre" value="<?php echo $dat['pro_nombre']?>">
                                <!-- <td><form action="seguimiento.php"><button type="submit" id="ficha" class="btn btn-primary" name="ficha" value="<?php echo $dat['id_ficha']; ?> ">Administrar ficha</button></form></td> -->
                                <td><button type="submit" id="ficha" class="btn btn-primary" name="ficha" value="<?php echo $dat['id_ficha']; ?> ">Administrar ficha</button></form></td>
                                <!-- <td><label for="ficha" class="btn btn-primary">Administrar ficha</label></td> -->
                                <!-- <td><a href="seguimiento.php"><button type="button" class="btn btn-success">Administrar ficha</button></a></td> -->


                                <div class='text-center'><div class='btn-group'><button class='btn btn-success btnEditar'><i class='fas fa-edit'></i></button></div></div>

                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!--Modal para CRUD-->
    <div class="modal fade" id="modalCrudFicha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <form id="formFichas">    
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label class="small mb-1" for="numeroFicha">Número ficha</label>
                                    <input class="form-control" name="id_ficha"  id="id_ficha" type="text"  readonly="readonly" placeholder="Ingrese número de ficha"  />
                                </div>
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label class="small mb-1" for="numeroFicha">Número ficha</label>
                                    <?php
                                          $consulta = "SELECT id_usuario, concat(nombre,' ',apellido) as lider from usuarios where rol = 'instructor'";
                                          $resultado = $conexion->prepare($consulta);
                                          $resultado->execute();        
                                          $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
                                    ?>
                                    <select class="form-control" name="lider" id="lider" required>
                                        <?php
                                            foreach($data as $dat)
                                        ?>
                                        <option value=""><?php echo $dat["lider"];?></option>

                                    </select>
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
</div>  

<?php include_once "includes/footer.php"; ?>