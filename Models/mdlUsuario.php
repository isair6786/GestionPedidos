<?php

require_once "Models/config/conexion.php";
class ModeloUsuario
{
    static public function Registrar($datos,$Rol,$Activo)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_INSERTAR_USUARIO
        (?,?,?,?,?,?,?,?,?,?)");
       
        
        if ($Rol ==null && $Activo == null) {
            $Rol=2;
            $Activo = true;
        }else{
             $Rol=intval($Rol);
        }
        

        $query->bindParam(1,$datos["Usuario"],PDO::PARAM_STR);
        $query->bindParam(2,$datos["Password"],PDO::PARAM_STR);
        $query->bindParam(3,$Rol,PDO::PARAM_INT);
        $query->bindParam(4,$datos["Nombres"],PDO::PARAM_STR);
        $query->bindParam(5,$datos["Apellidos"],PDO::PARAM_STR);
        $query->bindParam(6,$datos["Direccion"],PDO::PARAM_STR);
        $query->bindParam(7,$datos["Telefono"],PDO::PARAM_STR);
        $query->bindParam(8,$datos["DUI"],PDO::PARAM_STR);
        $query->bindParam(9,$datos["Correo"],PDO::PARAM_STR);
        $query->bindParam(10,$Activo,PDO::PARAM_BOOL);

        if($query->execute())
        {
            
            return true;
          
        }
        else
        {
            
            return false;
            
        }
        $query->close();
        $query=null;
    }
    

    //Valida si el usuario existe, si existe verifica que la contraseña este correcta
    static public function ValidarCredenciales($datos)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_VALIDAR_USUARIO(?)");
        $query->bindParam(1,$datos["NombreUsuario"],PDO::PARAM_STR);
        $query->execute();
        $Columnas= $query->fetch();
        $NumColumnas = $query->rowCount();     
        if($NumColumnas<1){
            //Si es vacio es que no existe el usuario 
            return false;
        }
        else
        {
            //Si trae respuesta verificamos que la contraseña sea correcta y que este activo

            if(($Columnas["NombreUsuario"]==$datos["NombreUsuario"])&& ($Columnas["Contrasenia"]==$datos["Password"])
            && ($Columnas["Activo"]==1))
            {
                //Creamos la sesion
                
                return $Columnas;

            }
            return false;

            
        }
        $query->close();
        $query=null;
    }

    static public function EditarUsuario($datos,$Rol,$Activo)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_EDITAR_USUARIO
        (?,?,?,?,?,?,?,?,?,?,?)");
       
        
        if ($Rol ==null && $Activo == null) {
            $Rol=2;
            $Activo = true;
        }else{
             $Rol=intval($Rol);
        }
        
        $query->bindParam(1,$datos["Id"],PDO::PARAM_STR);
        $query->bindParam(2,$datos["Usuario"],PDO::PARAM_STR);
        $query->bindParam(3,$datos["Password"],PDO::PARAM_STR);
        $query->bindParam(4,$Rol,PDO::PARAM_INT);
        $query->bindParam(5,$datos["Nombres"],PDO::PARAM_STR);
        $query->bindParam(6,$datos["Apellidos"],PDO::PARAM_STR);
        $query->bindParam(7,$datos["Direccion"],PDO::PARAM_STR);
        $query->bindParam(8,$datos["Telefono"],PDO::PARAM_STR);
        $query->bindParam(9,$datos["DUI"],PDO::PARAM_STR);
        $query->bindParam(10,$datos["Correo"],PDO::PARAM_STR);
        $query->bindParam(11,$Activo,PDO::PARAM_BOOL);

        if($query->execute())
        {
            
            return true;
          
        }
        else
        {
            
            return false;
            
        }
        $query->close();
        $query=null;
        
    }
    static public function Eliminar($datos){
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_ELIMINAR_USUARIO
        (?)");

             

        $query->bindParam(1,$datos,PDO::PARAM_STR);
        

        if($query->execute()){            
            return true;
        }
        else{
            return false;   
        }
        $query->close();
        $query=null;
    }
    static public function SeleccionarUsuarios()
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_SELECCIONAR_USUARIO()");
       
        $query->execute();
        $Columnas= $query->fetchAll();
        $NumColumnas = $query->rowCount();     
        if($NumColumnas<1){
            //Si es vacio es que no existe el usuario 
            return false;
        }
        else
        {
            //Si trae respuesta devolvemos la consulta
            return $Columnas;
            
        }
        $query->close();
        $query=null;
    }
    static public function SeleccionarUsuarioPorId($id)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_SELECCIONAR_USUARIO_POR_ID(?)");
        $query->bindParam(1,$id,PDO::PARAM_STR);
        $query->execute();
        $Columnas= $query->fetch();
        $NumColumnas = $query->rowCount();     
        if($NumColumnas<1){
            //Si es vacio es que no existe el usuario 
            return false;
        }
        else
        {
            //Si trae respuesta devolvemos la consulta
            return $Columnas;
            
        }
        $query->close();
        $query=null;
    }
}

?>