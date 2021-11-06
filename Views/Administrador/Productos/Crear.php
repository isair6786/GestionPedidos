<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard&Modulo=Productos">Productos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear</li>
  </ol>
</nav>
<div  class="card shadow mb-4 col-sm-12">
       
        <div class="card-body">
            <form  method="post" class="form" action="#" enctype="multipart/form-data">
                
               
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Descripcion</label>
                  <textarea name="Descripcion" class="form-control" id="txtDescripcion" rows="3"></textarea>
                  <div id="ValidaciontxtDescripcion" style="color:red;font-size:12"></div>
                </div>
                <div class="form-group">
                  <label for="File_Image">Seleccione la imagen del producto</label>
                  <input name="Imagen" type="file" class="form-control-file" accept="image/*" id="File_Image" max-size="1000"  required>
                  
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="txtStock">Stock</label>
                    <input name="Stock" type="number" class="form-control" id="txtStock" min="0" max="100" placeholder="0">
                    <div id="ValidaciontxtStock" style="color:red;font-size:12"></div>  
                </div>
                  <div  class="form-group col-md-6">
                    <label for="txtStock">Precio</label>
                    <input name="Precio" type="number" class="form-control" id="txtPrecio" min="0.00" step=".01" max="100" placeholder="0.00">
                    <div id="ValidaciontxtPrecio" style="color:red;font-size:12"></div> 
                </div>
                </div>
                <div class="form-group">
                  <label for="txtStock">Producto Activo</label>
                  <div class="custom-control custom-switch">
                    <input name="Activo" type="checkbox" class="custom-control-input" id="customSwitches">
                    <label class="custom-control-label" for="customSwitches" id="SwitchName"></label>
                  </div>
                </div>
                <input id="btnRegistrar" class="btn btn-primary mb-3" type="submit" value="Registrar Producto"></input>
                <br>
                
            </form>
         </div>
        
    </div> 
</div>
<script src="assets/js/Producto/Crear.js"></script>
</body>
</html>

<?php 
/*Validamos si se ha intentado hacer un registro  */
if(isset($_POST["Descripcion"])){
    //Realizamos el ingreso del usuario 
    require_once "Controlers/ctrProductos.php";
    
   
    $RegistroProducto = ControladorProductos::RegistroNuevoProducto($_POST,$_FILES);
    
    if($RegistroProducto){
        echo "<script>
            LanzarModal('success','Registro Correcto','Producto Registrado Correctamente')
            
        </script>";
    }else{
        echo "<script>LanzarModal('danger','Registro no completado','Error en el registro del producto, intente nuevamente')</script>";
    }
    
}
?>

