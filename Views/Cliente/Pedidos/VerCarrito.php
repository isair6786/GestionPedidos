<?php 
if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]["Rol"]==2){
  
 ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard&Modulo=Pedidos">Mis Pedidos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Carrito de Compras</li>
  </ol>
</nav>
<form action="" method="post">
  
</form>
<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#exampleModal">
  <i class="fas fa-plus-circle"></i>  Crear Pedido Simple
</button>
<a class="btn btn-primary mb-2" href="Login.php?Pagina=Dashboard&Modulo=Pedidos&Accion=RealizaPedidoCompuesto" role="button">
<i class="fas fa-plus fa-fw"></i> Crear Pedido Compuesto
</a>
<div  class="card shadow mb-4 col-sm-12">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pedidos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Descripcion</th>
                          <th>Cantidad</th>
                          <th>Precio</th>
                          <th>Acciones</th>
                          
                          
                      </tr>
                  </thead>
                    
                  <tbody id="DetalleCarrito">
                     <!-- Llenando tabla  -->
                   
                         
                    <!--Fin Llenar Tabla  -->
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <!-- LANZANDO MODAL-->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-dark" id="exampleModalLabel"><strong>Realizar Pedido</strong></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <input name="DatosDelCarrito" id="DatosDelCarrito" type="hidden" value="" >
              <div class="form-group mb-3">
                
                <label for="inputGroupSelect01" class="form-label">Seleccione una cuenta </label>
                <select name="IdCuenta" class="custom-select" id="inputGroupSelect01" required>
                <?php 
                require_once "Controlers/ctrCuentas.php";
                $cuentas = ControladorCuentas::MostrarCuentasPorUsuarioActivas($_SESSION["Usuario"]["idUsuario"]);
                
                if($cuentas!=null){
                  foreach ($cuentas as $key => $value) {
                   echo '<option value="'. $cuentas[$key]["IdCuenta"] .'">Numero Cuenta: '. $cuentas[$key]["IdCuenta"] .', Saldo Disponible: $'. $cuentas[$key]["Saldo"] .'</option>';
                  }
                }else{
                  echo '<option value="null">No hay cuentas, cree una</option>';
                } ?> 
                </select>
              </div>
              

              
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success"> <i class="fas fa-donate"></i> &nbsp; Realizar Pedido</button>
            </form>
          </div>
        </div>
      </div>
    </div>

  <script src="assets/js/Producto/MostrarCarrito.js"></script> 

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
}


if(isset($_POST["DatosDelCarrito"]) && isset($_POST["IdCuenta"]) && $_POST["IdCuenta"]!=null){
  
  if(is_null($_POST["DatosDelCarrito"]) || empty($_POST["DatosDelCarrito"])){
    echo "<script>LanzarModal('info','Carrito Vacio','Error en el pedido, no hay productos en el carrito')</script>";
  }else{
     require_once "Controlers/ctrPedidos.php";
    
     try{
       $DatosDelCarrito = json_decode($_POST["DatosDelCarrito"],true);
     }catch (Throwable $th) {
       echo "<script>LanzarModal('danger','Ha Ocurrido un error','Error en el pedido')</script>";
     }
     $PedidoCorrecto = ControladorPedidos::IngresarPedido($DatosDelCarrito,$_POST["IdCuenta"]);                
      if($PedidoCorrecto){
        echo "<script>
              alert('Borrando Carrito')
              localStorage.removeItem('Carrito' + txtNombreUsuario.value)      
          </script>";
          echo "<script>
              localStorage.removeItem(NombreCarrito);
              LanzarModal('success','Registro Correcto','Pedido Registrado')
              
          </script>";
      }else{
          echo "<script>LanzarModal('danger','Registro no completado','Error en el pedido')</script>";
      }
  }

}
?>   