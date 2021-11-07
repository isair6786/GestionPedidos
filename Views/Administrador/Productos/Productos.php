<?php 
if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]["Rol"]==1){
 ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Productos</li>
  </ol>
</nav>

<a class="btn btn-primary mb-2" href="Login.php?Pagina=Dashboard&Modulo=Productos&Accion=Crear" role="button">
  <i class="fas fa-plus-circle"></i> Crear Producto 
</a>
<div  class="card shadow mb-4 col-sm-12">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Acciones</th>
                          <th>Imagen</th>
                          <th>Descripcion</th>
                          <th>Stock</th>
                          <th>Precio</th>
                          <th>Activo</th>
                          
                          
                      </tr>
                  </thead>
                    
                  <tbody>
                     <!-- Llenando tabla  -->
                    <?php  
                      require_once "Controlers/ctrProductos.php";
                      $datos = ControladorProductos::MostrarProductos();
                      if($datos!=null){
                      foreach ($datos as $clave ) {
                        
                      ?>
                      <tr>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a   class="btn btn-warning mr-1 rounded" href="Login.php?Pagina=Dashboard&Modulo=Productos&Accion=Editar&Id=<?php echo($clave["IdProducto"]); ?>" role="button">
                              <i class="fas fa-pen-square"></i>
                            </a>
                             <button class="btn btn-danger mr-1 rounded" onclick="<?php echo "LanzarModalEliminar('warning', 'Eliminar Producto','Esta accion no puede revertirse',".$clave["IdProducto"].")"; ?>">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                          </div> 
                        </td>
                        <td> 
                          <?php 
                            echo '<img width="200" src="data:image/jpeg;base64,'.base64_encode(stripslashes($clave["Imagen"] )).'"/>';
                            ?></td>
                        <td><?php echo($clave["Descripcion"]); ?></td>
                        <td><?php echo($clave["Stock"]); ?></td>
                        <td><?php echo($clave["Precio"]); ?></td>
                        <td><?php 
                            if($clave["Activo"]){
                              echo ("Activo");
                            }else{
                              echo ("Inactivo");
                            } ?>
                        </td>
                       
                        
                       
                      </tr>  
                    <?php }
                    } ?>  
                    <!--Fin Llenar Tabla  -->
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <script src="assets/js/Producto/Eliminar.js"></script>
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