<?php 
if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]["Rol"]==1){
    require_once "Controlers/ctrPedidos.php";
    
 ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard&Modulo=Pedidos">Pedidos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Modificar Estado</li>
  </ol>
</nav>
<script src="assets/js/Pedidos/Modificar.js"></script>
<div  class="card shadow mb-4 col-sm-12">
       
        <div class="card-body">
        <?php 
            
            if(isset($_GET["IdPedido"])&&isset($_GET["IdEstado"])){
                
                $PedidoActualizado = ControladorPedidos::CambiarEstadoPedido($_GET["IdPedido"],$_GET["IdEstado"]);

                    if($PedidoActualizado){
                        echo "<script>
                            LanzarModal('success','Pedido Modificado','Pedido Modificado Correctamente')
    
                        </script>";
                    }else{
                        echo "<script>LanzarModal('Error','Pedido no Modificado','Ocurrio Un error')</script>";
                    }
                
                  
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

