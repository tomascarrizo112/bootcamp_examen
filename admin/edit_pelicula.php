<?php 

	require_once '../assets/lib/config.php';

	if (isset($_GET['id_pelicula'])) {

		//Recibimos la data de la pelicula
		
			$id_pelicula = $_GET['id_pelicula'];

        //Buscamos los datos en la base de datos

            $slc_dt_pelicula = $mbd->prepare("SELECT * FROM peliculas WHERE id = :id_pelicula");

            $slc_dt_pelicula->bindParam(':id_pelicula', $id_pelicula);
                                
            $slc_dt_pelicula->execute();

        //Recopilamos los datos en variables

        	while ($slc_dt_pelicula_lb = $slc_dt_pelicula->fetch()){

        		$fecha_estreno = $slc_dt_pelicula_lb['fecha_estreno'];

        		$titulo = $slc_dt_pelicula_lb['titulo'];

                $duracion = $slc_dt_pelicula_lb['duracion'];

                $sinopsis = $slc_dt_pelicula_lb['sinopsis'];

                $imagen = $slc_dt_pelicula_lb['imagen'];

                $actorprincipalid = $slc_dt_pelicula_lb['actorprincipalid'];

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
                                            <h3 class="text-center title-2">Editar Pelicula</h3>
                                        </div>
                                        <hr>



                                        <form action="<?php echo htmlentities('assets/lib/edit_pelicula.php'); ?>" method="post">


                                            <div class="form-group">

                                                <label class="control-label mb-1">Titulo</label>

                                                <input name="titulo" minlength="1" maxlength="200" type="text" class="form-control" placeholder="Escribe el titulo de la pelicula" value="<?php echo $titulo; ?>" required="">

                                            </div>

                                            <div class="form-group">

                                                <label class="control-label mb-1">Fecha de estreno</label>

                                                <input name="fecha_estreno" minlength="1" maxlength="200" type="text" class="form-control" placeholder="Escribe la fecha de estreno de la pelicula" value="<?php echo $fecha_estreno; ?>" required="">

                                            </div>

                                            <div class="form-group">

                                                <label class="control-label mb-1">Sinopsis</label>

                                                <textarea name="sinopsis" minlength="1" class="form-control" required=""><?php echo $sinopsis; ?></textarea>

                                            </div>

                                            <div class="form-group">

                                                <label class="control-label mb-1">Duracion</label>

                                                <input name="duracion" minlength="1" maxlength="200" type="text" class="form-control" placeholder="Escribe la duracion de la peliucla" value="<?php echo $duracion; ?>" required="">

                                            </div>

                                            <input type="hidden" name="actorprincipalid" value="<?php echo $actorprincipalid; ?>">

                                            <input type="hidden" name="id_pelicula" value="<?php echo $id_pelicula; ?>">

                                            <input type="hidden" name="imagen" value="<?php echo $imagen; ?>">

                                            <div>
                                                <input type="submit" class="btn btn-lg btn-info btn-block" name="verificador_pelicula" value="Editar pelicula">
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
