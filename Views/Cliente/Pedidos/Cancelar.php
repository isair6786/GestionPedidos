<?php 
if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]["Rol"]==2){
    require_once "Controlers/ctrPedidos.php";
    
 ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard&Modulo=Pedidos">Pedidos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cancelar</li>
  </ol>
</nav>
<script src="assets/js/Producto/Eliminar.js"></script>
<div  class="card shadow mb-4 col-sm-12">
       
        <div class="card-body">
        <?php 
            
            if(isset($_GET["Id"])){
                $DatosPedido= ControladorPedidos::MostrarPedidosPorId($_GET["Id"]);
                
                if ($DatosPedido["IdUsuario"] == $_SESSION["Usuario"]["idUsuario"] )
                {
                    
                    $PedidoCancelado = ControladorPedidos::CancelarPedido($_GET["Id"]);

                    if($PedidoCancelado){
                        echo "<script>
                            LanzarModal('success','Pedido Cancelado','Pedido Cancelado Correctamente')
    
                        </script>";
                    }else{
                        echo "<script>LanzarModal('Error','Pedido no Cancelado','')</script>";
                    }
                }
                  
            }else{
                echo "<script>LanzarModal('Error','No se tiene permiso para cancelar este pedido','')</script>";
            }
        ?>

         </div>
        
    </div> 
</div>

</body>
</html>

<?php
}else{
    //Borramos todas las variables y mostramos nuevamente el login
     echo 
        '<script>
            if(window.history.replaceState)
            {
                window.history.replaceState(null,null,"Login.php");
            }
            window.location.replace("Login.php");
        </script>';
}?>   

