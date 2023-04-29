<?php 

class ControladorBodegaDashboard
{
  
    public function MostrarPagina($Pagina)
    {
        
        require_once "Views/AdministradorBodega/".$Pagina.".php";
    } 
    public function MostrarModulo($Modulo,$Pagina)
    {
        
           if(file_exists("Views/AdministradorBodega/$Modulo/$Pagina.php")){
                require_once "Views/AdministradorBodega/$Modulo/".$Pagina.".php";
           }else{
                require_once "Views/AdministradorBodega/Error404.php";
           }        
    }  
    public function MostrarPlantilla()
    {
        include_once "Views/plantilla.php";
    }
}
