<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#15BF0A">
    <meta name="MobileOptimized" content="width">
    <meta name="HandheldFriendly" content="true">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="light-translucent">
    <link rel="shortcut icon" type="image/png" href="./dist/img/ICONO.png">
    <link rel="apple-touch-icon" href="./dist/img/ICONO.png">
    <link rel="apple-touch-startup-image" href="./dist/img/ICONO.png">
    <link rel="manifest" href="./manifest.json"> <!-- Lo necesario para que la página sea progresiva y se instale en el equipo -->
    <title>Atenmedic</title>
    <link href="./app.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="./dist/css/adminlte.css">
    <link rel="stylesheet" href="./dist/css/fontawesome-free/css/all.min.css">
    <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
</head>
<body>
  <!-- OpenTok.js library -->
  <div id="videos">
    <div id="subscriber"></div>
      <div id="publisher"></div>
      <div>
        <button type="button" class="btn btn-danger rounded-circle btn-position" id="btn_disconect">
          <i class="nav-icon fas fa-phone-slash"></i>
        </button>
      </div>
  </div>

  <script type="text/javascript" src="./plugins/Tokbox/tokbox.js"></script>
  
</body>
</html> 
        