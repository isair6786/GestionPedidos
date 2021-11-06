<?php 


class ControladorLogin
{
    public function MostrarError()
    {
        include_once "Views/Error/Error404.php";
    }
    public function MostrarPagina($Pagina)
    {
        require_once "Views/Login/".$Pagina.".php";
    }
   
    //metodo para registrar usuario
    static public function RegistroNuevoUsuario($datos)
    {       
        require_once "Models/mdlUsuario.php";
        $SinError = ModeloUsuario::Registrar($datos,null,null);
       
        return $SinError;
        
                
    }
    //metodo para Ingreso de usuario
    static public function IngresoUsuario($datos)
    {       
        require_once "Models/mdlUsuario.php";
        $IngresoCorrecto = ModeloUsuario::ValidarCredenciales($datos);
        if($IngresoCorrecto!=false){
            
            $_SESSION["Usuario"]=array(
                "nombre"=>$IngresoCorrecto["NombreUsuario"],
                "Rol"=>$IngresoCorrecto["Rol"]);
            return($IngresoCorrecto);
        }else{
            return($IngresoCorrecto);
        }
               
    }
    static public function EliminarSesion()
    {               
        session_destroy();
        $_SESSION = null;                        
    }

}
