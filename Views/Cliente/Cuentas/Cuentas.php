<?php 
if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]["Rol"]==2){
  require_once "Controlers/ctrCuentas.php";
  $datos = ControladorCuentas::MostrarCuentasPorUsuario($_SESSION["Usuario"]["idUsuario"]);
         
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Cuentas</li>
  </ol>
</nav>

<a class="btn btn-primary mb-2" href="Login.php?Pagina=Dashboard&Modulo=Cuentas&Accion=Crear" role="button">
<i class="fas fa-user-plus"></i> Añadir Cuenta 
</a>
<div  class="card shadow mb-4 col-sm-12">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Mis Cuentas</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Acciones</th>
                          <th>IdCuenta</th>
                          <th>Saldo</th>
                          <th>Esta Activa</th>
                          
                      </tr>
                  </thead>
                    
                  <tbody>
                     <!-- Llenando tabla  -->
                    <?php  
                      
                      if($datos!=null){
                      foreach ($datos as $clave ) {
                        
                      ?>
                      <tr>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a   class="btn btn-warning mr-1 rounded" href="Login.php?Pagina=Dashboard&Modulo=Cuentas&Accion=Editar&Id=<?php echo($clave["IdCuenta"]); ?>"
                             role="button" data-toggle="tooltip" title="Aumentar Cuenta">
                                <i class="fas fa-dollar-sign"></i>
                            </a>
                            <button data-toggle="tooltip" title="Activar Cuenta" class="btn btn-success mr-1 rounded" onclick="<?php echo "LanzarModalActivar('info', 'Activar Cuenta','Desea Activar nuevamente esta cuenta?',".$clave["IdCuenta"].")"; ?>">                              
                              <i class="fas fa-plus-square"></i>
                            </button>
                             <button title="Desactivar Cuenta" class="btn btn-danger mr-1 rounded" onclick="<?php echo "LanzarModalEliminar('warning', 'Desactivar Cuenta','Si se desactiva,esta cuenta no podrá utilizarse',".$clave["IdCuenta"].")"; ?>">                              
                             <i class="fas fa-minus-circle"></i>
                            </button>
                          </div> 
                        </td>
                        <td> <?php echo($clave["IdCuenta"]); ?></td>
                        <td><?php echo($clave["Saldo"]); ?></td>
                        <td><?php 
                            if($clave["Activo"]){
                              echo ("Activa");
                            }else{
                              echo ("Inactiva");
                            } ?>
                        </td>
                       
                      </tr>  
                    <?php }
                    } ?>  
                    <!--Fin Llenar Tabla  -->
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <script src="assets/js/Cuentas/Eliminar.js"></script>
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