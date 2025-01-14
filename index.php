<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
</head>
<body>
<?php
    session_start();
    require_once "autoload.php";

    # Comprueba el controlador que se busca en el URL
    if (isset($_GET['controller'])) {
        $ControllerName = $_GET['controller'] . "Controller";
    }
    else {
        # Controlador por defecto (login)
        $ControllerName = "CochesController";
    }

    # Comprueba si el controlador deseado existe
    if (class_exists($ControllerName)) {
        $controller = new $ControllerName();
        # Elige la accion/funcion a realizar y mostrar
        if(isset($_GET['action'])) {
            $action = $_GET['action'];
        }
        else {
            $action = "login";
        }
        # Ejecuta la accion
        $controller->$action();   
    }
    else {
        echo "No se ha encontrado la accion deseada: " . $ControllerName;
    }
    if (isset($_SESSION['username'])) {
        include "views/general/logout.php";
    }
?>
</body>
</html>
