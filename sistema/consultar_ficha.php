<?php include_once "includes/header.php"; ?>

    <div id="layoutSidenav_content">
        <main class="container">
            <br>
        <div class="col-lg">
            <button id="btnNuevaFicha" type="button" class="btn btn-success" data-toggle="modal" >Nuevo</button>
        </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="tablaFichas" width="100%" cellspacing="0">
                    <br>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>tipo programa</th>
                            <th>Nombre programa</th>
                            <th>Lider de ficha</th>
                            <th>Administrar</th>
                            <th>Editar</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Id</th>
                            <th>tipo programa</th>
                            <th>Nombre programa</th>
                            <th>Lider de ficha</th>
                            <th>Administrar</th>
                            <th>Editar</th>

                        </tr>
                    </tfoot>
                    <tbody>
      
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
                                    <input class="form-control" name="id_ficha" id="id_ficha" type="number" maxlength="8" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Ingrese número de ficha" required /><i>(Máximo 8 dígitos)</i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="tipo_programa" >Tipo de programa</label>
                                    <select class="form-control" name="tipo_programa" id="tipo_programa" required>
                                        <option selected disabled value="">Selecciona una opción</option>
                                        <option value="Especialización">Especialización Tecnológica</option>
                                        <option value="Tecnólogo">Tecnólogo	</option>
                                        <option value="Técnico">Técnico</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="small mb-1" for="nombre_programa" >Nombre programa</label>
                                    <select class="form-control" name="nombre_programa" id="nombre_programa" required>
                                        <option selected disabled value="">Selecciona una opción</option>
                                        
                                            <?php 
                                            $programa = "SELECT * from programa";
                                            $resultado = $conexion->prepare($programa);
                                            $resultado->execute();
                                            $progra=$resultado->fetchAll(PDO::FETCH_ASSOC);
    
                                            foreach ($progra as $dat){
                                                ?>
                                                <option value="<?php echo$dat["id_programa"]?>"><?php echo $dat["pro_nombre"]?></option>
                                            <?php }
                                            ?>
    
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="small mb-1" for="lider_ficha" >Lider de ficha</label>
                                    <select class="form-control" name="lider_ficha" id="lider_ficha" required>
                                        <option selected disabled value="">Selecciona una opción</option>
                                     
                                            <?php 
                                            $instructor = "SELECT id_usuario, concat(usuarios.nombre,' ',usuarios.apellido) as nombrecompleto FROM usuarios where rol = 'instructor'";
                                            $resultado = $conexion->prepare($instructor);
                                            $resultado->execute();
                                            $instructor=$resultado->fetchAll(PDO::FETCH_ASSOC);
    
                                            foreach ($instructor as $dat){
                                                ?>
                                                <option value="<?php echo$dat["id_usuario"]?>"><?php echo $dat["nombrecompleto"]?></option>
    
                                            <?php }
                                            ?>
    
                                </select>
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
    <div class="modal fade" id="modalCrudFichaEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <label class="small mb-1" for="lider_ficha" >Lider de ficha</label>
                                    <select class="form-control" name="lider_ficha" id="lider_ficha" required>
                                        <option selected disabled value="">Selecciona una opción</option>
                                     
                                            <?php 
                                            $instructor = "SELECT id_usuario, concat(usuarios.nombre,' ',usuarios.apellido) as nombrecompleto FROM usuarios where rol = 'instructor'";
                                            $resultado = $conexion->prepare($instructor);
                                            $resultado->execute();
                                            $instructor=$resultado->fetchAll(PDO::FETCH_ASSOC);
    
                                            foreach ($instructor as $dat){
                                                ?>
                                                <option value="<?php echo$dat["id_usuario"]?>"><?php echo $dat["nombrecompleto"]?></option>
    
                                            <?php }
                                            ?>
    
                                </select>
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
</div>  


<?php include_once "includes/footer.php"; ?>