<?php 

require_once "Models/mdlPedidos.php";
class ControladorPedidos
{
    
    
    static public function IngresarPedido($DatosCarrito, $IdCuenta)
    {   
        $PedidoIngresado= ModeloPedidos::IngresarPedidoSimple($IdCuenta);
        if($PedidoIngresado){
            echo '<script>alert("Pedido Generado")</script>';
           
            foreach ($DatosCarrito as $datoProducto) {
                $SinError = ModeloPedidos::IngresarDetallePedidoSimple($datoProducto);
                if(!$SinError){
                    echo '<script>alert ("Producto '.$datos[$datoProducto]["Descripcion"] .'no pudo ser ingresado")</script>';
                }

             }
        
             
             return true;
             
        }else{
            return false;
        }
        
                
    }
    static public function IngresarPedidoCompuesto($IdUsuario,$IdsPedidosSimples)
    {   

        $PedidoIngresado= ModeloPedidos::IngresarPedidoCompuesto($IdUsuario);
        if($PedidoIngresado){
            echo '<script>alert("Pedido Generado")</script>';
           
            foreach ($IdsPedidosSimples as $clave =>$datos) {
                if($clave != "dataTable_length" && $clave != "ProcesarCompuesto" ){
                    $SinError = ModeloPedidos::IngresarDetallePedidoCompuesto($datos);
                }
                
            }
             
        
             
             return true;
             
        }else{
            return false;
        }
        
                
    }
    

    static public function CancelarPedido($id)
    {       
        
        $SinError = ModeloPedidos::CancelarProducto($id);
        return $SinError;
                        
    }
    static public function CobrarPedidos()
    {       
        
        $SinError = ModeloPedidos::CobrarPedidos();
        return $SinError;
                        
    }

    static public function MostrarPedidosPorUsuario($id)
    {       
        
        $Consulta = ModeloPedidos::SeleccionarPedidosPorUsuario($id);
        return($Consulta);               
    }
    static public function MostrarPedidosPorId($id)
    {       
        
        $Consulta = ModeloPedidos::SeleccionarPedidoPorId($id);
        return($Consulta);               
    }
    static public function MostrarTodosPedidos()
    {       
        
        $Consulta = ModeloPedidos::SeleccionarTodosLosPedidos();
        return($Consulta);               
    }
   
    static public function MostrarDellatePedidosPorId($id)
    {       
        
        $Consulta = ModeloPedidos::SeleccionarDetallePedidoPorId($id);
        return($Consulta);               
    }
    static public function CambiarEstadoPedido($idPedido,$IdEstado)
    {       
        
        $Consulta = ModeloPedidos::CambiarEstadoPedido($idPedido,$IdEstado);
        return($Consulta);               
    }
   

}
