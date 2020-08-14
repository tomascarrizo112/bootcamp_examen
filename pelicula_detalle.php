<?php 

   require 'assets/lib/config.php';

?>
<?php 

      if (isset($_GET['id'])) {

         //Recibimos el id de la pelicula
                  
            $id_pelicula = $_GET['id'];

         //Realizamos la consulta

            $slc_dt_pelicula_detalle = $mbd->prepare("SELECT * FROM peliculas WHERE id = :id");

            $slc_dt_pelicula_detalle->bindParam(':id', $id_pelicula);
                                  
            $slc_dt_pelicula_detalle->execute();   

         //Convertimos la informacion en variables

            while ($slc_dt_pelicula_detalle_lb = $slc_dt_pelicula_detalle->fetch()){

                  $fecha_estreno = $slc_dt_pelicula_detalle_lb['fecha_estreno'];

                  $nombre_pelicula = $slc_dt_pelicula_detalle_lb['titulo'];

                  $duracion = $slc_dt_pelicula_detalle_lb['duracion'];

                  $sinopsis = $slc_dt_pelicula_detalle_lb['sinopsis'];

                  $imagen = $slc_dt_pelicula_detalle_lb['imagen'];

                  $actor_principal_id = $slc_dt_pelicula_detalle_lb['actorprincipalid'];
            }           

            $slc_actor_pelicula = $mbd->prepare("SELECT nombre FROM actores WHERE id_actor = :id_actor");

            $slc_actor_pelicula->bindParam(':id_actor', $actor_principal_id);
                                                                    
            $slc_actor_pelicula->execute();

            while ($slc_actor_pelicula_lb = $slc_actor_pelicula->fetch()){

               $nombre_actor_principal = $slc_actor_pelicula_lb['nombre'];

            }

      }else{

         echo '<script type="text/javascript">window.location="home";</script>';

      exit();

   }

?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" type="image/png" href="../assets/design/logo-icon.png">
      <title>Bootcamp</title>
      <!-- Slick Slider -->
      <link rel="stylesheet" type="text/css" href="../assets/design/slick.min.css">
      <link rel="stylesheet" type="text/css" href="../assets/design/slick-theme.min.css">
      <!-- Custom fonts for this template-->
      <link href="../assets/design/icons/css/all.min.css" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="../assets/design/osahan.min.css" rel="stylesheet">

      <script src="../assets/design/jquery.min.js"></script>

   </head>

   <body id="page-top">

      <!-- Page Wrapper -->
      <div id="wrapper">
         <!-- Sidebar -->
         <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home">
               <div class="sidebar-brand-icon">
                  <img src="../assets/design/logo-icon.png" alt="">
               </div>
               <div class="sidebar-brand-text mx-3"><img src="../assets/design/logo.png" alt=""></div>
            </a>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
               <a class="nav-link" href="../home">
               <span>Inicio</span></a>
            </li>

            <li class="nav-item">
               <a class="nav-link" href="../peliculas">
               <span>Peliculas</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="../actores">
               <span>Actores</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
         </ul>
         <!-- End of Sidebar -->
         <!-- Content Wrapper -->
         <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
               <!-- Topbar -->
               <nav class="navbar navbar-expand navbar-dark topbar mb-4 pl-0 static-top shadow">
                  <!-- Sidebar Toggle (Topbar) -->
                  <button id="sidebarToggleTop" class="btn btn-danger d-md-none rounded-circle mr-3">
                     M
                  </button>
                  <!-- Topbar Search -->

                  <form action="../search" method="get" class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">

                     <div class="input-group">

                        <input type="search" class="form-control bg-white border-0 small" placeholder="Buscar peliculas..." name="query" aria-label="Search" aria-describedby="basic-addon2">

                        <div class="input-group-append">
                           <input type="submit" class="btn btn-primary" value="Buscar">
                        </div>

                     </div>

                  </form>

                  <!-- Topbar Navbar -->
                  <ul class="navbar-nav ml-auto">
                     <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                     <li class="nav-item dropdown no-arrow d-sm-none">

                        <a class="nav-link dropdown-toggle" href="../home#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                           Buscador
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">

                           <form action="../search" method="get" class="form-inline mr-auto w-100 navbar-search">

                              <div class="input-group">

                                 <input type="search" class="form-control bg-light border-0 small" placeholder="Buscar peliculas..." aria-label="Search" aria-describedby="basic-addon2" name="query">

                                 <div class="input-group-append">
                                    <input type="submit" class="btn btn-primary" value="Buscar">
                                 </div>

                              </div>

                           </form>

                        </div>
                     </li>

                     <!-- Nav Item - User Information -->
                     <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="home" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Usuario #1</span>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                           <a class="dropdown-item" href="../favoritas">
                           Favoritas
                           </a>

                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="../home#" data-toggle="modal" data-target="#logoutModal">
                           Cerrar sesion
                           </a>
                        </div>
                     </li>
                  </ul>
               </nav>
               <!-- End of Topbar -->

               <!-- Begin Page Content -->
               <div class="container-fluid">
                  <div class="row">
                     <div class="col-xl-3 col-lg-3">
                        <div class="bg-white p-3 widget shadow rounded mb-4">

                           <img src="../assets/img/peliculas/<?php echo $imagen; ?>" class="img-fluid rounded" alt="...">

                           <h1 class="h6 mb-0 mt-3 font-weight-bold text-gray-900">Actor principal</h1>
                                          <div id="resultado"></div>

                           <p><?php echo $nombre_actor_principal; ?></p>
                           <h1 class="h6 mb-0 mt-3 font-weight-bold text-gray-900">Fecha de estreno:</h1>
                           <p><?php echo $fecha_estreno; ?></p>
                           <h1 class="h6 mb-0 mt-3 font-weight-bold text-gray-900">Duracion:</h1>
                           <p><?php echo $duracion; ?></p>
                        </div>
                     </div>
                     <div class="col-xl-9 col-lg-9">
                        <div class="bg-white info-header shadow rounded mb-4">
                           <div class="row d-flex align-items-center justify-content-between p-3 border-bottom">
                              <div class="col-lg-7 m-b-4">
                                 <h3 class="text-gray-900 mb-0 mt-0 font-weight-bold"><?php echo $nombre_pelicula; ?></h3>
                              </div>
                              <div class="col-lg-5 text-right">

                                    <form name="formularioaenviar" id="formularioaenviar" action="../add_fav.php" method="post">

                                       <input type="hidden" name="id_peli" id="id_peli" value="<?php echo $id_pelicula; ?>">

                                       <input type="submit" class="d-sm-inline-block btn btn-danger shadow-sm" name="verificador_ajax" value="Agregar a favoritos">

                                    </form>

                              </div>

                              <script type="text/javascript">

                                 $('#formularioaenviar').submit(function (ev) {

                                   $.ajax({

                                     type: $('#formularioaenviar').attr('method'), 

                                     url: $('#formularioaenviar').attr('action'),

                                     data: $('#formularioaenviar').serialize(),

                                     success: function (data) { alert('Pelicula agregada correctamente'); } 

                                   });

                                   ev.preventDefault();

                                 });

                              </script>

                           </div>
                        </div>
                        <div class="bg-white p-3 widget shadow rounded mb-4">
                           <ul class="nav nav-tabs" id="myTab" role="tablist">
                              <li class="nav-item">
                                 <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Sinopsis</a>
                              </li>
                           </ul>
                           <div class="tab-content" id="myTabContent">
                              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                 <p><?php echo $sinopsis; ?></p>
                              </div>                           
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

                        <!-- Footer -->
            <footer class="sticky-footer bg-white">
               <div class="container my-auto">
                  <div class="copyright text-center my-auto">
                     <span>Copyright © Bootcamp 2020 | Hecho por Tomas Carrizo Jozami</span>
                  </div>
               </div>
            </footer>
            <!-- End of Footer -->
         </div>
         <!-- End of Content Wrapper -->
      </div>
      <!-- End of Page Wrapper -->
      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Estas seguro que quieres cerrar sesion?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                  </button>
               </div>
               <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                  <a class="btn btn-primary" href="home">Cerrar sesion</a>
               </div>
            </div>
         </div>
      </div>
      <!-- Bootstrap core JavaScript-->
      <script async="" src="../assets/design/analytics.js"></script>
      <script src="../assets/design/bootstrap.bundle.min.js"></script>
      <!-- Core plugin JavaScript-->
      <script src="../assets/design/jquery.easing.min.js"></script>
      <!-- slick Slider JS-->
      <script type="text/javascript" src="../assets/design/slick.min.js"></script>
      <!-- Custom scripts for all pages-->
      <script src="../assets/design/osahan.min.js"></script>
   
</body></html>