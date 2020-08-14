      <?php 

         require_once 'assets/lib/nav.php';

       ?>
               <!-- Begin Page Content -->
               <div class="container-fluid">              
                     
                  <!-- Page Heading -->
                  <div class="d-sm-flex align-items-center justify-content-between mt-4 mb-3">
                     <h1 class="h5 mb-0 text-gray-900">Actores</h1>
                  </div>
                  <!-- Content Row -->
                  <div class="row">

                  <?php while ($slc_dt_actores_lb = $slc_dt_actores->fetch()){ ?>

                     <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card m-card shadow border-0">
                              <div class="card-body p-3">

                                 <h5 class="card-title text-gray-900 mb-1"><?php echo $slc_dt_actores_lb["nombre"]; ?></h5>

                                 <p class="card-text">

                                    <small class="text-muted">
                                       Fecha de nacimiento:
                                    </small>

                                    <small class="text-danger">
                                       <?php echo $slc_dt_actores_lb["fecha_nacimiento"]; ?>
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