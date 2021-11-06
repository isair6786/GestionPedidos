<!DOCTYPE html5>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Gestion de Pedidos</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!--=================Importando CSS ====================-->
    <link rel='stylesheet' type='text/css' media='screen' href='assets/css/main.css'>
    <link rel="shortcut icon" type="image/x-icon" href="images/fav.png" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--=================Importando JS ====================-->
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<body>
<div  class="container-fluid">
    <div class="row justify-content-center" style="">  
        <div  class="col-sm-12 col-md-12 col-lg-6" id="loginformRegister" >  
            <form  method="post" class="form" action="#" >
                <h1 class="mb-3">Registro</h1>
                <div class="form-group">
                    <label for="usuario" class="form-label">Usuario</label>     
                    <input name="Usuario" type="text" id="txtUsuario"  class="form-control textboxregister " placeholder="User" required>       
                    <div id="ValidaciontxtUsuario" style="color:red;font-size:12"></div>
                </div>
                <div class="form-group">
                    <label for="Password" class="form-label">Contraseña</label>         
                    <input name="Password" type="Password" id="txtPassword" class="form-control textboxregister" placeholder="Password">
                    <div id="ValidaciontxtPassword" style="color:red;font-size:12"></div>
                </div>
                <div class="form-group">
                    <label for="Correo" class="form-label">Correo</label>     
                    <input name="Correo" type="email" id="txtCorreo"  class="form-control textboxregister" placeholder="example@example.com">       
                    <div id="ValidaciontxtCorreo" style="color:red;font-size:12"></div>                    
                </div>
                <div class="form-group">
                    <label for="Nombres" class="form-label">Nombres</label>     
                    <input name="Nombres" type="text" id="txtNombres"  class="form-control textboxregister" placeholder="Nombres">       
                    <div id="ValidaciontxtNombres" style="color:red;font-size:12"></div>                
                </div>
                <div class="form-group">
                    <label for="Apellidos" class="form-label">Apellidos</label>     
                    <input name="Apellidos" type="text" id="txtApellidos"  class="form-control textboxregister" placeholder="Apellidos">       
                    <div id="ValidaciontxtApellidos" style="color:red;font-size:12"></div>                
                </div>
                <div class="form-group">
                    <label for="Direccion" class="form-label">Direccion</label>     
                    <textarea name="Direccion"  id="txtDireccion"  class="form-control textboxregister" placeholder="Direccion"></textarea>      
                    <div id="ValidaciontxtDireccion" style="color:red;font-size:12"></div>                
                </div>
                <div class="form-group">
                    <label for="Telefono" class="form-label">Telefono</label>     
                    <input name="Telefono" type="text" id="txtTelefono"  class="form-control textboxregister" placeholder="xxxx-xxxx">       
                    <div id="ValidaciontxtTelefono" style="color:red;font-size:12"></div>                
                </div>
                <div class="form-group">
                    <label for="DUI" class="form-label">DUI</label>     
                    <input name="DUI" type="text" id="txtDui"  class="form-control textboxregister" placeholder="xxxxxxxx-x">       
                    <div id="ValidaciontxtDui" style="color:red;font-size:12"></div>                
                </div>
                
                <input id="btnRegistrar" class="btn buttonform mb-3" type="submit" value="Registrar Usuario"></input>
                <br>
                <a href="Login.php?Pagina=Ingreso">Ya tienes cuenta? Ingresa acá</a>       
                <br> 
                <br> 
            </form>
         </div>
         <div style="height:100vh" class="col-sm-12 col-md-12 col-lg-6" id="contentRegister" >  
            <img class="imageregister" src="assets/images/Register.svg" alt="Registro">
         </div>
    </div> 
</div>
<script src="assets/js/Login/Registro.js"></script>
</body>
</html>

<?php 
/*Validamos si se ha intentado hacer un registro  */
if(isset($_POST["Usuario"])){
    //Realizamos el ingreso del usuario 
    require_once "Controlers/ctrLogin.php";
    $RegistroUsuario = ControladorLogin::RegistroNuevoUsuario($_POST);
    
    if($RegistroUsuario){
        echo "<script>
            LanzarModal('success','Registro Correcto','Usuario Registrado Correctamente')
            setTimeout(() => {
                window.location.replace('Login.php')
            }, 3500)
        </script>";
    }else{
        echo "<script>LanzarModal('danger','Registro no completado','Error en el registro , intente nuevamente')</script>";
    }
    
}
?>

