<?php 

require_once "Models/mdlProductos.php";
class ControladorProductos
{
    
    //metodo para Ingresar Productp
    static public function RegistroNuevoProducto($datos,$Imagen)
    {       
        
        
        $revisar = getimagesize($Imagen["Imagen"]["tmp_name"]);
        if($revisar !== false){
            $image = $Imagen["Imagen"]["tmp_name"];
            $imgContenido = addslashes(file_get_contents($image));
            $datos["Imagen"] = $imgContenido;
        }
        if($datos["Activo"]=="on"){
            $datos["Activo"]= true;
        }else{
            $datos["Activo"]= false;
        }
        $SinError = ModeloProductos::Registrar($datos);
        return $SinError;
        
                
    }
    //metodo para Editar Producto
    static public function EditarProducto($datos,$ImagenAntigua,$ImagenNueva)
    {   
        if($datos["Activo"]=="on"){
            $Activo = true;
          }else{
            $Activo = false;
          } 

        if($ImagenNueva!=null){
            $revisar = getimagesize($ImagenNueva["Imagen"]["tmp_name"]);
            if($revisar !== false){
                $image = $ImagenNueva["Imagen"]["tmp_name"];
                $imgContenido = addslashes(file_get_contents($image));
                $datos["Imagen"] = $imgContenido;
            }
            $SinError = ModeloProductos::Editar($datos,$Activo,null);
        }else{
           
            $SinError = ModeloProductos::Editar($datos,$Activo,$ImagenAntigua);
        }  
        
     
        return $SinError;
                        
    }
    static public function EliminarProducto($id)
    {       
        
        $SinError = ModeloProductos::Eliminar($id);
        return $SinError;
                        
    }

    static public function MostrarProductos()
    {       
        
        $Consulta = ModeloProductos::SeleccionarProductos();
        return($Consulta);               
    }
    static public function MostrarProductoPorId($id)
    {       
        
        $Consulta = ModeloProductos::SeleccionarProductosPorID($id);
        return($Consulta);               
    }
    static public function MostrarProductoUsuarioFinal()
    {       
        require_once "Models/mdlProductos.php";
        $Consulta = ModeloProductos::SeleccionarProductos();
        return($Consulta);               
    }

}
