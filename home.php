      <?php 

         require_once 'assets/lib/nav.php';

       ?>
               <!-- Begin Page Content -->
               <div class="container-fluid">              
                     
                     <div class="osahan-slider slick-initialized slick-slider">                    
                     
                  <div class="slick-list draggable" style="padding: 0px 200px;"><div class="slick-track" style="opacity: 1; width: 8176px; transform: translate3d(-2044px, 0px, 0px);"><div class="osahan-slider-item slick-slide slick-cloned" style="width: 1006px;" tabindex="-1" data-slick-index="-2" aria-hidden="true"><img src="assets/design/slider2.jpg" class="img-fluid rounded" alt="..."></div><div class="osahan-slider-item slick-slide slick-cloned" style="width: 1006px;" tabindex="-1" data-slick-index="-1" aria-hidden="true"><img src="assets/design/slider3.jpg" class="img-fluid rounded" alt="..."></div><div class="osahan-slider-item slick-slide slick-current slick-active slick-center" style="width: 1006px;" tabindex="0" data-slick-index="0" aria-hidden="false"><img src="assets/design/slider1.jpg" class="img-fluid rounded" alt="..."></div><div class="osahan-slider-item slick-slide" style="width: 1006px;" tabindex="-1" data-slick-index="1" aria-hidden="true"><img src="assets/design/slider2.jpg" class="img-fluid rounded" alt="..."></div><div class="osahan-slider-item slick-slide" style="width: 1006px;" tabindex="-1" data-slick-index="2" aria-hidden="true"><img src="assets/design/slider3.jpg" class="img-fluid rounded" alt="..."></div><div class="osahan-slider-item slick-slide slick-cloned" style="width: 1006px;" tabindex="-1" data-slick-index="3" aria-hidden="true"><img src="assets/design/slider1.jpg" class="img-fluid rounded" alt="..."></div><div class="osahan-slider-item slick-slide slick-cloned slick-center" style="width: 1006px;" tabindex="-1" data-slick-index="4" aria-hidden="true"><img src="assets/design/slider2.jpg" class="img-fluid rounded" alt="..."></div><div class="osahan-slider-item slick-slide slick-cloned" style="width: 1006px;" tabindex="-1" data-slick-index="5" aria-hidden="true"><img src="assets/design/slider3.jpg" class="img-fluid rounded" alt="..."></div></div></div></div>

                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-3">
                     <h1 class="h5 mb-0 text-gray-900">Peliculas</h1>
                  </div>
                  <!-- Content Row -->
                  <div class="row">

                  <?php while ($slc_dt_peliculas_limit_lb = $slc_dt_peliculas_limit->fetch()){ ?>

                     <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card m-card shadow border-0">
                              <div class="m-card-cover">
                                 <img src="assets/img/peliculas/<?php echo $slc_dt_peliculas_limit_lb["imagen"]; ?>" class="card-img-top" alt="...">
                              </div>
                              <div class="card-body p-3">

                                 <h5 class="card-title text-gray-900 mb-1">
                                    <a href="pelicula/<?php echo $slc_dt_peliculas_limit_lb["id"]; ?>"><?php echo $slc_dt_peliculas_limit_lb["titulo"]; ?></a>
                                       
                                    </h5>

                                 <p class="card-text">

                                    <small class="text-muted">
                                       <?php echo $slc_dt_peliculas_limit_lb["sinopsis"]; ?>
                                    </small>

                                 </p>

                                 <p class="card-text">

                                    <small class="text-muted">
                                       Duracion:
                                    </small>

                                    <small class="text-danger">
                                       <?php echo $slc_dt_peliculas_limit_lb["duracion"]; ?>
                                    </small> 

                                    <small class="text-muted">
                                       | Fecha de estreno:
                                    </small>
                                    
                                    <small class="text-danger">
                                       <?php echo $slc_dt_peliculas_limit_lb["fecha_estreno"]; ?>
                                    </small> 

                                 </p>

                                 <p class="card-text">

                                    <small class="text-muted">

                                       Actor principal: 

                                       <?php 

                                          $id_actor = $slc_dt_peliculas_limit_lb['actorprincipalid'];

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

                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-3">
                     <h1 class="h5 mb-0 text-gray-900">Actores</h1>
                  </div>
                  <!-- Content Row -->
                  <div class="row">

                  <?php while ($slc_dt_actores_limit_lb = $slc_dt_actores_limit->fetch()){ ?>

                     <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card m-card shadow border-0">
                              <div class="card-body p-3">

                                 <h5 class="card-title text-gray-900 mb-1"><?php echo $slc_dt_actores_limit_lb["nombre"]; ?></h5>

                                 <p class="card-text">

                                    <small class="text-muted">
                                       Fecha de nacimiento:
                                    </small>

                                    <small class="text-danger">
                                       <?php echo $slc_dt_actores_limit_lb["fecha_nacimiento"]; ?>
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