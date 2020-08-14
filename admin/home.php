	<?php 

		//Archivo de seguridad

			require_once 'security.php';

	?>

	<?php 

    	require_once 'assets/inc/nav.php';

    ?>

    <?php 

    //Seleccionamos toda la data de las peliculas publicadas

    	$slc_dt_peliculas = $mbd->prepare("SELECT * FROM peliculas LIMIT 5");
                                
        $slc_dt_peliculas->execute();

    ?>

    <?php 

        $slc_actores_dt = $mbd->prepare("SELECT * FROM actores LIMIT 5");
                            
        $slc_actores_dt->execute();              

    ?>

        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Bienvenido,
                                <span>Administrador</span>
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

            <!-- DATA TABLE-->
            <section class="p-t-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
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


                                    <?php while ($slc_dt_peliculas_lb = $slc_dt_peliculas->fetch()){ ?>

                                        <tr class="tr-shadow">
                                            
                                            <td><?php echo $slc_dt_peliculas_lb['titulo']; ?></td>
                                            <td><?php echo $slc_dt_peliculas_lb['duracion']; ?></td>
                                            <td><?php echo $slc_dt_peliculas_lb['fecha_estreno']; ?></td>
                                            <td><?php echo $slc_dt_peliculas_lb['sinopsis']; ?></td>

                                            <?php 

                                                $id_actor = $slc_dt_peliculas_lb['actorprincipalid'];

                                                $slc_actor_pelicula = $mbd->prepare("SELECT nombre FROM actores WHERE id_actor = :id_actor");

                                                $slc_actor_pelicula->bindParam(':id_actor', $id_actor);
                                                                    
                                                $slc_actor_pelicula->execute();

                                                while ($slc_actor_pelicula_lb = $slc_actor_pelicula->fetch()){

                                                    $nombre_actor = $slc_actor_pelicula_lb['nombre'];

                                                }
                                                                    
                                            ?>
                                            <td><?php echo $nombre_actor; ?></td>

                                            <td><a href="edit_pelicula.php?id_pelicula=<?php echo $slc_dt_peliculas_lb['id']; ?>" class="btn btn-primary">Editar</a></td>

                                            <td><a href="assets/lib/delete_pelicula.php?id_pelicula=<?php echo $slc_dt_peliculas_lb['id']; ?>" class="btn btn-danger">Eliminar</a></td>
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

            <div class="row" style="margin-top: 50px;">
                                    
                <div class="col-md-5"></div>
                <div class="col-md-2"><a href="peliculas" class="btn btn-primary">Ver todas</a></div>
                <div class="col-md-5"></div>

            </div>

            <!-- DATA TABLE-->
            <section class="p-t-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
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

            <div class="row" style="margin-top: 50px;">
                                    
                <div class="col-md-5"></div>
                <div class="col-md-2"><a href="actores" class="btn btn-primary">Ver todos</a></div>
                <div class="col-md-5"></div>

            </div>

    <?php 

    	require_once 'assets/inc/footer.php';

    ?>
