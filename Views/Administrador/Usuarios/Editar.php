<?php             
if(isset($_GET["Id"])){                
require_once "Controlers/ctrUsuarios.php";            
$datos = ControladorUsuarios::MostrarUsuarioPorId($_GET["Id"]);
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard&Modulo=Usuarios">Usuarios</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar</li>
  </ol>
</nav>
<div  class="card shadow mb-4 col-sm-12">
       
        <div class="card-body">
            <form  method="post" class="form" action="#" >
                <input name="Id" type="hidden" id="txtId"  class="form-control textboxregister " placeholder="User" value="<?php echo $datos["IdUsuario"]?>">       
                    
                <div class="form-group">
                    <label for="usuario" class="form-label">Usuario</label>     
                    <input name="Usuario" type="text" id="txtUsuario"  class="form-control textboxregister " placeholder="User" value="<?php echo $datos["NombreUsuario"]?>" required>       
                    <div id="ValidaciontxtUsuario" style="color:red;font-size:12"></div>
                </div>
                <div class="form-group">
                    <label for="Password" class="form-label">Contraseña</label>         
                    <input name="Password" type="Password" id="txtPassword" class="form-control textboxregister" value="<?php echo $datos["Password"]?>" placeholder="Password">
                    <div id="ValidaciontxtPassword" style="color:red;font-size:12"></div>
                </div>
                <div class="form-group">
                    <label for="inputGroupSelect01" class="form-label">Rol</label>  
                    <select name="txtRol" class="custom-select" id="inputGroupSelect01">
                    <?php switch ($datos["ROL"]) {
                        case 1:
                            echo '
                            <option selected value="1">Administrador</option>
                            <option value="2">Cliente</option>
                            <option value="3">Bodega</option>
                            ';
                            break;
                        case 2:
                            echo '
                            <option  value="1">Administrador</option>
                            <option selected value="2">Cliente</option>
                            <option value="3">Bodega</option>
                            ';
                            break; 
                        case 3:
                            echo '
                            <option  value="1">Administrador</option>
                            <option  value="2">Cliente</option>
                            <option selected value="3">Bodega</option>
                            ';  
                            break;        
                    }?>"
                        
                  </select>
                </div>
                
                <div class="form-group">
                    <label for="Correo" class="form-label">Correo</label>     
                    <input name="Correo" type="email" id="txtCorreo"  class="form-control textboxregister" value="<?php echo $datos["Email"]?>" placeholder="example@example.com">       
                    <div id="ValidaciontxtCorreo" style="color:red;font-size:12"></div>                    
                </div>
                <div class="form-group">
                    <label for="Nombres" class="form-label">Nombres</label>     
                    <input name="Nombres" type="text" id="txtNombres"  class="form-control textboxregister" value="<?php echo $datos["Nombres"]?>" placeholder="Nombres">       
                    <div id="ValidaciontxtNombres" style="color:red;font-size:12"></div>                
                </div>
                <div class="form-group">
                    <label for="Apellidos" class="form-label">Apellidos</label>     
                    <input name="Apellidos" type="text" id="txtApellidos"  class="form-control textboxregister"  value="<?php echo $datos["Apellidos"]?>" placeholder="Apellidos">       
                    <div id="ValidaciontxtApellidos" style="color:red;font-size:12"></div>                
                </div>
                <div class="form-group">
                    <label for="Direccion" class="form-label">Direccion</label>     
                    <textarea name="Direccion"  id="txtDireccion"  class="form-control textboxregister"  placeholder="Direccion"><?php echo $datos["Direccion"]?></textarea>      
                    <div id="ValidaciontxtDireccion" style="color:red;font-size:12"></div>                
                </div>
                <div class="form-group">
                    <label for="Telefono" class="form-label">Telefono</label>     
                    <input name="Telefono" type="text" id="txtTelefono"  class="form-control textboxregister" value="<?php echo $datos["Telefono"]?>" placeholder="xxxx-xxxx">       
                    <div id="ValidaciontxtTelefono" style="color:red;font-size:12"></div>                
                </div>
                <div class="form-group">
                    <label for="DUI" class="form-label">DUI</label>     
                    <input name="DUI" type="text" id="txtDui"  class="form-control textboxregister" value="<?php echo $datos["Dui"]?>" placeholder="xxxxxxxx-x">       
                    <div id="ValidaciontxtDui" style="color:red;font-size:12"></div>                
                </div>
                <div class="form-group">
                    
                    <label for="" class="form-label">Usuario Activo</label>     
                    <div class="custom-control custom-switch">
                        <?php if($datos["Activo"]){?>
                            <input name="txtActivo" type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                            <label id="TextcustomSwitch1" class="custom-control-label" for="customSwitch1"></label>
                        <?php } else {?>
                            <input name="txtActivo" type="checkbox" class="custom-control-input" id="customSwitch1" unchecked>
                            <label id="TextcustomSwitch1" class="custom-control-label" for="customSwitch1"></label>
                        <?php }?>
                    </div>
                                 
                </div>
                
                
                <input id="btnRegistrar" class="btn btn-primary mb-3" type="submit" value="Editar Usuario"></input>
                <br>
                
            </form>
         </div>
        
    </div> 
</div>
<script src="assets/js/Usuario/Crear.js"></script>
</body>
</html>

<?php 
}
/*Validamos si se ha intentado hacer un registro  */
if(isset($_POST["Usuario"])){
    //Realizamos el ingreso del usuario 
    require_once "Controlers/ctrUsuarios.php";
  
    $RegistroUsuario = ControladorUsuarios::EditarUsuario($_POST);
     
    if($RegistroUsuario){
        echo "<script>
            LanzarModal('success','Actualizacion Correcta','Usuario Actualizado Correctamente')
            
        </script>";
    }else{
        echo "<script>LanzarModal('danger','Actualizacion Falló','Error en la actualizacion, nombre de usuario ya existente , intente nuevamente')</script>";
    }
    
}
?>