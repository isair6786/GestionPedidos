<?php 
if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]["Rol"]==3){
  require_once "Controlers/ctrPedidos.php";

    if($_GET["Id"]){
             
    $datosPedidos = ControladorPedidos::MostrarDellatePedidosPorId($_GET["Id"]);
   
    if($datosPedidos!=null){ 
      
                    
 ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard&Modulo=Pedidos">Pedidos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Pedido <?php echo $_GET["Id"] ?></li>
  </ol>
</nav>

<div  class="card shadow mb-4 col-sm-12">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Pedido <?php echo $_GET["Id"] ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Imagen</th>
                          <th>Producto </th>
                          <th>Cantidad </th>
                          <th>Precio</th>
                          <th>Total</th>                                                                            
                      </tr>
                  </thead>
                    
                  <tbody>
                     <!-- Llenando tabla  -->
                     <?php foreach($datosPedidos as $Detalle) {?>
                      <tr>
                        <td>
                        <?php echo '<img style="width:250px" class=" shadow-sm rounded" src="data:image/jpeg;base64,'.base64_encode( stripslashes($Detalle["Imagen"] )).'"/>';?>                                                      
                        </td>
                        <td><?php echo $Detalle["Descripcion"] ?></td>
                        <td><?php echo $Detalle["Cantidad_Pedida"] ?></td>
                        <td><?php echo $Detalle["Precio"] ?></td>
                        <td><?php echo $Detalle["Total"] ?></td>
                      </tr>           
                      <?php
                       }
                      }
                      else{
                      ?> 
                        
                      <?php }
                      }
                           ?> 
                                                              
                    <!--Fin Llenar Tabla  -->
                  </tbody>
              </table>
          </div>
      </div>
  </div>

  
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