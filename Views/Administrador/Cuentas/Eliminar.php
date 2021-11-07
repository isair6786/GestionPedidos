<?php 
if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]["Rol"]==1){            

?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard&Modulo=Cuentas">Cuentas</a></li>
    <li class="breadcrumb-item active" aria-current="page">Eliminar Cuentas</li>
  </ol>
</nav>
<script src="assets/js/Cuentas/Eliminar.js"></script>
<div  class="card shadow mb-4 col-sm-12">
       
        <div class="card-body">
        <?php 
            
            if(isset($_GET["Id"])){
                
                require_once "Controlers/ctrCuentas.php";

            
                $EliminarCuenta = ControladorCuentas::EliminarCuenta($_GET["Id"]);

                if($EliminarCuenta){
                    echo "<script>
                        LanzarModal('success','Cuenta Desactivada','Cuenta Desactivada Correctamente')

                    </script>";
                }else{
                    echo "<script>LanzarModal('Error','Cuenta no Desactivada','')</script>";
                }

            }
        ?>

         </div>
        
    </div> 
</div>

</body>
</html>
<?php 
} 
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

