<?php

require_once "Models/config/conexion.php";
class ModeloPedidos
{
    static public function IngresarPedidoSimple($datosCuenta)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_INSERTAR_PEDIDO
        (?,?,?)");
        $Estado = 1;
        $TipoPedido = 1;
        $query->bindParam(1,$TipoPedido,PDO::PARAM_INT);
        $query->bindParam(2,$Estado,PDO::PARAM_INT);
        $query->bindParam(3,$datosCuenta,PDO::PARAM_INT);

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
    static public function IngresarPedidoCompuesto($idUsuario)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_INSERTAR_PEDIDO_COMPUESTO
        (?)");
        $query->bindParam(1,$idUsuario,PDO::PARAM_INT);
  

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
    static public function IngresarDetallePedidoSimple($datos)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_INSERTAR_PEDIDO_SIMPLE
        (?,?)");
        $query->bindParam(1,$datos["IdProducto"],PDO::PARAM_STR);
        $query->bindParam(2,$datos["Cantidad"],PDO::PARAM_STR);

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
    static public function IngresarDetallePedidoCompuesto($IdPedidoSimple)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_INSERTAR_DETALLE_PEDIDO_COMPUESTO
        (?)");
        $query->bindParam(1,$IdPedidoSimple,PDO::PARAM_STR);
       

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

    
    static public function CobrarPedidos()
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_EVALUAR_PEDIDO_SIMPLE()");
             
        if($query->execute()){
            //Si es vacio es que no existe el usuario 
            return true;
        }
        else
        {
            //Si trae respuesta devolvemos la consulta
            return false;
            
        }
        $query->close();
        $query=null;
    }
    static public function CancelarProducto($id)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_RECHAZAR_PEDIDO_SIMPLE
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
    
    static public function SeleccionarPedidosPorUsuario($id)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_SELECCIONAR_PEDIDO_POR_ID_USUARIO(?)");
        $query->bindParam(1,$id,PDO::PARAM_STR);
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
    static public function CambiarEstadoPedido($idPedido,$idCuenta)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_CAMBIAR_ESTADO_PEDIDO(?,?)");
        $query->bindParam(1,$idPedido,PDO::PARAM_STR);
        $query->bindParam(2,$idCuenta,PDO::PARAM_STR);
             
        if($query->execute()){
            //Si es vacio es que no existe el usuario 
            return true;
        }
        else
        {
            //Si trae respuesta devolvemos la consulta
            return false;
            
        }
        $query->close();
        $query=null;
    }
    static public function SeleccionarPedidoPorId($idPedido)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_SELECCIONAR_PEDIDO_POR_ID(?)");
        $query->bindParam(1,$idPedido,PDO::PARAM_STR);
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
    static public function SeleccionarDetallePedidoPorId($id)
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_SELECCIONAR_DETALLE_PEDIDO_SIMPLE(?)");
        $query->bindParam(1,$id,PDO::PARAM_STR);
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
    static public function SeleccionarTodosLosPedidos()
    {
        $query=RealizarConexion::ConectarBaseDatos()->
        prepare("CALL SP_SELECCIONAR_PEDIDOS()");
        
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