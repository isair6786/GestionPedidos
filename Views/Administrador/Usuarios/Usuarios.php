<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="Login.php?Pagina=Dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
  </ol>
</nav>

<a class="btn btn-primary mb-2" href="Login.php?Pagina=Dashboard&Modulo=Usuarios&Accion=Crear" role="button">
<i class="fas fa-user-plus"></i> Crear Usuario 
</a>
<div  class="card shadow mb-4 col-sm-12">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Usuarios</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Acciones</th>
                          <th>Nombre de Usuario</th>
                          <th>Nombres</th>
                          <th>Apellidos</th>
                          <th>Direccion</th>
                          <th>Telefono</th>
                          <th>Dui</th>
                          <th>Email</th>
                          <th>Activo</th>
                          
                      </tr>
                  </thead>
                    
                  <tbody>
                     <!-- Llenando tabla  -->
                    <?php  
                      require_once "Controlers/ctrUsuarios.php";
                      $datos = ControladorUsuarios::MostrarUsuarios();
                      if($datos!=null){
                      foreach ($datos as $clave ) {
                        
                      ?>
                      <tr>
                      <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a   class="btn btn-warning mr-1 rounded" href="Login.php?Pagina=Dashboard&Modulo=Usuarios&Accion=Editar&Id=<?php echo($clave["IdUsuario"]); ?>" role="button">
                              <i class="fas fa-pen-square"></i>
                            </a>
                             <button class="btn btn-danger mr-1 rounded" onclick="<?php echo "LanzarModalEliminar('warning', 'Eliminar Usuario','Esta accion no puede revertirse',".$clave["IdUsuario"].")"; ?>">
                              <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                          </div> 
                        </td>
                        <td> <?php echo($clave["NombreUsuario"]); ?></td>
                        <td><?php echo($clave["Nombres"]); ?></td>
                        <td><?php echo($clave["Apellidos"]); ?></td>
                        <td><?php echo($clave["Direccion"]); ?></td>
                        <td><?php echo( $clave["Telefono"]); ?></td>
                        <td><?php echo( $clave["Dui"]); ?></td>
                        <td><?php echo( $clave["Email"]); ?></td>
                        <td><?php 
                            if($clave["Activo"]){
                              echo ("Activo");
                            }else{
                              echo ("Inactivo");
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
  <script src="assets/js/Usuario/Eliminar.js"></script>
     