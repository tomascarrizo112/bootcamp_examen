<?php 

   require 'assets/lib/bootcamp.php';

?>

<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" type="image/png" href="assets/design/logo-icon.png">
      <title>Bootcamp</title>
      <!-- Slick Slider -->
      <link rel="stylesheet" type="text/css" href="assets/design/slick.min.css">
      <link rel="stylesheet" type="text/css" href="assets/design/slick-theme.min.css">
      <!-- Custom fonts for this template-->
      <link href="assets/design/icons/css/all.min.css" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="assets/design/osahan.min.css" rel="stylesheet">
   </head>
   <body id="page-top">
      <!-- Page Wrapper -->
      <div id="wrapper">
         <!-- Sidebar -->
         <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="home">
               <div class="sidebar-brand-icon">
                  <img src="assets/design/logo-icon.png" alt="">
               </div>
               <div class="sidebar-brand-text mx-3"><img src="assets/design/logo.png" alt=""></div>
            </a>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
               <a class="nav-link" href="home">
               <span>Inicio</span></a>
            </li>

            <li class="nav-item">
               <a class="nav-link" href="peliculas">
               <span>Peliculas</span></a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="actores">
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
                  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                  <i class="fa fa-bars"></i>
                  </button>
                  <!-- Topbar Search -->

                  <form action="search" method="get" class="d-none d-sm-inline-block form-inline mr-auto my-2 my-md-0 mw-100 navbar-search">

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
                        <a class="nav-link dropdown-toggle" href="home#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">

                           <form action="search" method="get" class="form-inline mr-auto w-100 navbar-search">

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

                           <a class="dropdown-item" href="favoritas">
                           Favoritas
                           </a>

                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="home#" data-toggle="modal" data-target="#logoutModal">
                           Cerrar sesion
                           </a>
                        </div>
                     </li>
                  </ul>
               </nav>
               <!-- End of Topbar -->