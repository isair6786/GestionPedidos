<?php
session_start();
require_once "Controlers/ctrLogin.php";
require_once "Controlers/ctrAdminDashboard.php";
require_once "Controlers/ctrClienteDashboard.php";
$MostrarLogin = new ControladorLogin();
$MostrarDashAdmin = new ControladorAdminDashboard();
$MostrarDashCliente = new ControladorClienteDashboard();
//Vemos que pagina se esta llamando
if(isset($_GET["Pagina"])){
    switch ($_GET["Pagina"]) {
        case 'Registro':
            $MostrarLogin ->MostrarPagina("Registro");
            break;
        case 'Ingreso':
            $MostrarLogin ->MostrarPagina("Ingreso");
            break;
        case 'Dashboard':
            if(isset($_SESSION["Usuario"])){
                if($_SESSION["Usuario"]["Rol"]==2){
                    //se redirige al dash de cliente
                    $MostrarDashCliente -> MostrarPagina("Dashboard");
                }else if($_SESSION["Usuario"]["Rol"]==1){
                    //se redirige al dash de admin
                    $MostrarDashAdmin -> MostrarPagina("AdminDashboard");
                } 
            }else{
                $MostrarLogin ->MostrarPagina("Ingreso");
            }
            break;
        case 'CerrarSesion':
            $MostrarLogin ->EliminarSesion();
            echo "<script> window.location.replace('Login.php?Pagina=Ingreso');</script>";
            break;    
        
        default:
            $MostrarLogin ->MostrarError();
            break;
    }
}//SI es una primera visita a la pagina mostramos login por defecto
else{
    $MostrarLogin ->MostrarPagina("Ingreso");
}

?>