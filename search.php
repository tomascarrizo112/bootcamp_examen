      <?php 

         require_once 'assets/lib/nav.php';

       ?>

       <?php 

            if (isset($_GET['query'])) {
               
               //Recibimos la info de la busqueda

                  $busqueda = $_GET['query'];

               //Realizamos la consulta

                  $consult_sql = "SELECT * FROM peliculas WHERE titulo LIKE ?";

                  $parametros = array("%$busqueda%");

                  $slc_dt_peliculas_busqueda = $mbd->prepare($consult_sql);

                  $slc_dt_peliculas_busqueda->execute($parametros);

               //Hacemos el conteo de los datos recibidos de la consulta

                  $consult_sql_count = "SELECT COUNT(*) id FROM peliculas WHERE titulo LIKE ?";

                  $parametros_count = array("%$busqueda%");

                  $slc_count_dt_peliculas = $mbd->prepare($consult_sql_count);

                  $slc_count_dt_peliculas->execute($parametros_count);

               //Obtenemos el numero de filas obtenidas

                  $resultado_conteo_registros = $slc_count_dt_peliculas->fetchColumn(); 


            }else{

               header("Location: home");

               exit();

            }

       ?>
               <!-- Begin Page Content -->
               <div class="container-fluid">              
                     
                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-3">
                     <h1 class="h5 mb-0 text-gray-900">Resultados para: <?php echo $busqueda; ?></h1>
                  </div>
                  <!-- Content Row -->
                  <div class="row">

                     <?php 

                           switch ($resultado_conteo_registros) {

                              case 0:
                                 
                                 echo '<h3>No se encontraron peliculas que coincidan con la busqueda</h3>';

                              break;

                           }

                     ?>

                  <?php while ($slc_dt_peliculas_busqueda_lb = $slc_dt_peliculas_busqueda->fetch()){ ?>

                     <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card m-card shadow border-0">
                              <div class="m-card-cover">
                                 <img src="assets/img/peliculas/<?php echo $slc_dt_peliculas_busqueda_lb["imagen"]; ?>" class="card-img-top" alt="...">
                              </div>
                              <div class="card-body p-3">

                                 <h5 class="card-title text-gray-900 mb-1">
                                    <a href="pelicula/<?php echo $slc_dt_peliculas_busqueda_lb["id"]; ?>"><?php echo $slc_dt_peliculas_busqueda_lb["titulo"]; ?></a>
                                       
                                    </h5>

                                 <p class="card-text">

                                    <small class="text-muted">
                                       <?php echo $slc_dt_peliculas_busqueda_lb["sinopsis"]; ?>
                                    </small>

                                 </p>

                                 <p class="card-text">

                                    <small class="text-muted">
                                       Duracion:
                                    </small>

                                    <small class="text-danger">
                                       <?php echo $slc_dt_peliculas_busqueda_lb["duracion"]; ?>
                                    </small> 

                                    <small class="text-muted">
                                       | Fecha de estreno:
                                    </small>
                                    
                                    <small class="text-danger">
                                       <?php echo $slc_dt_peliculas_busqueda_lb["fecha_estreno"]; ?>
                                    </small> 

                                 </p>

                                 <p class="card-text">

                                    <small class="text-muted">

                                       Actor principal: 

                                       <?php 

                                          $id_actor = $slc_dt_peliculas_busqueda_lb['actorprincipalid'];

                                          $slc_actor_pelicula = $mbd->prepare("SELECT nombre FROM actores WHERE id_actor = :id_actor");

                                          $slc_actor_pelicula->bindParam(':id_actor', $id_actor);
                                                                    
                                          $slc_actor_pelicula->execute();

                                          while ($slc_actor_pelicula_lb = $slc_actor_pelicula->fetch()){

                                             $nombre_actor = $slc_actor_pelicula_lb['nombre'];

                                          }
                                                                    
                                       ?>

                                       <?php echo $nombre_actor; ?>
                                    </small>

                                 </p>

                              </div>
                           </a>
                        </div>
                     </div>

                  <?php } ?>


                  </div>
               </div>
               <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
           
            <?php 

               require_once 'assets/lib/footer.php';

            ?>