<?php

require_once "Models/config/conexion.php";
class ModeloProductos
{
    static public function Registrar($datos)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_INSERTAR_PRODUCTO
        (?,?,?,?,?)");

           

        $query->bindParam(1,$datos["Descripcion"],PDO::PARAM_STR);
        $query->bindParam(2,$datos["Imagen"],PDO::PARAM_STR);
        $query->bindParam(3,$datos["Stock"],PDO::PARAM_INT);
        $query->bindParam(4,$datos["Precio"],PDO::PARAM_STR);
        $query->bindParam(5,$datos["Activo"],PDO::PARAM_BOOL);

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

    
    static public function Editar($datos,$Activo,$Imagen)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_EDITAR_PRODUCTO
        (?,?,?,?,?,?)");

        
        if ($Activo == null) {
            $Activo = true;
        };
        if ($Imagen== null) {
            $Imagen = $datos["Imagen"];
        };
        

        $query->bindParam(1,$datos["Id"],PDO::PARAM_INT);
        $query->bindParam(2,$datos["Descripcion"],PDO::PARAM_STR);
        $query->bindParam(3,$Imagen,PDO::PARAM_STR);
        $query->bindParam(4,$datos["Stock"],PDO::PARAM_INT);
        $query->bindParam(5,$datos["Precio"],PDO::PARAM_STR);
        $query->bindParam(6,$Activo,PDO::PARAM_BOOL);

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
        prepare("CALL SP_ELIMINAR_PRODUCTO
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
    static public function SeleccionarProductos()
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_SELECCIONAR_PRODUCTO()");
       
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
    static public function SeleccionarProductosPorID($id)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("SELECT * FROM PRODUCTO WHERE IdProducto = :id");
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
}

?>