<?php
session_start();
require_once "Controlers/ctrLogin.php";
require_once "Controlers/ctrAdminDashboard.php";
$LlamarPaginas = new ControladorLogin();
$MostrarDashAdmin = new ControladorAdminDashboard();

//Vemos que pagina se esta llamando
if(isset($_GET["Pagina"])){
    switch ($_GET["Pagina"]) {
        case 'Registro':
            $LlamarPaginas ->MostrarPagina("Registro");
            break;
        case 'Ingreso':
            $LlamarPaginas ->MostrarPagina("Ingreso");
            break;
        case 'Dashboard':
            if(isset($_SESSION["Usuario"])){
                if($_SESSION["Usuario"]["Rol"]==2){
                    //se redirige al dash de cliente
                }else if($_SESSION["Usuario"]["Rol"]==1){
                    //se redirige al dash de admin
                    $MostrarDashAdmin -> MostrarPagina("AdminDashboard");
                } 
            }else{
                $LlamarPaginas ->MostrarPagina("Ingreso");
            }
            break;
        case 'CerrarSesion':
            $LlamarPaginas ->EliminarSesion();
            echo "<script> window.location.replace('Login.php?Pagina=Ingreso');</script>";
            break;    
        
        default:
            $LlamarPaginas ->MostrarError();
            break;
    }
}//SI es una primera visita a la pagina mostramos login por defecto
else{
    $LlamarPaginas ->MostrarPagina("Ingreso");
}

?>