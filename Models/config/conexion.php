<?php

    class RealizarConexion
    {
        static public function ConectarBaseDatos(){
            $conexion= new PDO("mysql:host=localhost;port=33065;dbname=gestionpedidos",
                        "root",
                        ""
                        );
            return $conexion;
        }
    }



?>