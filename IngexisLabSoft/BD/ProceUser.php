<?php
    // ========================================================
    include 'conexion.php';
    // ========================================================
    class procedimientos_BD{
        //#####################################################
        public function ExisteCorreo($correo){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = "";
            $query = "select correoExistente('".$correo."');";
            $resultado=$mysqli->query($query);
            $rows = $resultado->fetch_array();
            $salida = $rows[0];
            //============================
            return $salida;
            $resultado->free();
            //============================
        }
        //#####################################################
        public function ConfirmarContraseña($correo, $contraseña){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = "";
            $resultado = mysqli_query($mysqli, "select verificaContra('".$correo."', '".$contraseña."');");
            $rows = $resultado->fetch_array();
            $salida = $rows[0];
            //============================
            return $salida;
            $resultado->free();
            //============================
        }
        //#####################################################
        public function Id_por_Correo($correo){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = "";
            $resultado = mysqli_query($mysqli, "select id_by_correo('".$correo."');");
            $rows = $resultado->fetch_array();
            $salida = $rows[0];
            //============================
            return $salida;
            $resultado->free();
            //============================
        }
        //#####################################################}
        public function InfoLogin($correo){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = array();
            $resultado = mysqli_query($mysqli, "call inf_log('".$correo."');");
            $rows = $resultado->fetch_array();
            $salida[0] = $rows[0];
            $salida[1] = $rows[1];
            //============================
            return $salida;
            $resultado->free();
            //============================
        }
        //#####################################################
        public function AgregarUsuario( 
            $correo,    $contra,    $img,       $nom1, 
            $nom2,      $ape1,      $ape2,      $apodo, 
            $num,       $puesto,    $curp,      $rfc,
            $calleP,    $entre,     $numCasas,  $col, 
            $codPost
        ){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL agregaUsuario('".$correo."', '".$contra."', '".$img."', '".$nom1."', '".$nom2."', '".$ape1."', '".$ape2."', '".$apodo."', '".$num."', '".$puesto."', '".$curp."', '".$rfc."', '".$calleP."', '".$entre."', '".$numCasas."', '".$col."', '".$codPost."')";
            if($mysqli->query($query)===TRUE){
                return "Registro Existoso.";
            }else{
                return "NO se puedo hacer el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function EliminarUsuario($correo){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL eliminar_usuario('".$correo."')";
            if($mysqli->query($query)===TRUE){
                return "eliminacion Existoso.";
            }else{
                return "NO se puedo eliminar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function ListaTarjetasUsuarios(){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = array();
            $resultado = mysqli_query($mysqli, "call listaTargetaUsuario()");
            while ($rows = $resultado->fetch_assoc())
            {
                $salida[] = [
                    "img"       => $rows["img"],
                    "apodo"     => $rows["apodo"],
                    "puesto"    => $rows["puesto"],
                    "numero"    => $rows["numero"],
                    "correo"    => $rows["correo"]
                ];
            }
            return $salida;
            $resultado->free();
        }
        //#####################################################
        public function TrajetaEspecifica($correo){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = array();
            $resultado = mysqli_query($mysqli, "call Targeta_Especifica_Usuario('".$correo."');");
            $rows = $resultado->fetch_assoc();
            $salida['img']      = $rows['img'];
            $salida['apodo']    = $rows['apodo'];
            $salida['puesto']   = $rows['puesto'];
            $salida['numero']   = $rows['numero'];
            $salida['correo']   = $rows['correo'];
            //============================
            return $salida;
            $resultado->free();
            //============================
        }
        //#####################################################
        public function VistaPorUsuario($correo){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = array();
            $resultado = mysqli_query($mysqli, "call vista_por_usuario('".$correo."');");
            $rows = $resultado->fetch_assoc();
            $salida['apodo']    = $rows['apodo'];
            $salida['puesto']   = $rows['puesto'];
            $salida['nom1']     = $rows['nom1'];
            $salida['nom2']     = $rows['nom2'];
            $salida['ape1']     = $rows['ape1'];
            $salida['ape2']     = $rows['ape2'];
            $salida['rfc']      = $rows['rfc'];
            $salida['curp']     = $rows['curp'];
            $salida['telefono'] = $rows['telefono'];
            $salida['correo']   = $rows['correo'];
            $salida['calle']    = $rows['calle'];
            $salida['entre']    = $rows['entre'];
            $salida['numCasa']  = $rows['numCasa'];
            $salida['codPostal']= $rows['codPostal'];
            $salida['colonia']  = $rows['colonia'];
            //============================
            return $salida;
            $resultado->free();
            //============================
        }
        //#####################################################
        public function ModContra($correo, $anterior, $nueva){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = "";
            $resultado = mysqli_query($mysqli, "CALL mod_contra('".$correo."', '".$anterior."', '".$nueva."');");
            $rows = $resultado->fetch_array();
            $salida = $rows[0];
            //============================
            return $salida;
            $resultado->free();
            //============================
        }
        //#####################################################
        public function ModPuesto($correo, $puesto){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL mod_puesto('".$correo."', '".$puesto."')";
            if($mysqli->query($query)===TRUE){
                return "Modificacion Existoso.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function ModNombre($correo, $nom1, $nom2, $ape1, $ape2){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL mod_nombre('".$correo."', '".$nom1."', '".$nom2."', '".$ape1."', '".$ape2."')";
            if($mysqli->query($query)===TRUE){
                return "Modificacion Existoso.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function Modcurp($correo, $curp){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL mod_curp('".$correo."', '".$curp."')";
            if($mysqli->query($query)===TRUE){
                return "Modificacion Existoso.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        //#####################################################
    }
    // ========================================================
    // $prueba = new procedimientos_BD();
    // $salida = $prueba->ExisteCorreo('Rtapiz@gmail.com');
    // var_dump($salida);
    // $prueba = new procedimientos_BD();
    // $salida = $prueba->ConfirmarContraseña('jesus120190240.8@gmail.com', '12e4');
    // var_dump($salida);
    // $prueba = new procedimientos_BD();
    // $salida = $prueba->Id_por_Correo('meli@gmail.com');
    // var_dump($salida);
    // $prueba = new procedimientos_BD();
    // $salida = $prueba->InfoLogin('meli@gmail.com');
    // var_dump($salida);
    // $prueba = new procedimientos_BD();
    // $salida = $prueba->AgregarUsuario('Luis@gmail.com', '1234', 'noImg', 'Luis', 'Enrrique', 'Villavicencio', 'Lucero', '', '6128962147', 'Laboratorista 2', 'aaaa111111bccddd23', 'aaaa111111b2c', 'pitaya', 'mango,semilla', '564', 'indeco', '23071');
    // var_dump($salida);
    // $prueba = new procedimientos_BD();
    // $salida = $prueba->EliminarUsuario('Luis@gmail.com');
    // var_dump($salida);
    // $prueba = new procedimientos_BD();
    // $salida = $prueba->ListaTarjetasUsuarios();
    // var_dump($salida);
    // $prueba = new procedimientos_BD();
    // $salida = $prueba->TrajetaEspecifica('Rtapiz@gmail.com');
    // var_dump($salida);
    // $prueba = new procedimientos_BD();
    // $salida = $prueba->VistaPorUsuario('jesus120190240.8@gmail.com');
    // var_dump($salida);
    // $prueba = new procedimientos_BD();
    // $salida = $prueba->ModContra('jesus120190240.8@gmail.com', 'holis', 'holaMundo');
    // var_dump($salida);
    // $prueba = new procedimientos_BD();
    // $salida = $prueba->ModPuesto('jesus120190240.8@gmail.com', 'Jefe De Laboratorio');
    // var_dump($salida);
    // $prueba = new procedimientos_BD();
    // $salida = $prueba->ModNombre('Rtapiz@gmail.com', 'raul', 'jesus', 'ruiz', 'tapiz');
    // var_dump($salida);
    // $prueba = new procedimientos_BD();
    // $salida = $prueba->Modcurp('Rtapiz@gmail.com', 'cccc111111bccddd23');
    // var_dump($salida);
    // ========================================================
?>