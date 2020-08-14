    <?php 

        //Archivo de seguridad

            require_once 'security.php';

    ?>

    <?php 

        //Definimos los valores por defecto

            $mensaje_aviso_error = '';

            $mensaje_aviso_exito = '';

        if (isset($_POST['verificador_pelicula'])) {
            
                if (isset($_FILES['imagen'])) {

                    //-------------------------------------//

                        $nombre_pelicula = $_POST['nombre_pelicula'];

                        $sinopsis = $_POST['sinopsis'];

                        $actor_pelicula = $_POST['actor_pelicula'];

                        $duracion = $_POST['duracion'];

                        $fecha_estreno = $_POST['fecha_estreno'];

                    //-------------------------------------//

                        $imagen_nombre = $_FILES["imagen"]["name"];

                        $imagen_tmp  = $_FILES["imagen"]["tmp_name"];

                    //-------------------------------------//

                        $slc_id_actores = $mbd->prepare("SELECT id_actor FROM actores WHERE nombre = :actor_pelicula");

                        $slc_id_actores->bindParam(':actor_pelicula', $actor_pelicula);
                                            
                        $slc_id_actores->execute();

                            while ($slc_id_actores_lb = $slc_id_actores->fetch()){

                                $actor_pelicula_id = $slc_id_actores_lb['id_actor'];

                            }

                    //-------------------------------------//

                        $fecha_actual  = date("dHi");
                                       
                        $numero_aleatorio  = rand(10, 99); 

                        $numero_aleatorio2  = rand(99, 999); 


                        $ruta = "../assets/img/peliculas/" . $fecha_actual . $numero_aleatorio . $numero_aleatorio2 . $imagen_nombre;


                        if (!file_exists($ruta)){

                            $resultado = @move_uploaded_file($imagen_tmp, $ruta);

                            $imagen = $fecha_actual . $numero_aleatorio . $numero_aleatorio2 . $imagen_nombre;

                            $imagen = $mysqli->real_escape_string($imagen);

                            $imagen = htmlspecialchars($imagen);

                            //Empezamos la insercion de datos

                            $ins_dt_pelicula = $mbd->prepare("INSERT INTO peliculas ( 

                                fecha_estreno,

                                titulo,

                                duracion,

                                sinopsis,

                                imagen,

                                actorprincipalid

                            ) VALUES (

                                :fecha_estreno,

                                :titulo,

                                :duracion,

                                :sinopsis,

                                :imagen,

                                :actorprincipalid

                            )");


                            $ins_dt_pelicula->bindParam(':fecha_estreno', $fecha_estreno);

                            $ins_dt_pelicula->bindParam(':titulo', $nombre_pelicula);

                            $ins_dt_pelicula->bindParam(':duracion', $duracion);

                            $ins_dt_pelicula->bindParam(':sinopsis', $sinopsis);

                            $ins_dt_pelicula->bindParam(':imagen', $imagen);

                            $ins_dt_pelicula->bindParam(':actorprincipalid', $actor_pelicula_id);

                            $ins_dt_pelicula->execute();

                    //Ahora validamos si la consulta se realizo con exito

                            if ($ins_dt_pelicula) {
                                                                
                                $mensaje_aviso_exito = 'Pelicula agregada correctamente';

                            }else{

                                $mensaje_aviso_error = 'Ocurrio un error al intentar agregar la pelicula. Comunicate con el desarrollador';

                            } //Validador registro


                        } //Validador existencia

                } //Validador logo

        }

    

    ?>

    <?php 

        require_once 'assets/inc/nav.php';

    ?>

    
    <?php 

        $slc_peliculas_dt = $mbd->prepare("SELECT * FROM peliculas");
                            
        $slc_peliculas_dt->execute();
                            

    ?>

    <?php 

        $slc_actores_dt = $mbd->prepare("SELECT * FROM actores");
                            
        $slc_actores_dt->execute();
                            

    ?>

        <!-- DATA TABLE-->
            <section class="p-t-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="title-1 m-b-35" style="color: green;"><?php echo $mensaje_aviso_exito; ?></h2>
                            <h2 class="title-1 m-b-35" style="color: red;"><?php echo $mensaje_aviso_error; ?></h2>
                            <h3 class="title-5 m-b-35">peliculas agregados</h3>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>titulo</th>
                                            <th>duracion</th>
                                            <th>fecha de estreno</th>
                                            <th>sinopsis</th>
                                            <th>Actor principal</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php while ($slc_peliculas_dt_lb = $slc_peliculas_dt->fetch()){ ?>

                                        <tr class="tr-shadow">
                                            
                                            <td><?php echo $slc_peliculas_dt_lb['titulo']; ?></td>
                                            <td><?php echo $slc_peliculas_dt_lb['duracion']; ?></td>
                                            <td><?php echo $slc_peliculas_dt_lb['fecha_estreno']; ?></td>
                                            <td><?php echo $slc_peliculas_dt_lb['sinopsis']; ?></td>

                                            <?php 

                                                $id_actor = $slc_peliculas_dt_lb['actorprincipalid'];

                                                $slc_actor_pelicula = $mbd->prepare("SELECT nombre FROM actores WHERE id_actor = :id_actor");

                                                $slc_actor_pelicula->bindParam(':id_actor', $id_actor);
                                                                    
                                                $slc_actor_pelicula->execute();

                                                while ($slc_actor_pelicula_lb = $slc_actor_pelicula->fetch()){

                                                    $nombre_actor = $slc_actor_pelicula_lb['nombre'];

                                                }
                                                                    
                                            ?>
                                            <td><?php echo $nombre_actor; ?></td>

                                            <td><a href="edit_pelicula.php?id_pelicula=<?php echo $slc_peliculas_dt_lb['id']; ?>" class="btn btn-primary">Editar</a></td>

                                            <td><a href="assets/lib/delete_pelicula.php?id_pelicula=<?php echo $slc_peliculas_dt_lb['id']; ?>" class="btn btn-danger">Eliminar</a></td>
                                        </tr>
                                        <tr class="spacer"></tr>

                                    <?php } ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->

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
                                            <h3 class="text-center title-2">Agregar Pelicula</h3>
                                        </div>
                                        <hr>



                                        <form action="<?php echo htmlentities('peliculas'); ?>" method="post" enctype="multipart/form-data">


                                            <div class="form-group">

                                                <label class="control-label mb-1">Nombre de la pelicula</label>

                                                <input name="nombre_pelicula" minlength="1" maxlength="200" type="text" class="form-control" placeholder="Escribe el nombre de la pelicula" required="">

                                            </div>

                                            <div class="form-group">

                                                <label class="control-label mb-1">Sinopsis</label>

                                                <textarea name="sinopsis" minlength="1" maxlength="350" class="form-control" placeholder="Escribe la sinopsis de la pelicula" required=""></textarea>

                                            </div>

                                            <div class="form-group">

                                                <label class="control-label mb-1">Actor principal</label>

                                                <select class="form-control" name="actor_pelicula" required="">

                                                    <option value="">Elegir actor</option>

                                                    <?php while ($slc_actores_dt_lb = $slc_actores_dt->fetch()){ ?>

                                                        <option value="<?php echo $slc_actores_dt_lb['nombre']; ?>"><?php echo $slc_actores_dt_lb['nombre']; ?></option>

                                                    <?php } ?>
                                                </select>

                                            </div>

                                            <div class="form-group">

                                                <label class="control-label mb-1">Duracion</label>

                                                <input name="duracion" minlength="1" maxlength="200" type="text" class="form-control" placeholder="Escribe la duracion de la pelicula" required="">

                                            </div>

                                            <div class="form-group">

                                                <label class="control-label mb-1">Fecha de estreno</label>

                                                <input name="fecha_estreno" minlength="1" maxlength="200" type="text" class="form-control" placeholder="Escribe la fecha de estreno de la pelicula" required="">

                                            </div>

                                            <div class="form-group">
                                                <label class="control-label mb-1">Imagen</label>

                                                <input name="imagen" type="file" class="form-control" required="">

                                            </div>

                                            <div>
                                                <input type="reset" class="btn btn-lg btn-info btn-block" value="Limpiar datos">
                                            </div> <br>

                                            <div>
                                                <input type="submit" class="btn btn-lg btn-info btn-block" name="verificador_pelicula" value="Agregar pelicula">
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
