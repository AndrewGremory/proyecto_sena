<?php include_once "includes/header.php"; 

$fichaconsulta= $_POST['ficha'];
$nombre_programa = $_POST ['pro_nombre'];

$consulta = "SELECT rap.id as rap_id, ficha_id, rcp.id, tipo_resultado, fecha_inicio, fecha_fin, resultado, comp_nombre as competencia, estado, pro_nombre, observacion FROM `fichas` f
JOIN programa p ON f.nombre_programa = p.id_programa
JOIN resultado_competencia_programa rcp ON p.id_programa = rcp.programa_id
JOIN competencia c ON rcp.comp_id = c.comp_id
JOIN resultados r ON rcp.resultado_id = r.id
JOIN rap ON rcp.id = rap.rcp_id and f.id_ficha = rap.ficha_id
WHERE p.pro_nombre = '$nombre_programa' and f.id_ficha = '$fichaconsulta'";


$queryData   = mysqli_query($conexion, $consulta);

?>

<div id="layoutSidenav_content">          
    <div class="container-fluid">
        <br>
        <div class="col"><a href="consultar_ficha.php" class="btn btn-outline-dark" role="button">Volver</a>
        <br>
        <h3 class="mt-4 ">
            Seguimiento de ficha:
            
            <?php echo $fichaconsulta, "<br>", $nombre_programa;?>
            
        </h3>
        <hr> <br>
        
        
        <div class="row">


            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <!-- <th>Fase</th>
                            <th>Actividad de proyecto</th> -->
                            <th>Competencia</th>
                            <th>Resultado de <br> aprendizaje</th>
                            <th>Tipo de <br> resultado</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>Estado de resultado</th>
                            <th>Observaciones</th>
                            <th>Opciones</th>
                            <th style="visibility:collapse; display: none; ">id</th>
                    
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <!-- <th>Fase</th>
                            <th>Actividad de proyecto</th> -->
                            <th>Competencia</th>
                            <th>Resultado de <br> aprendizaje</th>
                            <th>Tipo de <br> resultado</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>Estado de resultado</th>
                            <th>Observaciones</th>
                            <th>Opciones</th>
                            <th style="visibility:collapse; display: none; ">id</th>




                        </tr>
                    </tfoot>
                    <tbody>
                        
                        <tr>
                            <?php 
                            $i = 1;
                            while ($data = mysqli_fetch_array($queryData)) { ?>
                            <th><?php  echo $i++;?></th>
                            <!-- <td><?php echo $data['fase_nombre']; ?></td>
                            <td><?php echo $data['act_nombre']; ?></td> -->
                            <td><?php echo $data['competencia']; ?></td>
                            <td><?php echo $data['resultado']; ?></td>
                            <td><?php echo $data['tipo_resultado']; ?></td>
                            <td><?php echo $data['fecha_inicio']; ?></td>
                            <td><?php echo $data['fecha_fin']; ?></td>
                            <td><?php echo $data['estado']; ?></td>
                            <td><?php echo $data['observacion']; ?></td>
                            <td> <button type="button" class="btn btn-success editbtn" data-toggle="modal" data-target="#editar"><i class="fas fa-edit"></i></button> <hr>
                                <button type="button" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#eliminar"><i class="fas fa-trash"></i></button> 
                                <!-- eliminar -->
                                <!-- <form action="eliminar.php" method="post">
                                    <button type="submit" class="btn btn-secondary deletebtn" data-toggle="modal" name="numero" data-target="#eliminar"><i class="fas fa-trash"></i></button> 
                                </form> -->
                            
                                </td>
                            <form action="eliminar.php" method="POST"></form>
                            <!-- <td> <button type="button" class="btn btn-danger deletebtn" data-toggle="modal" data-target="#eliminar"><i class="fas fa-trash"></i></button> </td> -->
                            <td style="visibility:collapse; display: none; " ><?php echo $data['rap_id']; ?></td>
                            </tr>   

                            <?php } ?>
                        </tbody>
                    </table>
                </div>


                <!-- MODAL EDITAR  -->

                <div id="editar" class="modal fade bd-example-modal-lg"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Resultado de la ficha <?php echo $fichaconsulta; ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- formulario -->
                                <!-- FORMULARIO -->
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="actualizar" method="post">
                                    <div class="form-group">
                                        <input type="text" name="ficha" value="<?php echo $fichaconsulta; ?>">
                                    </div>
                                    <div class="form-group" >
                                        <input type="text" name="rap_id" id="update_id">
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="fase">Fase</label>
                                        <input type="text" class="form-control" name="fase" id="fase"  required>
                                    </div> -->
                                    <div class="col-md-6">

                                        <div class="form-group">
                                            <label for="competencia">Competencia</label>
                                            <textarea class="form-control" name="competencia" id="competencia" readonly  required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="form-row">
                                            <label for="resultado">Resultado de Aprendizaje</label>
                                            <textarea class="form-control" name="resultado" id="resultado" rows="2" readonly required></textarea>
                                        </div>
                                    </div>
                                    <!-- <div class="form-group">
                                        <label for="actividad">Actvidad de proyecto</label>
                                        <textarea class="form-control" id="actividad" name="actividad"  required></textarea>
                                    </div> -->
                                    <div class="form-group">
                                        <label for="tipo_resultado">Tipo de resultado</label>
                                        <select class="form-control" readonly name="tipo_resultado"  id="tipo_resultado">
                                            <option selected, disabled>Seleccione tipo de resultado</option>
                                            <option disabled value="Específico">Específico</option>
                                            <option disabled value="Institucional">Institucional</option>
                                            <option disabled value="Clave">Clave</option>
                                            <option disabled value="Transversal">Transversal</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha_inicio">Fecha de inicio </label>
                                        <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" placeholder="Fecha de inicio">
                                    </div>
                                    <div class="form-group">
                                        <label for="fecha_fin">Fecha de fin </label>
                                        <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" placeholder="Fecha de fin">
                                    </div>
                                    <div class="form-group">
                                        <label for="estado_resultado">Estado de resultado</label>
                                        <select name="estado" id="estado_resultado" class="form-control">
                                            <option selected, disabled>Seleccione tipo de resultado</option>
                                            <option>Evaluado</option>
                                            <option>Pendiente</option>
                                            <option>En ejecución</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="observacion">Observaciones</label>
                                        <textarea name="observacion" id="observacion" class="form-control" placeholder="¿Alguna observacion?" rows="5"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <input type="submit" class="btn btn-primary" name="editar" id="btn_editar" value="Editar"></input>
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            </div>
        </div>  
    </div>  
</div>



<?php include_once "includes/footer.php"; ?>