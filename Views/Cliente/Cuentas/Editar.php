<?php 
if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]["Rol"]==2){            
    if(isset($_GET["Id"])){                
    require_once "Controlers/ctrCuentas.php";          
    $datos = ControladorCuentas::MostrarCuentaPorId($_GET["Id"]);
    if($datos["IdUsuario"]==$_SESSION["Usuario"]["idUsuario"]){

    
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard&Modulo=Cuentas">Cuentas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Aumentar Saldo</li>
  </ol>
</nav>
<div  class="card shadow mb-4 col-sm-12">
       
        <div class="card-body">
            <form  method="post" class="form" action="#" >
                    <input name="IdCuenta" type="hidden"  value="<?php echo $datos["IdCuenta"]?>" /> 
                    
                               
                    <div class="form-group">
                        <label for="Saldo" class="form-label">Saldo A Añadir</label>     
                        <input name="SaldoAñadir" type="number" id="txtSaldo" min="0.00" step="0.01" class="form-control textboxregister" value="0.00" placeholder="0.00" >       
                        <div id="ValidaciontxtSaldo" style="color:red;font-size:12"></div>                
                    </div>
                    <div class="form-group">
                        <label for="Saldo" class="form-label">Agregue tarjeta </label>     
                        <input name="Tarjeta" type="text" id="txtTarjeta" class="form-control textboxregister" placeholder="xxxxxxxxxxxxxx" >       
                        <div id="ValidaciontxtTarjeta" style="color:red;font-size:12"></div>                
                    </div>
                <br>
                <input id="btnRegistrar" class="btn btn-primary mb-3" type="submit" value="Aumentar Saldo"></input>
                <br>
                
            </form>
         </div>
        
    </div> 
</div>
<script src="assets/js/Cuentas/Editar.js"></script>
</body>
</html>

<?php 
}//Fin carga de datos
    /*Validamos si se ha intentado hacer un registro  */
    if(isset($_POST["IdCuenta"])){
        //Realizamos el ingreso del usuario 
        require_once "Controlers/ctrCuentas.php";
        
        $EditarCuenta = ControladorCuentas::AumentarCuenta($_POST);

        if($EditarCuenta){
            echo "<script>
                LanzarModal('success','Actualizacion Correcta','Cuenta Aumentada Correctamente')

            </script>";
        }else{
            echo "<script>LanzarModal('danger','Actualizacion Falló','Error en la actualizacion, intente nuevamente')</script>";
        }

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