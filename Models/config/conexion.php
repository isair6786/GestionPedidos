<?php

    class RealizarConexion
    {
        static public function ConectarBaseDatos(){
            $conexion= new PDO("mysql:host=127.0.0.1;dbname=id17924046_gestionpedidos",
                        "root",
                        ""
                        );
            return $conexion;
        }
    }



?>