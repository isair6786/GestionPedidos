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
<div  class="container">
         <div class="row">
             <div class="col-sm-12 col-md-12 col-lg-6" id="ImageLogin" >
               
                <div class="row">
                <img src="assets/images/fondologinprincipal.svg" class="imagelogin"/>
                </div>
                <div  class="row">
                    
                    <img  src="assets/images/persona.svg" class="imagelogintwo"/>
                </div>
             </div>
             <div style="width: 100vw;" class="col-sm-12 col-md-12 col-lg-6" id="loginform" >
                <div class="row">
                    <div class="col-12">
                        
                        <form style="text-align: center;" method="POST" class="form" action="#" >
                            <h2 class="mb-3">Ingresar</h2>
                            <h6 class="mb-3 text-danger"><small> Llene todos los campos antes de ingresar</small></h6>
                            <div class="form-group">
                                
                                <input name="NombreUsuario" type="text" id="txtUsuario"  class="form-control textboxlogin" placeholder="User">
                                <div id="ValidaciontxtUsuario" style="color:red;font-size:12"></div>     
                            </div>
                            <div class="form-group">
                                
                                <input name="Password" type="password" id="txtPassword"  class="form-control textboxlogin" placeholder="Password">
                                <div id="ValidaciontxtPassword" style="color:red;font-size:12"></div> 
                            </div>
                            <input id="btnIngresar" class="btn buttonform mb-3" type="submit" value="Ingresar"/>
                            <br>
                            <a href="Login.php?Pagina=Registro">No tienes cuenta? Registrate acá</a>
                            
                            
                        </form>
                    
                    </div>
                </div>
             </div>
         </div>
    </div>
<script src="assets/js/Login/Login.js"></script>
</body>
</html>
<?php

if(isset($_POST["NombreUsuario"])){
    //Realizamos el ingreso del usuario 
    require_once "Controlers/ctrLogin.php";
    $IngresoValido = ControladorLogin::IngresoUsuario($_POST);
    if($IngresoValido){
        echo "<script>
            LanzarModal('success','Ingreso Correcto','Se Redigirá en breve a la pagina principal');
            setTimeout(() => {
                window.location.replace('Login.php?Pagina=Dashboard');
            }, 3500)
        </script>";
    }else{
        echo "<script>LanzarModal('error','Usuario no valido','Error en el usuario o contraseña')</script>";
    }
    
}


?>



    