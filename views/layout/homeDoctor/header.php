<!DOCTYPE html>
<html lang="es" style="height = auto;">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Atenmedi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, height=device-height, viewport-fit=cover">
  <meta name="theme-color" content="#15BF0A">
  <meta name="MobileOptimized" content="width">
  <meta name="HandheldFriendly" content="true">
  <link rel="shortcut icon" type="image/png" href="<?=base_url?>dist/img/ICONO.png">

  <!-- Lo necesario para que la página sea progresiva y se instale en el equipo -->

  <link rel="manifest" href="<?=base_url?>manifest.json"> 

  <!-- Opciones para IOS -->

  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="light-translucent">

  <link rel="apple-touch-icon" href="<?=base_url?>dist/img/ICONO.png">
  <link rel="apple-touch-icon" sizes="152x152" href="<?=base_url?>dist/img/ICONO.png">
  <link rel="apple-touch-icon" sizes="180x180" href="<?=base_url?>dist/img/ICONO.png">
  <link rel="apple-touch-icon" sizes="167x167" href="<?=base_url?>dist/img/ICONO.png">

  <link rel="apple-touch-startup-image" href="<?=base_url?>dist/img/ICONO.png">

  <meta name="apple-mobile-web-app-title" content="Atenmedi">

  <!-- Librería PWAcompat que gestiona el manifest para navegadores problemáticos, como safari de IOS -->
  <link rel="manifest" href="manifest.webmanifest" />
  <script async src="https://unpkg.com/pwacompat" crossorigin="anonymous"></script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url?>dist/css/adminlte.css">
  <!-- Sweet Alert2 style -->
  <link rel="stylesheet" href="<?=base_url?>plugins/sweetalert2/sweetalert2.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  
</head>
<body class="layout-top-nav" style="height: auto;">

    <!-- Modal de salida -->
    <div class="modal fade my-auto" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-footer p-3">
            <h5 class="mb-0">¿Desea salir de la aplicación y cerrar sesión?</h5>
            <div class="float-right pl-4">
              <a href="<?=base_url?>doctor/logout" class="btn btn-default btn-sm">
                  Si
              </a>
              <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">No</button>
            </div> 
          </div>
        </div>
      </div>
    </div>    

  <div class="wrapper">
    <!-- Logo de AMDHome usando nav -->
    <nav class="main-header navbar navbar-expand navbar-success navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav container-fluid">
        <li class="nav-item d-sm-inline-block text-center">
          <h3>
            <?php if($_SESSION['identityDoctorOp']['chat'] == 'no'):?>
              <a href="" class="nav-link text-light" data-toggle="modal" data-target="#myModal">
                <span>
                  <i class="nav-icon fas fa-arrow-left"></i>
                </span>
              </a>
            <?php else :?>
              <a href="<?= base_url?>doctor/terminarChat" class="nav-link text-light">
                <span>
                  <i class="nav-icon fas fa-arrow-left"></i>
                </span>
              </a>
            <?php endif?>
          </h3>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?=base_url?>doctor/operaciones" class="nav-link text-light">
            <span>
              <h4>Operaciones</h4>
            </span>
          </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?=base_url?>doctor/perfil" class="nav-link text-light">
            <span>
              <h4>Perfil</h4>
            </span>
          </a>
        </li>
        <li class="nav-item ml-5">
          <h4>
            <strong><a href="" class="nav-link text-light">Atenmedic
              </a></strong>
            </h4>
          </li>
          <img class="img-sm mt-2" src="<?=base_url?>dist/img/ICONO.png" alt="User profile picture">
      </ul>
    </nav>
    <!-- Fin del nav -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style = "min-height: 594.359px">
      <!-- Content Header (Page header) -->
      <section class="content-header">
      </section>