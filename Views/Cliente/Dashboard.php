<?php 
if(isset($_SESSION["Usuario"])&&$_SESSION["Usuario"]["Rol"]==2){
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Super Market - Cliente
    </title>

    
    <!-- ===========IMPORTANDO CSS=============== -->
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/fav.png" />
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- ===========IMPORTANDO JS=============== -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.9/dist/sweetalert2.all.min.js"></script>
    

    

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-box"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Super Market- Cliente</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="Login.php?Pagina=Dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pedidos
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-clipboard-check"></i>    
                
                    <span>Pedidos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestionar Pedidos</h6>
                        <a class="collapse-item" href="Login.php?Pagina=Dashboard&Modulo=Pedidos&Accion=VerCarrito">Realizar Pedido</a>
                        <a class="collapse-item" href="Login.php?Pagina=Dashboard&Modulo=Pedidos">Ver mis pedidos</a>
                        
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-fw fa-shopping-bag"></i>    
                
                    <span>Productos</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestionar Productos</h6>
                      
                        <a class="collapse-item" href="Login.php?Pagina=Dashboard&Modulo=Productos">Manejo de Productos</a>
                    </div>
                </div>
            </li>
            
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-clipboard-check"></i>    
                
                    <span>Cuentas</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestionar Cuentas</h6>
                        <a class="collapse-item" href="Login.php?Pagina=Dashboard&Modulo=Cuentas">Manejo de Cuentas</a>
                        
                    </div>
                </div>
            </li>

            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                
            </div>

          


            <!-- Sidebar Toggler (Sidebar) -->
            <div  class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

          
           

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <button style="border : none ;background:none" onclick="VerPreviadeCarrito()" class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-shopping-cart fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span id="ContadorAlertas" class="badge badge-danger badge-counter">#</span>
                            </button>
                            <!-- Dropdown - Alerts -->
                            <div id="ItemsCarrito" class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Carro de Compras
                                </h6>
                                
                                    
                                
                                <a class="dropdown-item text-center small text-gray-500" href="Login.php?Pagina=Dashboard&Modulo=Pedidos&Accion=VerCarrito">Mostrar todo el carrito</a>
                            </div>
                        </li>

                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Bienvenido, <?php echo ( $_SESSION["Usuario"]["nombre"]) ?></span>
                                <img class="img-profile rounded-circle" src="assets/images/undraw_profile.svg">
                                <input type="hidden" id="txtNombreUsuario" value="<?php echo ( $_SESSION["Usuario"]["nombre"]) ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                
                               
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Cerrar Sesion
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <!-- INICIO CONTENIDO -->
                <?php 
                $llamarPaginas = new ControladorClienteDashboard();
                    if(isset($_GET["Modulo"])){

                        require_once "Controlers/ctrClienteDashboard.php";

                        
                        switch ($_GET["Modulo"]) {
                           
                            case 'Productos':
                                if(isset($_GET["Accion"])){
                                    $llamarPaginas ->MostrarModulo($_GET["Modulo"],$_GET["Accion"]);
                                }else{
                                    $llamarPaginas ->MostrarModulo($_GET["Modulo"],"Productos");
                                }
                                
                                break;
                            case 'Cuentas':
                                    if(isset($_GET["Accion"])){
                                        $llamarPaginas ->MostrarModulo($_GET["Modulo"],$_GET["Accion"]);
                                    }else{
                                        $llamarPaginas ->MostrarModulo($_GET["Modulo"],"Cuentas");
                                    }
                                    
                                    break; 
                            case 'Pedidos':
                                    if(isset($_GET["Accion"])){
                                        $llamarPaginas ->MostrarModulo($_GET["Modulo"],$_GET["Accion"]);
                                    }else{
                                        $llamarPaginas ->MostrarModulo($_GET["Modulo"],"Pedidos");
                                    }
                                        
                                        break;              
                            
                            default:
                                
                                break;
                        }
                    }else{
                        $llamarPaginas ->MostrarModulo("Productos","Productos");
                    }
                ?>     
                
               
                <!-- FIN CONTENIDO -->
                   
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Gestion de Pedidos 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Listo Para Cerrar Sesion?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">De click en "Cerrar Sesion" para eliminar la sesion actual.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="Login.php?Pagina=CerrarSesion">Cerrar Sesion</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

   
    <!-- Page level plugins -->
    <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="assets/js/Producto/CarritoCompras.js"></script>
    <script src="assets/js/demo/datatables-demo.js"></script>

</body>

</html>
<?php
}else{
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