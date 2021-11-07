<?php 
if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]["Rol"]==1){
    require_once "Controlers/ctrUsuarios.php";
    $datos = ControladorUsuarios::MostrarUsuarios();
 ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard&Modulo=Cuentas">Cuentas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Crear Cuenta</li>
  </ol>
</nav>
<div  class="card shadow mb-4 col-sm-12">
       
        <div class="card-body">
            <form  method="post" class="form" action="#" >
                
               
                <div class="form-group">
                    <label for="inputGroupSelect01" class="form-label">Id Usuario</label>  
                    <select name="IdUsuario" class="custom-select" id="inputGroupSelect01" required>
                        <?php 
                            
                            
                            if($datos!=null){
                            foreach ($datos as $clave ) {
                        
                        ?>
                        <option value="<?php echo($clave["IdUsuario"])?>"><?php  echo($clave["IdUsuario"])?> - <?php  echo($clave["NombreUsuario"])?></option>
                    
                        <?php }
                            }else{?>
                            <option selected value="null">No hay Usuarios Creados</option>
                        <?php }?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="Saldo" class="form-label">Saldo</label>     
                    <input name="Saldo" type="number" id="txtSaldo" min="0.00" step="0.01" class="form-control textboxregister" placeholder="0.00">       
                    <div id="ValidaciontxtSaldo" style="color:red;font-size:12"></div>                
                </div>
                <div class="form-group">
                    
                    <label for="" class="form-label">Cuenta Activo</label>     
                    <div class="custom-control custom-switch">
                        <input name="txtActivo" type="checkbox" class="custom-control-input" id="customSwitch1" unchecked>
                        <label id="TextcustomSwitch1" class="custom-control-label" for="customSwitch1"></label>
                    </div>
                                 
                </div>
                
                
                <input id="btnRegistrar" class="btn btn-primary mb-3" type="submit" value="Registrar Cuenta"></input>
                <br>
                
            </form>
         </div>
        
    </div> 
</div>
<script src="assets/js/Cuentas/Crear.js"></script>
</body>
</html>

<?php 
/*Validamos si se ha intentado hacer un registro  */
    if(isset($_POST["IdUsuario"])){
        //Realizamos el ingreso del usuario 
        require_once "Controlers/ctrCuentas.php";
        
        
        $RegistroCuenta = ControladorCuentas::RegistroNuevaCuenta($_POST);
        
        if($RegistroCuenta){
            echo "<script>
                LanzarModal('success','Registro Correcto','Cuenta Registrada Correctamente')
                
            </script>";
        }else{
            echo "<script>LanzarModal('danger','Registro no completado','Error en el registro,intente nuevamente')</script>";
        }
        
    }
}//Cierre validacion de usuario 
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

