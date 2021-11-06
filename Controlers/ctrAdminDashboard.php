<?php 

class ControladorAdminDashboard
{
  
    public function MostrarPagina($Pagina)
    {
        
        require_once "Views/Administrador/".$Pagina.".php";
    } 
    public function MostrarModulo($Modulo,$Pagina)
    {
        
           if(file_exists("Views/Administrador/$Modulo/$Pagina.php")){
                require_once "Views/Administrador/$Modulo/".$Pagina.".php";
           }else{
                require_once "Views/Administrador/Error404.php";
           }
        
            
        
        
    }  
    public function MostrarPlantilla()
    {
        include_once "Views/plantilla.php";
    }
}
