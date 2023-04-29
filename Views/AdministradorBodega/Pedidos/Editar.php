<?php 
if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]["Rol"]==3){  

  if(isset($_GET["Id"])){                
  require_once "Controlers/ctrProductos.php";            
  $datos = ControladorProductos::MostrarProductoPorId($_GET["Id"]);

?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard&Modulo=Productos">Productos</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
  </ol>
</nav>
<div  class="card shadow mb-4 col-sm-12">
       
        <div class="card-body">
            <form  method="post" class="form" action="#" enctype="multipart/form-data">
                <input name="Id" type="hidden" id="txtId"  class="form-control textboxregister " placeholder="ID" value="<?php echo $datos["IdProducto"]?>">       
                <textarea name="ImagenAntigua" style="display : none" id="txtImagenAntigua"  class="form-control textboxregister "><?php echo base64_encode(stripslashes($datos["Imagen"]))?></textarea>       
                
                <div class="form-group">
                  <label for="exampleFormControlTextarea1">Descripcion</label>
                  <textarea name="Descripcion" class="form-control" id="txtDescripcion" rows="3"><?php echo $datos["Descripcion"]?></textarea>
                  <div id="ValidaciontxtDescripcion" style="color:red;font-size:12"></div>
                </div>
                <div class="form-group">
                  <label for="File_Image">Cargue otra imagen si desea actualizar la imagen actual</label>
                  <input name="Imagen" type="file" class="form-control-file" accept="image/*" id="File_Image" max-size="1000">
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="txtStock">Stock</label>
                    <input name="Stock" type="number" class="form-control" id="txtStock" min="0" max="100" value="<?php echo $datos["Stock"]?>" placeholder="0">
                    <div id="ValidaciontxtStock" style="color:red;font-size:12"></div>  
                </div>
                  <div  class="form-group col-md-6">
                    <label for="txtStock">Precio</label>
                    <input name="Precio" type="number" class="form-control" id="txtPrecio" min="0.00" step=".01" max="100" value="<?php echo $datos["Precio"]?>" placeholder="0.00">
                    <div id="ValidaciontxtPrecio" style="color:red;font-size:12"></div> 
                </div>
                </div>
                <div class="form-group">
                  <label for="txtStock">Producto Activo</label>
                  <div class="custom-control custom-switch">
                    <?php if(!$datos["Activo"]){?>
                      <input name="txtActivo" type="checkbox" class="custom-control-input" id="customSwitch1" unchecked>
                      <label id="TextcustomSwitch1" class="custom-control-label" for="customSwitch1"></label>
                      
                    <?php } else {?>
                      <input name="txtActivo" type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                      <label id="TextcustomSwitch1" class="custom-control-label" for="customSwitch1"></label>
                      
                    <?php }?>
                    
                  </div>
                </div>
                
                <input id="btnRegistrar" class="btn btn-primary mb-3" type="submit" value="Editar Producto"></input>
                <br>
                
            </form>
         </div>
        
    </div> 
</div>
<script src="assets/js/Producto/Crear.js"></script>
</body>
</html>
 
<?php 
  }//Cierre de Carga de datos

  /*Validamos si se ha intentado hacer un registro  */
  if(isset($_POST["Descripcion"])){
    //Realizamos el ingreso del usuario 
    require_once "Controlers/ctrProductos.php";

    
    //Si no se cargo imagen, pasamos la imagen antigua
    if(($_FILES["Imagen"]["size"])==0){
        $RegistroUsuario = ControladorProductos::EditarProducto($_POST,$_POST["ImagenAntigua"],NULL);
    }//Si  se cargo imagen, pasamos la imagen nueva
    else{
        $RegistroUsuario = ControladorProductos::EditarProducto($_POST,Null,$_FILES);
    }
    
     
    if($RegistroUsuario){
        echo "<script>
            LanzarModal('success','Actualizacion Correcta','Producto Actualizado Correctamente')
            
        </script>";
    }else{
        echo "<script>LanzarModal('danger','Actualizacion Falló','Error en la actualizacion')</script>";
    }
    
  } 
  
}//Cierre validador de Usuario correcto
else{
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


?>