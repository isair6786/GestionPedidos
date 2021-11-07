<?php 
if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]["Rol"]==1){            

?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard&Modulo=Usuarios">Usuarios</a></li>
    <li class="breadcrumb-item active" aria-current="page">Eliminar</li>
  </ol>
</nav>
<script src="assets/js/Usuario/Eliminar.js"></script>
<div  class="card shadow mb-4 col-sm-12">
       
        <div class="card-body">
        <?php 
            
            if(isset($_GET["Id"])){
                
                require_once "Controlers/ctrUsuarios.php";

            
                $RegistroUsuario = ControladorUsuarios::EliminarUsuario($_GET["Id"]);

                if($RegistroUsuario){
                    echo "<script>
                        LanzarModal('success','Usuario Eliminado','Usuario Eliminado Correctamente')

                    </script>";
                }else{
                    echo "<script>LanzarModal('Error','Usuario no Eliminado','')</script>";
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

