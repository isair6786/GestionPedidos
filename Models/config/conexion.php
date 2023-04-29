<?php

    class RealizarConexion
    {
        static public function ConectarBaseDatos(){
            $conexion= new PDO("mysql:host=127.0.0.1;dbname=gestionpedidos",
                        "root",
                        ""
                        );
            return $conexion;
        }
    }



?>