<?php
    // Le decimos a PHP que usaremos cadenas UTF-8 hasta el final del script
    mb_internal_encoding('UTF-8');
    // Le indicamos a PHP que necesitamos una salida UTF-8 hacia el navegador
    mb_http_output('UTF-8');
    ob_start();
    session_start();
    require_once 'autoload.php';
    require_once 'config/utils.php';
    require_once 'config/parameters.php';

    // if(!isset($_SESSION['identity']) && isset($_SESSION['control'])){
    //     $_SESSION['identity'] = $_SESSION['control'];  
    // }

    if((!isset($_SESSION['identity']) && !isset($_SESSION['identityDoctor']))){
       require_once ('views/layout/login/header.php');

    }elseif(isset($_SESSION['identity']) && $_SESSION['identity']['video'] == 'no'){

        if($_SESSION['identity'] == 'failed'){
            require_once ('views/layout/login/header.php');
        }else{
            require_once ('views/layout/homePaciente/header.php');
        }

    }elseif(isset($_SESSION['identity']) && $_SESSION['identity']['video'] == 'si'){

        require_once ('views/layout/video/header.php');

    }elseif(isset($_SESSION['identityDoctor']) && $_SESSION['identityDoctor']['video'] == 'no'){

        if($_SESSION['identityDoctor'] == 'failed'){
            require_once ('views/layout/login/header.php');
        }else{
            require_once ('views/layout/homeDoctor/header.php');
        }

    }elseif(isset($_SESSION['identityDoctor']) && $_SESSION['identityDoctor']['video'] == 'si'){

        require_once ('views/layout/video/header.php');

    }

    //Es el index principal donde se harán los cambios entre las vistas, al estilo de una aplicación SPA

    //Función que redirigé a la página 404
    function show_error(){
        $error = new errorController();
        $error->index();
    }

    //Función que permite discriminar si el controlador que se busca existe; en caso de que no, irá al login por defecto

    if(isset($_GET['controller'])){
        $nombre_controlador = $_GET['controller'].'Controller';
    
    }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
        $nombre_controlador = controller_default;
        
    }else{
        show_error();
    }
    
    //Función que permite discriminar si la acción del controlador que se busca existe; en caso de que no, irá a la acción por defecto

    if(class_exists($nombre_controlador)){	
        $controlador = new $nombre_controlador();
        
        if(isset($_GET['action']) && method_exists($controlador, $_GET['action'])){
            $action = $_GET['action'];
            $controlador->$action();
        }elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
            $action_default = action_default;
            $controlador->$action_default();
        }else{
            show_error();
        }
    }else{
        show_error();
    }


    if((!isset($_SESSION['identity']) && !isset($_SESSION['identityDoctor']))){
        require_once ('views/layout/login/footer.php');

    }elseif(isset($_SESSION['identity']) && $_SESSION['identity']['video'] == 'no'){
        require_once ('views/layout/homePaciente/footer.php');

    }elseif(isset($_SESSION['identity']) && $_SESSION['identity']['video'] == 'si'){
        require_once ('views/layout/video/footer.php');

    }elseif(isset($_SESSION['identityDoctor']) && $_SESSION['identityDoctor']['video'] == 'no'){
        require_once ('views/layout/homeDoctor/footer.php');

    }elseif(isset($_SESSION['identityDoctor']) && $_SESSION['identityDoctor']['video'] == 'si'){
        require_once ('views/layout/video/footer.php');

    }
 
 ?>