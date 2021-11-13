<?php 
if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]["Rol"]==1){            
    if(isset($_GET["Id"])){                
    require_once "Controlers/ctrCuentas.php";  
    require_once "Controlers/ctrUsuarios.php";
    $usuarios = ControladorUsuarios::MostrarUsuarios();          
    $datos = ControladorCuentas::MostrarCuentaPorId($_GET["Id"]);
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard&Modulo=Cuentas">Cuentas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar Cuentas</li>
  </ol>
</nav>
<div  class="card shadow mb-4 col-sm-12">
       
        <div class="card-body">
            <form  method="post" class="form" action="#" >
                   <div class="form-group">
                        <input name="Id" type="hidden"  value="<?php echo $datos["IdCuenta"]?>" />       
                
                        <label for="inputGroupSelect01" class="form-label">Id Usuario</label>  
                        <select name="IdUsuario" class="custom-select" id="inputGroupSelect01" required>
                            <?php 
                            if($datos!=null){
                                foreach ($usuarios as $detalle ) {?>
                                <?php if($detalle["IdUsuario"]==$datos["IdUsuario"]){?>
                                    <option selected value="<?php echo($detalle["IdUsuario"])?>"><?php  echo($detalle["IdUsuario"])?> - <?php  echo($detalle["NombreUsuario"])?></option>
                                <?php }else{?>  
                                    <option value="<?php echo($detalle["IdUsuario"])?>"><?php  echo($detalle["IdUsuario"])?> - <?php  echo($detalle["NombreUsuario"])?></option>
                                <?php }?>  
                            <?php }
                            }else{?>
                                <option selected value="null">No hay Usuarios Creados</option>
                            <?php }?>
                        </select>
                    </div>
                                    
                    <div class="form-group">
                        <label for="Saldo" class="form-label">Saldo</label>     
                        <input name="Saldo" type="number" id="txtSaldo" min="0.00" step="0.01" class="form-control textboxregister" value="<?php echo($datos["Saldo"])?>" placeholder="0.00">       
                        <div id="ValidaciontxtSaldo" style="color:red;font-size:12"></div>                
                    </div>
                    <div class="form-group">
                        <label for="Saldo" class="form-label">Cargar a tarjeta </label>     
                        <input name="Tarjeta" type="text" id="txtTarjeta" class="form-control textboxregister" placeholder="xxxxxxxxxxxxxx" >       
                        <div id="ValidaciontxtTarjeta" style="color:red;font-size:12"></div>                
                    </div>
                    <div class="form-group">
                    
                    <label for="" class="form-label">Cuenta Activa</label>     
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

                <input id="btnRegistrar" class="btn btn-primary mb-3" type="submit" value="Editar Cuenta"></input>
                <br>
                
            </form>
         </div>
        
    </div> 
</div>
<script src="assets/js/Cuentas/Crear.js"></script>
</body>
</html>

<?php 
}//Fin carga de datos
    /*Validamos si se ha intentado hacer un registro  */
    if(isset($_POST["IdUsuario"])){
        //Realizamos el ingreso del usuario 
        require_once "Controlers/ctrCuentas.php";
        
        $EditarCuenta = ControladorCuentas::EditarCuenta($_POST);

        if($EditarCuenta){
            echo "<script>
                LanzarModal('success','Actualizacion Correcta','Cuenta Actualizada Correctamente')

            </script>";
        }else{
            echo "<script>LanzarModal('danger','Actualizacion Falló','Error en la actualizacion, intente nuevamente')</script>";
        }

    }
}//fin validacion de usuario 
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