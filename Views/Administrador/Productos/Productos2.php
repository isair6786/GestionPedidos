<!-- Page Heading -->
<div class="row">
  <!-- ACTIVAR MODAL -->
  <button type="modal" class="btn btn-success btn-icon-split mb-2 ml-1" data-toggle="modal" data-target="#modalInsertarProducto">
  <span class="icon text-white-50">
    <i class="fas fa-plus-circle"></i>
  </span>
  <span class="text">Nuevo Producto</span>
</button>

<div  class="card shadow mb-4 col-sm-12">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Productos Disponibles</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Imagen</th>
                          <th>Descripcion</th>
                          <th>Stock</th>
                          <th>Precio</th>
                          <th>Esta Activo</th>
                          <th>Acciones</th>
                      </tr>
                  </thead>
                    
                  <tbody>
                     <!-- Llenando tabla  -->
                    <?php  
                      require_once "../../Controlers/ctrProductos.php";
                      $datos = ControladorProductos::MostrarProductos();
                      if($datos!=null){
                      foreach ($datos as $clave ) {
                        
                      ?>
                      <tr>
                        <td> <?php echo($clave["IdProducto"]); ?></td>
                        <td>
                          <?php 
                            echo '<img width="200" src="data:image/jpeg;base64,'.base64_encode( stripslashes($clave["Imagen"] )).'"/>';
                            
                          ?>
                        </td>
                        <td><?php echo($clave["Descripcion"]); ?></td>
                        <td><?php echo($clave["Stock"]); ?></td>
                        <td><?php echo("$" . $clave["Precio"]); ?></td>
                        <td><?php 
                            if($clave["Activo"]){
                              echo ("Activo");
                            }else{
                              echo ("Inactivo");
                            } ?>
                        </td>
                        <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <?php echo('<button type="button" onclick="MostrarModalEditar('.$clave["IdProducto"].')" class="btn btn-warning btn-sm rounded" > '); ?> 
                        <!-- <a href="AdminDashboard.php?Pagina=Productos&IdProducto=<?php echo($clave["IdProducto"]); ?>" class="btn btn-warning btn-sm mx-1 rounded"> -->
                            <i class="fas fa-pen-square"></i>
                            </button>
                              <form method="post" action="#" id="<?php echo("FormEliminar".$clave["IdProducto"]); ?>">
                                <input type="hidden" name="Accion" class="form-control" id="txtAccion" value="Eliminar">
                                <input type="hidden" name="ID" class="form-control" id="txtID"  value="<?php echo($clave["IdProducto"]); ?>">
                                <?php echo('<button type="button" onclick="Eliminar('.$clave["IdProducto"].')" class="btn btn-danger btn-sm rounded" id="btnEliminarProducto"> '); ?>
                                
                                  <i class="fas fa-trash-alt"></i>
                                </button>
                              </form>
                          </div> 
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
              
          
  
<!-- FIN ROW -->

<!-- Modal Agregar-->
<div class="modal fade" id="modalInsertarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>Insertar Producto</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- INICIO FORM -->
        <form name="MiForm" id="MiForm" method="post" action="#" enctype="multipart/form-data">                     
          <input type="hidden" name="Accion" class="form-control" id="txtAccion" rows="3" value="Registro">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripcion</label>
            <textarea name="Descripcion" class="form-control" id="txtDescripcion" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="File_Image">Seleccione la imagen del producto</label>
            <input name="Imagen" type="file" class="form-control-file" accept="image/*" id="File_Image">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtStock">Stock</label>
              <input name="Stock" type="number" class="form-control" id="txtStock" min="0" max="100" placeholder="0">
            </div>
            <div  class="form-group col-md-6">
              <label for="txtStock">Precio</label>
              <input name="Precio" type="number" class="form-control" id="txtStock" min="0.00" step=".01" max="100" placeholder="0.00">
            </div>
          </div>
          <div class="form-group">
            <label for="txtStock">Producto Activo</label>
            <div class="custom-control custom-switch">
              <input name="Activo" type="checkbox" class="custom-control-input" id="customSwitches">
              <label class="custom-control-label" for="customSwitches" id="SwitchName"></label>
            </div>
          </div>
          
          
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar Producto</button>
      </form>
       <!-- FIN FORM -->
      </div>
    </div>
  </div>
</div>
<!--Fin Modal Agregar-->

<!--Modal Modificar -->
<?php if(isset($_GET["IdProducto"])){
  require_once "../../Controlers/ctrProductos.php";
  $datos = ControladorProductos::MostrarProductoPorId($_GET["IdProducto"]);

  ?>
<div class="modal fade" id="modalMostrarProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>Modificar Producto</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- INICIO FORM -->
        <form name="MiForm" id="MiForm" method="post" action="#" enctype="multipart/form-data">                     
          <input type="hidden" name="Accion" class="form-control" id="txtAccion" rows="3" value="Registro">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripcion</label>
            <textarea name="Descripcion" class="form-control" id="txtDescripcion" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="File_Image">Seleccione la imagen del producto</label>
            <input name="Imagen" type="file" class="form-control-file" accept="image/*" id="File_Image">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtStock">Stock</label>
              <input name="Stock" type="number" class="form-control" id="txtStock" min="0" max="100" placeholder="0">
            </div>
            <div  class="form-group col-md-6">
              <label for="txtStock">Precio</label>
              <input name="Precio" type="number" class="form-control" id="txtStock" min="0.00" step=".01" max="100" placeholder="0.00">
            </div>
          </div>
          <div class="form-group">
            <label for="txtStock">Producto Activo</label>
            <div class="custom-control custom-switch">
              <input name="Activo" type="checkbox" class="custom-control-input" id="customSwitches">
              <label class="custom-control-label" for="customSwitches" id="SwitchName"></label>
            </div>
          </div>
          
          
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar Producto</button>
      </form>
       <!-- FIN FORM -->
      </div>
    </div>
  </div>
</div>
<?php } ?>
<!--Fin Modal Modificar -->

<script src="../../js/Producto/Producto.js"></script>

<?php 
//Si se hace el envio del formulario 
if(isset($_POST)&&$_POST!=null){

  require_once "../../Controlers/ctrProductos.php";
  
  //Validando que accion es
  switch ($_POST["Accion"]) {
    case 'Registro':
      if (ControladorProductos::RegistroNuevoProducto($_POST,$_FILES)) {
        unset($_POST);
        echo "
          <script>
          if(window.history.replaceState)
          {
            window.history.replaceState(null,null,'AdminDashboard.php?Pagina=Productos')
            
          }
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Producto Ingresado Correctamente',
            showConfirmButton: false,
            timer: 3500
          }) 
          setTimeout(()=>{
            window.location.replace('AdminDashboard.php?Pagina=Productos')
          },3500) 
        </script>";
        
      }else{
        unset($_POST);
        echo " <script>
          if(window.history.replaceState)
          {
              window.history.replaceState(null,null,'AdminDashboard.php');
             
          }                     
               
          Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Producto no ingresado correctamente',
            showConfirmButton: false,
            timer: 3500
          })
          setTimeout(()=>{
            window.location.replace('AdminDashboard.php?Pagina=Productos')
          },3500) 
          </script>
        
        ";
      }
    break;
    case 'Edicion':
      if (ControladorProductos::EditarProducto($_POST,$_FILES)) {
        $_POST=null;
        echo "
        <script>
          if(window.history.replaceState)
          {
              window.history.replaceState(null,null,'AdminDashboard.php?Pagina=Producto');
              
          } 
          window.location.replace('AdminDashboard.php?Pagina=Productos')            
        </script>";
        echo "
        <script>
          
          
          Swal.fire({
          position: 'top-end',
          icon: 'success',
          title: 'Producto Ingresado Correctamente',
          showConfirmButton: false,
          timer: 3500
          })
                                
                               
        </script>";
       
      }else{
        $_POST=null;
        echo "<script>
          Swal.fire({
          position: 'top-end',
          icon: 'error',
          title: 'Producto no ingresado correctamente',
          showConfirmButton: false,
          timer: 3500
          })
          if(window.history.replaceState)
          {
              window.history.replaceState(null,null,'AdminDashboard.php');
              window.location.replace('AdminDashboard.php?Pagina=Productos')
          }else{
            window.location.replace('AdminDashboard.php?Pagina=Productos')                      
          }                   
        </script>";
      }
      
    break;
    case 'Eliminar':
      if (ControladorProductos::EliminarProducto($_POST)) {
        unset($_POST);
        echo "
          <script>
          if(window.history.replaceState)
          {
            window.history.replaceState(null,null,'AdminDashboard.php?Pagina=Productos')
            
          }
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Producto eliminado correctamente',
            showConfirmButton: false,
            timer: 3500
          }) 
          setTimeout(()=>{
            window.location.replace('AdminDashboard.php?Pagina=Productos')
          },1500) 
        </script>";
        
      }else{
        unset($_POST);
        echo " <script>
          if(window.history.replaceState)
          {
              window.history.replaceState(null,null,'AdminDashboard.php');
             
          }                     
               
          Swal.fire({
            position: 'top-end',
            icon: 'error',
            title: 'Producto no eliminado correctamente',
            showConfirmButton: false,
            timer: 3500
          })
          setTimeout(()=>{
            window.location.replace('AdminDashboard.php?Pagina=Productos')
          },3500) 
          </script>
        
        ";
      }
    break;
      default:
      echo "<script> window.location.replace('AdminDashboard.php?Pagina=Productos'</script>";
      break;
  }
  
   
  

}?>