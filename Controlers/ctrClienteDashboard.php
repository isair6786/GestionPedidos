<?php 

class ControladorClienteDashboard
{
  
    public function MostrarPagina($Pagina)
    {
        
        require_once "Views/Cliente/".$Pagina.".php";
    } 
    public function MostrarModulo($Modulo,$Pagina)
    {
        
           if(file_exists("Views/Cliente/$Modulo/$Pagina.php")){
                require_once "Views/Cliente/$Modulo/".$Pagina.".php";
           }else{
                require_once "Views/Cliente/Error404.php";
           }        
    }  
   
}
