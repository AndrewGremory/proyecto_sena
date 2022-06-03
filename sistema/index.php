<?php include_once "includes/header.php"; 
?>

	<!-- Content Row -->
	<div id="layoutSidenav_content">
        <main class="container "> 
            <br>
        <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>tipo programa</th>
                                <th>Nombre programa</th>
                                <th>Lider de ficha</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>tipo programa</th>
                                <th>Nombre programa</th>
                                <th>Lider de ficha</th>

                            </tr>
                        </tfoot>
                        <tbody>
                        <?php                            
                            foreach($ficha as $dat) {                                                        
                            ?>
                            <tr>
                                
                                <td><?php echo $dat["id_ficha"];?></td>
                                <td><?php echo $dat["tipo_programa"];?></td>
                                <td><?php echo $dat["pro_nombre"];?></td>
                                <td><?php echo $dat["lider"];?></td>

                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
                                
            </main>
                
            </div>
        </div>


</div>

<?php include_once "includes/footer.php"; ?>