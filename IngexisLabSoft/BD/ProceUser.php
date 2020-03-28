<?php
    // ========================================================
    include 'conexion.php';
    // ========================================================
    class procedimientos_BD{
        public function ExisteCorreo($correo){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = "";
            $query = "select correoExistente('".$correo."');";
            $resultado=$mysqli->query($query);
            while ($rows = $resultado->fetch_assoc())
            {
                $salida = $rows["correoExistente('".$correo."')"];
            }
            //============================
            return $salida;
            $resultado->free();
            //============================
        }
    }
    // ========================================================
    // $prueba = new procedimientos_BD();
    // $salida = $prueba->ExisteCorreo('Rtapiz@gmail.com');
    // var_dump($salida);
    // ========================================================
?>