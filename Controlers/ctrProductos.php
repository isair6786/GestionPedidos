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
        if($datos["txtActivo"]=="on"){
            $datos["txtActivo"]= true;
        }else{
            $datos["txtActivo"]= false;
        }
        $SinError = ModeloProductos::Registrar($datos);
        return $SinError;
        
                
    }
    //metodo para Editar Producto
    static public function EditarProducto($datos,$ImagenAntigua,$ImagenNueva)
    {   
       
        if($datos["txtActivo"]=="on"){
            $datos["txtActivo"]= true;
        }else{
            $datos["txtActivo"]= false;
        }

        if($ImagenNueva!=null){
            $revisar = getimagesize($ImagenNueva["Imagen"]["tmp_name"]);
            if($revisar !== false){
                $image = $ImagenNueva["Imagen"]["tmp_name"];
                $imgContenido = addslashes(file_get_contents($image));
                $datos["Imagen"] = $imgContenido;
            }
            $SinError = ModeloProductos::Editar($datos,$datos["txtActivo"],null);
        }else{
            $ImagenAntigua = addslashes(base64_decode($ImagenAntigua));
            $SinError = ModeloProductos::Editar($datos,$datos["txtActivo"],$ImagenAntigua);
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
    static public function MostrarProductosActivos()
    {       
        require_once "Models/mdlProductos.php";
        $Consulta = ModeloProductos::SeleccionarProductosActivos();
        return($Consulta);               
    }

}
