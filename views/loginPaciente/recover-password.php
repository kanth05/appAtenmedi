<!DOCTYPE html>
<html lang="en">
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
  <link rel="shortcut icon" type="image/png" href="./img/ICONO.png">
  <link rel="apple-touch-icon" href="./img/ICONO.png">
  <link rel="apple-touch-startup-image" href="./img/ICONO.png">
  <link rel="manifest" href="./manifest.json"> <!-- Lo necesario para que la página sea progresiva y se instale en el equipo -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page bg-success">
    <div class="container-fluid">
        <div class="row d-flex align-items-center">
            <div class="col-7 d-none d-md-inline px-0">
                <img class="img-fluid" src="./dist/img/portada2.jpg" alt="" style="height:100vh !important">
            </div>
            <div class="col-sm-5 px-0">

              <div class="login-box mx-auto">
                <div class="login-logo">
                  <b>Aten</b>medic</a>
                </div>
                <!-- /.login-logo -->
                <div class="card">
                  <div class="card-body login-card-body">
                    <p class="login-box-msg">Coloque la nueva contraseña que usará.</p>

                    <form action="login.html" method="post">
                      <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Contraseña">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                      <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Repita la contraseña">
                        <div class="input-group-append">
                          <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <button type="submit" class="btn btn-primary btn-block">Cambiar contraseña</button>
                        </div>
                        <!-- /.col -->
                      </div>
                    </form>

                    <p class="mt-3 mb-1">
                      <a href="index.php">Regresar al inicio</a>
                    </p>
                  </div>
                  <!-- /.login-card-body -->
                </div>
              </div>
              <!-- /.login-box -->

            </div>
        </div>
    </div>
    <script src="./app.js"></script>
</body>
</html>