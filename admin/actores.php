    <?php 

        //Archivo de seguridad

            require_once 'security.php';

    ?>

    <?php 

        //Definimos los valores por defecto

            $mensaje_aviso_error = '';

            $mensaje_aviso_exito = '';

        if (isset($_POST['verificador_actor'])) {
            
            if (isset($_POST['nombre_actor']) && isset($_POST['fecha_nacimiento'])) {

                //-------------------------------------//

                    $nombre_actor = $_POST['nombre_actor'];

                    $fecha_nacimiento = $_POST['fecha_nacimiento'];

                //-------------------------------------//

                    //Generamos el id del actor aleatoriamente

                    $date_1 = 1;

                    $date_2 = rand(1, 99);

                    $date_3 = rand(100, 999);

                    $date_4 = rand(100, 9999);

                    $id_actor = $date_1 . $date_2 + $date_3 + $date_4;

                //-------------------------------------//

                    //Empezamos la insercion de datos

                        $ins_dt_actor = $mbd->prepare("INSERT INTO actores ( 

                            nombre,

                            fecha_nacimiento,

                            id_actor

                        ) VALUES (

                            :nombre,

                            :fecha_nacimiento,

                            :id_actor

                        )");


                        $ins_dt_actor->bindParam(':nombre', $nombre_actor);

                        $ins_dt_actor->bindParam(':fecha_nacimiento', $fecha_nacimiento);

                        $ins_dt_actor->bindParam(':id_actor', $id_actor);

                        $ins_dt_actor->execute();

                    //Ahora validamos si la consulta se realizo con exito

                        if ($ins_dt_actor) {
                                                                
                            $mensaje_aviso_exito = 'Actor agregado correctamente';

                        }else{

                            $mensaje_aviso_error = 'Ocurrio un error al intentar agregar el actor. Comunicate con el desarrollador';

                        } //Validador registro


            } //Validador datos recibidos

        }    

    ?>

    <?php 

        require_once 'assets/inc/nav.php';

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
                            <h3 class="title-5 m-b-35">actores agregados</h3>
                            <div class="table-responsive table-responsive-data2">
                                <table class="table table-data2">
                                    <thead>
                                        <tr>
                                            <th>nombre</th>

                                            <th>fecha de nacimiento</th>

                                            <th>accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php while ($slc_actores_dt_lb = $slc_actores_dt->fetch()){ ?>

                                        <tr class="tr-shadow">
                                            
                                            <td><?php echo $slc_actores_dt_lb['nombre']; ?></td>

                                            <td><?php echo $slc_actores_dt_lb['fecha_nacimiento']; ?></td>

                                            <td><a href="edit_actor.php?id_actor=<?php echo $slc_actores_dt_lb['id_actor']; ?>" class="btn btn-primary">Editar</a></td>

                                            <td><a href="assets/lib/delete_actor.php?id_actor=<?php echo $slc_actores_dt_lb['id_actor']; ?>" class="btn btn-danger">Eliminar</a></td>
                                        
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
                                            <h3 class="text-center title-2">Agregar Actor</h3>
                                        </div>
                                        <hr>



                                        <form action="<?php echo htmlentities('actores'); ?>" method="post">


                                            <div class="form-group">

                                                <label class="control-label mb-1">Nombre del Actor</label>

                                                <input name="nombre_actor" minlength="1" maxlength="200" type="text" class="form-control" placeholder="Escribe el nombre del actor" required="">

                                            </div>

                                            <div class="form-group">

                                                <label class="control-label mb-1">Fecha de nacimiento</label>

                                                <input name="fecha_nacimiento" minlength="1" maxlength="200" type="text" class="form-control" placeholder="Escribe la fecha de nacimiento del actor" required="">

                                            </div>

                                            <div>
                                                <input type="reset" class="btn btn-lg btn-info btn-block" value="Limpiar datos">
                                            </div> <br>

                                            <div>
                                                <input type="submit" class="btn btn-lg btn-info btn-block" name="verificador_actor" value="Agregar actor">
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
