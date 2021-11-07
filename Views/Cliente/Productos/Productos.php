<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Productos</li>
  </ol>
</nav>

<div  class="card shadow mb-4 ">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
        </div>
        <div class="card-body" >
            <div class="table-responsive col-10" style="margin: 0 auto;" >
                <table class="table table-bordered table-striped " id="dataTable" cellspacing="0">
                  <thead class="thead-dark">
                      <tr>
                          <th>Detalle Producto</th> 
                      </tr>
                  </thead>
                    
                  <tbody>
                     <!-- Llenando tabla  -->
                    <?php  
                      require_once "Controlers/ctrProductos.php";
                      $datos = ControladorProductos::MostrarProductosActivos();
                      if($datos!=null){
                      foreach ($datos as $clave ) {
                        
                      ?>
                      <tr>
                      
                        <td> 
                          <div class="card mb-3">
                          
                              <div class="row">
                                <div class="col-sm-12 col-lg-6" style="text-align:center">
                                <?php echo '<img style="width:250px" class=" shadow-sm rounded" src="data:image/jpeg;base64,'.base64_encode( stripslashes($clave["Imagen"] )).'"/>';?>
                                </div>
                                
                                <div class="col-sm-12 col-lg-6">
                                  <div class="card-body">
                                    <h4 class="card-title text-dark"><strong><?php echo $clave["Descripcion"] ?></strong></h4>
                                    <p class="card-text">
                                        <input type="hidden" id="<?php echo "txtDescripcionId".$clave["IdProducto"] ?>" value="<?php echo $clave["Descripcion"] ?>">
                                      <div class="form-row">
                                        <div class="form-group col-md-6">
                                          <strong>Precio: $<?php echo $clave["Precio"] ?></strong>
                                        </div>
                                        <div class="col-md-6" style="display:inline !important" >
                                          Cantidad
                                          <input name="Stock" type="number" class="form-control" id="<?php echo "txtCantidadId".$clave["IdProducto"] ?>" min="1" max="<?php if($clave["Stock"]>20){echo 20;}else{echo $clave["Stock"];}?>" value="1" placeholder="0">
                                        </div>
                                       
                                      </div>
                                      <p class="card-text">
                                        <?php echo '<button onclick="AddCarrito('.$clave["IdProducto"] .','.$clave["Precio"] .')" class="btn btn-success" role="button">Añadir al carrito</button>'?>
                                      </p>
                                  </div>
                                </div>
                              </div>
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
<?php
 