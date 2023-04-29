<?php 
if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]["Rol"]==3){
    require_once "Controlers/ctrPedidos.php";
    
 ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard&Modulo=Pedidos">Pedidos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cobrar</li>
  </ol>
</nav>
<script src="assets/js/Pedidos/Modificar.js"></script>
<div  class="card shadow mb-4 col-sm-12">
       
        <div class="card-body">
        <?php                 
            $PedidoCobrado = ControladorPedidos::CobrarPedidos();

                    if($PedidoActualizado){
                        echo "<script>
                            LanzarModal('success','Pedidos Cobrados','Pedidos Cobrados Correctamente')
    
                        </script>";
                    }else{
                        echo "<script>LanzarModal('Error','Pedido no cobrados','Ocurrio Un error')</script>";
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

