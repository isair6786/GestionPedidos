<?php 
if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]["Rol"]==2){
  require_once "Controlers/ctrPedidos.php";
 ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Mis Pedidos</li>
  </ol>
</nav>

<a class="btn btn-primary mb-2" href="Login.php?Pagina=Dashboard&Modulo=Pedidos&Accion=VerCarrito" role="button">
<i class="fas fa-shopping-cart fa-fw"></i> Ver Carrito
</a>
<div  class="card shadow mb-4 col-sm-12">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Mis Pedidos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Acciones</th>
                          <th>Id del Pedido</th>
                          <th>Cuenta Para Pago</th>
                          <th>Estado del Pedido</th>                                                                            
                      </tr>
                  </thead>
                    
                  <tbody>
                     <!-- Llenando tabla  -->

                     <?php 
                      $datosPedidos = ControladorPedidos::MostrarPedidosPorUsuario($_SESSION["Usuario"]["idUsuario"]);
                    
                      if($datosPedidos!=null){ 
                        foreach($datosPedidos as $Pedido) {
                      ?>
                    
                      <tr>
                        <td>
                          <a class="btn btn-success" title="Ver Pedido"
                           href="Login.php?Pagina=Dashboard&Modulo=Pedidos&Accion=PedidoDetalle&Id=<?php echo $Pedido["IdPedido"] ?>">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                          </a>
                          <a class="btn btn-danger" title="Ver Pedido"
                           href="Login.php?Pagina=Dashboard&Modulo=Pedidos&Accion=Cancelar&Id=<?php echo $Pedido["IdPedido"] ?>">
                           <i class="fa fa-ban" aria-hidden="true"></i>
                          </a>

                        </td>
                        <td><?php echo $Pedido["IdPedido"] ?></td>
                        <td><?php echo $Pedido["CuentaParaPago"] ?></td>
                        <td>
                        <?php 
                            switch ($Pedido["IdEstado"]) {
                              case '1':
                                echo '<span class="badge badge-info">'.$Pedido["Estado"] .'</span>';
                                break;
                              case '2':
                                echo '<span class="badge badge-secondary">'.$Pedido["Estado"] .'</span>';
                                break; 
                              case '3':
                                  echo '<span class="badge badge-warning">'.$Pedido["Estado"] .'</span>';
                                  break; 
                              case '4':
                                  echo '<span class="badge badge-success">'.$Pedido["Estado"] .'</span>';
                                  break;     
                              case '5':
                                  echo '<span class="badge badge-danger">'.$Pedido["Estado"] .'</span>';
                                    break; 
                              case '6':
                                      echo '<span class="badge badge-dark">'.$Pedido["Estado"] .'</span>';
                                        break;
                             
                            }                                                
                        ?></td>
                      </tr>           
                      <?php }
                      }
                      else{
                      ?> 
                        
                      <?php }
                      
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