<?php

require_once "Models/config/conexion.php";
class ModeloCuentas
{
    static public function Registrar($datos)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_INSERTAR_CUENTA
        (?,?,?)");

           

        $query->bindParam(1,$datos["IdUsuario"],PDO::PARAM_STR);
        $query->bindParam(2,$datos["Saldo"],PDO::PARAM_STR);
        $query->bindParam(3,$datos["txtActivo"],PDO::PARAM_STR);

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

    
    static public function Editar($datos)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_EDITAR_CUENTA
        (?,?,?,?)");
        $query->bindParam(1,$datos["Id"],PDO::PARAM_INT);
        $query->bindParam(2,$datos["IdUsuario"],PDO::PARAM_STR);              
        $query->bindParam(3,$datos["Saldo"],PDO::PARAM_STR);
        $query->bindParam(4,$datos["txtActivo"],PDO::PARAM_STR);
      

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
    static public function Aumentar($datos)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_AUMENTAR_CUENTA
        (?,?)");
        $query->bindParam(1,$datos["IdCuenta"],PDO::PARAM_INT);
        $query->bindParam(2,$datos["SaldoAñadir"],PDO::PARAM_STR);              
        
      

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
    static public function Eliminar($id)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_ELIMINAR_CUENTA
        (?)");

             

        $query->bindParam(1,$id,PDO::PARAM_INT);
        

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
    static public function Activar($id)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("UPDATE Cuentas SET Activo = true where IdCuenta = :id");


        $query->bindParam("id",$id,PDO::PARAM_INT);
        

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
    static public function SeleccionarCuentas()
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_SELECCIONAR_CUENTA()");
       
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
    static public function SeleccionarCuentasPorID($id)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("SELECT * FROM Cuentas WHERE IDCUENTA = :id");
        $query->bindParam("id",$id,PDO::PARAM_STR);
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
    static public function SeleccionarCuentasActivas()
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("SELECT * FROM Cuentas WHERE Activo = true");
       
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
    static public function SeleccionarCuentasPorUsuario($IdUsuario)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("SELECT * FROM Cuentas WHERE IdUsuario = :id");
        $query->bindParam("id",$IdUsuario,PDO::PARAM_STR);
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
}

?>