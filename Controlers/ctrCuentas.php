<?php 

require_once "Models/mdlCuentas.php";
class ControladorCuentas
{
    
    //metodo para Ingresar Productp
    static public function RegistroNuevaCuenta($datos)
    { 
        if($datos["txtActivo"]=="on"){
            $datos["txtActivo"]= true;
        }else{
            $datos["txtActivo"]= false;
        }
        $SinError = ModeloCuentas::Registrar($datos);
        return $SinError;
                
    }
    //metodo para Editar Producto
    static public function EditarCuenta($datos)
    {   
        if($datos["txtActivo"]=="on"){
            $datos["txtActivo"]= true;
        }else{
            $datos["txtActivo"]= false;
        }
        $SinError = ModeloCuentas::Editar($datos);
        return $SinError;
                        
    }
    static public function EliminarCuenta($id)
    {       
        $SinError = ModeloCuentas::Eliminar($id);
        return $SinError;                
    }

    static public function MostrarCuentas()
    {       
        $SinError = ModeloCuentas::SeleccionarCuentas();
        return $SinError;
    }
    static public function MostrarCuentaPorId($id)
    {       
        $SinError = ModeloCuentas::SeleccionarCuentasPorID($id);
        return $SinError;
    }
    static public function MostrarCuentasActivas()
    {       
        $SinError = ModeloCuentas::SeleccionarCuentasActivas();
        return $SinError;              
    }

}
