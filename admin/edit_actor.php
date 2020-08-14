<?php 

	require_once '../assets/lib/config.php';

	if (isset($_GET['id_actor'])) {

		//Recibimos la data del actor
		
			$id_actor = $_GET['id_actor'];

        //Buscamos los datos en la base de datos

            $slc_actores_dt = $mbd->prepare("SELECT * FROM actores WHERE id_actor = :id_actor");

            $slc_actores_dt->bindParam(':id_actor', $id_actor);
                                
            $slc_actores_dt->execute();

        //Recopilamos los datos en variables

        	while ($slc_actores_dt_lb = $slc_actores_dt->fetch()){

        		$nombre_actor = $slc_actores_dt_lb['nombre'];

        		$fecha_nacimiento = $slc_actores_dt_lb['fecha_nacimiento'];

                $id_actor = $slc_actores_dt_lb['id_actor'];

        	}

	}

?>
    <?php 

        //Archivo de seguridad

            require_once 'security.php';

    ?>

    <?php 

        require_once 'assets/inc/nav.php';

    ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                        <div class="col-lg-2"></div>
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="card-title">
                                            <h3 class="text-center title-2">Editar Actor</h3>
                                        </div>
                                        <hr>



                                        <form action="<?php echo htmlentities('assets/lib/edit_actor.php'); ?>" method="post">


                                            <div class="form-group">

                                                <label class="control-label mb-1">Nombre del Actor</label>

                                                <input name="nombre_actor" minlength="1" maxlength="200" type="text" class="form-control" placeholder="Escribe el nombre del actor" value="<?php echo $nombre_actor; ?>" required="">

                                            </div>

                                            <div class="form-group">

                                                <label class="control-label mb-1">Fecha de nacimiento</label>

                                                <input name="fecha_nacimiento" minlength="1" maxlength="200" type="text" class="form-control" placeholder="Escribe la fecha de nacimiento del actor" value="<?php echo $fecha_nacimiento; ?>" required="">

                                            </div>

                                            <input type="hidden" name="actor_name" value="<?php echo $nombre_actor; ?>">

                                            <input type="hidden" name="id_actor" value="<?php echo $id_actor; ?>">

                                            <div>
                                                <input type="submit" class="btn btn-lg btn-info btn-block" name="verificador_actor" value="Editar actor">
                                            </div>

                                        </form>



                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="assets/vendor/slick/slick.min.js">
    </script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/vendor/animsition/animsition.min.js"></script>
    <script src="assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="assets/js/main.js"></script>

</body>

</html>
<!-- end document-->
