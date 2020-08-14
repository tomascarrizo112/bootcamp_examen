      <?php 

         require_once 'assets/lib/nav.php';

       ?>
       <?php 

         //Seleccionamos toda la data de las peliculas favoritas

            $slc_dt_favoritas = $mbd->prepare("SELECT * FROM favoritas");
                                   
            $slc_dt_favoritas->execute();

               while ($slc_dt_favoritas_lb = $slc_dt_favoritas->fetch()){

                  $id_pelicula = $slc_dt_favoritas_lb['id_pelicula'];

               }

               $slc_peliculas = $mbd->prepare("SELECT * FROM peliculas WHERE id = :id_pelicula");

               $slc_peliculas->bindParam(':id_pelicula', $id_pelicula);
                                                                    
               $slc_peliculas->execute();

       ?>
               <!-- Begin Page Content -->
               <div class="container-fluid">              
                     
                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-3">
                     <h1 class="h5 mb-0 text-gray-900">Peliculas favoritas</h1>
                  </div>
                  <!-- Content Row -->
                  <div class="row">

                  <?php while ($slc_peliculas_lb = $slc_peliculas->fetch()){ ?>

                     <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card m-card shadow border-0">
                              <div class="m-card-cover">
                                 <img src="assets/img/peliculas/<?php echo $slc_peliculas_lb["imagen"]; ?>" class="card-img-top" alt="...">
                              </div>
                              <div class="card-body p-3">

                                 <h5 class="card-title text-gray-900 mb-1">
                                    <a href="pelicula/<?php echo $slc_peliculas_lb["id"]; ?>"><?php echo $slc_peliculas_lb["titulo"]; ?></a>
                                       
                                    </h5>

                                 <p class="card-text">

                                    <small class="text-muted">
                                       <?php echo $slc_peliculas_lb["sinopsis"]; ?>
                                    </small>

                                 </p>

                                 <p class="card-text">

                                    <small class="text-muted">
                                       Duracion:
                                    </small>

                                    <small class="text-danger">
                                       <?php echo $slc_peliculas_lb["duracion"]; ?>
                                    </small> 

                                    <small class="text-muted">
                                       | Fecha de estreno:
                                    </small>
                                    
                                    <small class="text-danger">
                                       <?php echo $slc_peliculas_lb["fecha_estreno"]; ?>
                                    </small> 

                                 </p>

                                 <p class="card-text">

                                    <small class="text-muted">

                                       Actor principal: 

                                       <?php 

                                          $id_actor = $slc_peliculas_lb['actorprincipalid'];

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