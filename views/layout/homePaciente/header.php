<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Atenmedic</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#15BF0A">
  <meta name="MobileOptimized" content="width">
  <meta name="HandheldFriendly" content="true">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="light-translucent">
  <link rel="shortcut icon" type="image/png" href="<?=base_url?>dist/img/ICONO.png">
  <link rel="apple-touch-icon" href="<?=base_url?>dist/img/ICONO.png">
  <link rel="apple-touch-startup-image" href="<?=base_url?>dist/img/ICONO.png">
  <link rel="manifest" href="<?=base_url?>manifest.json"> <!-- Lo necesario para que la página sea progresiva y se instale en el equipo -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url?>dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed sidebar-collapse">

  <!-- Modal de salida -->
  <div class="modal fade my-auto" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Cerrar sesión</h5>
        </div>
        <div class="modal-body">
          <p>¿Desea salir de la aplicación y cerrar sesión?</p>
        </div>
        <div class="modal-footer">
          <a href="<?=base_url?>paciente/logout" class="btn btn-default">
            Si
          </a>
          <button type="button" class="btn btn-info" data-dismiss="modal">No</button>
        </div>
      </div>
    </div>
  </div>

  <div class="wrapper">
    <!-- Logo de AMDHome usando nav -->
    <nav class="main-header navbar navbar-expand navbar-success navbar-dark" style="margin-left: 0px !important;">
      <!-- Left navbar links -->
      <ul class="navbar-nav container-fluid">
        <li class="nav-item d-sm-inline-block text-center">
          <h3>
            <?php if($_SESSION['identity']['chat'] == 'no'):?>
              <a href="" class="nav-link text-light" data-toggle="modal" data-target="#myModal">
                <span>
                  <i class="nav-icon fas fa-arrow-left"></i>
                </span>
              </a>
            <?php else :?>
              <a href="<?= base_url?>paciente/terminarChat" class="nav-link text-light">
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
          <a href="<?=base_url?>paciente/MenuVideo" class="nav-link text-light">
            <span>
              <h4>VideoLLamada</h4>
            </span>
          </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?=base_url?>paciente/MenuChat" class="nav-link text-light">
            <span>
              <h4>ChatOnline</h4>
            </span>
          </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?=base_url?>paciente/MenuServ" class="nav-link text-light">
            <span>
              <h4>Servicios</h4>
            </span>
          </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?=base_url?>paciente/MenuPerfil" class="nav-link text-light">
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
          <img class="img-sm mt-2 mr-2" src="<?=base_url?>dist/img/ICONO.png" alt="User profile picture">
      </ul>
    </nav>
    <!-- Fin del nav -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper pt-3" style="margin-left: 0px !important;">
      <!-- Content Header (Page header) -->
      <!-- <section class="content-header">
      </section> -->