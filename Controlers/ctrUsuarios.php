<?php 
require_once "Models/mdlUsuario.php";
class ControladorUsuarios
{
    static public function EliminarUsuario($datos)
    {       
        
        $SinError = ModeloUsuario::Eliminar($datos);
        return $SinError;
                        
    }
    static public function EditarUsuario($datos)
    {       
        require_once "Models/mdlUsuario.php";
        if($datos["txtActivo"]=="on"){
            $Activo = true;
          }else{
            $Activo = false;
          } 
          
          
        $SinError = ModeloUsuario::EditarUsuario($datos,$datos["txtRol"],$Activo);
    
        return $SinError;
        
                
    }
    static public function RegistroNuevoUsuario($datos)
    {       
        require_once "Models/mdlUsuario.php";
        if($datos["txtActivo"]=="on"){
            $Activo = true;
          }else{
            $Activo = false;
          } 
        $SinError = ModeloUsuario::Registrar($datos,$datos["txtRol"],$Activo);
       
        return $SinError;
        
                
    }

    static public function MostrarUsuarios()
    {       
        
        $Consulta = ModeloUsuario::SeleccionarUsuarios();
        return($Consulta);               
    }
    static public function MostrarUsuarioPorId($id)
    {       
        
        $Consulta = ModeloUsuario::SeleccionarUsuarioPorId($id);
        return($Consulta);               
    }
}
