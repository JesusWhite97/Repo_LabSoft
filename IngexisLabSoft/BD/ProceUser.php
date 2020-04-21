<?php
    // ========================================================
    include 'conexion.php';
    // ========================================================
    class procedimientos_User{
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
        // public function Id_por_Correo($correo){
        //     //crea Conexion===============
        //     $conex = new conexionMySQLi();
        //     $mysqli = $conex->conexion();
        //     //============================
        //     $salida = "";
        //     $resultado = mysqli_query($mysqli, "select id_by_correo('".$correo."');");
        //     $rows = $resultado->fetch_array();
        //     $salida = $rows[0];
        //     //============================
        //     return $salida;
        //     $resultado->free();
        //     //============================
        // }
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
                return 'true';
            }else{
                return "Error: ".$mysqli->error;
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
                return "true";
            }else{
                return "Error: ".$mysqli->error;
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
            $resultado = mysqli_query($mysqli, "CALL Usuario_mod_contra('".$correo."', '".$anterior."', '".$nueva."');");
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
            $query = "CALL Usuario_mod_puesto('".$correo."', '".$puesto."')";
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
            $query = "CALL Usuario_mod_nombre('".$correo."', '".$nom1."', '".$nom2."', '".$ape1."', '".$ape2."')";
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
            $query = "CALL Usuario_mod_curp('".$correo."', '".$curp."')";
            if($mysqli->query($query)===TRUE){
                return "Modificacion Existoso.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function ModRFC($correo, $rfc){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL Usuario_mod_rfc('".$correo."', '".$rfc."')";
            if($mysqli->query($query)===TRUE){
                return "Modificacion Existoso.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function ModApodo($correo, $apodo){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL Usuario_mod_apodo('".$correo."', '".$apodo."')";
            if($mysqli->query($query)===TRUE){
                return "Modificacion Existoso.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function ModTelefono($correo, $telefono){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL Usuario_mod_Telefono('".$correo."', '".$telefono."')";
            if($mysqli->query($query)===TRUE){
                return "Modificacion Existoso.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function ModDireccion($correo, $calle, $entre, $numCasa, $col, $codP)
        {
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL Usuario_mod_direccion('".$correo."', '".$calle."', '".$entre."', '".$numCasa."', '".$col."', '".$codP."')";
            if($mysqli->query($query)===TRUE){
                return "Modificacion Existoso.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function Modimg($correo, $img){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL Usuario_mod_Img('".$correo."', '".$img."')";
            if($mysqli->query($query)===TRUE){
                return "Modificacion Existoso.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function Buscar_tarjetas_usuarios($texto)
        {
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = array();
            $resultado = mysqli_query($mysqli, "call buscar_tar_usuarios('".$texto."')");
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
        public function Filtro_tarjetas_puesto($puesto1, $puesto2 = null, $puesto3 = null, $puesto4 = null){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = array();
            if($puesto2 == null && $puesto3 == null && $puesto4 == null){
                $resultado = mysqli_query($mysqli, "call Usuario_filtro_puesto('".$puesto1."', '-', '-', '-')");
            }
            else if($puesto3 == null && $puesto4 == null){
                $resultado = mysqli_query($mysqli, "call Usuario_filtro_puesto('".$puesto1."', '".$puesto2."', '-', '-')");
            }
            else if($puesto4 == null){
                $resultado = mysqli_query($mysqli, "call Usuario_filtro_puesto('".$puesto1."', '".$puesto2."', '".$puesto3."', '-')");
            }
            else{
                $resultado = mysqli_query($mysqli, "call Usuario_filtro_puesto('".$puesto1."', '".$puesto2."', '".$puesto3."', '".$puesto4."')");
            }
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
    }
    // ========================================================
    // $prueba = new procedimientos_User();
    // $salida = $prueba->ExisteCorreo('Rtapiz@gmail.com');
    // var_dump($salida);
    // $prueba = new procedimientos_User();
    // $salida = $prueba->ConfirmarContraseña('jesus120190240.8@gmail.com', '12e4');
    // var_dump($salida);
    // $prueba = new procedimientos_User();
    // $salida = $prueba->Id_por_Correo('meli@gmail.com');
    // var_dump($salida);
    // $prueba = new procedimientos_User();
    // $salida = $prueba->InfoLogin('meli@gmail.com');
    // var_dump($salida);
    // $prueba = new procedimientos_User();
    // $salida = $prueba->AgregarUsuario('Luis@gmail.com', '1234', 'noImg', 'Luis', 'Enrrique', 'Villavicencio', 'Lucero', '', '6128962147', 'Laboratorista 2', 'aaaa111111bccddd23', 'aaaa111111b2c', 'pitaya', 'mango,semilla', '564', 'indeco', '23071');
    // var_dump($salida);
    // $prueba = new procedimientos_User();
    // $salida = $prueba->EliminarUsuario('Luis@gmail.com');
    // var_dump($salida);
    // $prueba = new procedimientos_User();
    // $salida = $prueba->ListaTarjetasUsuarios();
    // var_dump($salida);
    // $prueba = new procedimientos_User();
    // $salida = $prueba->TrajetaEspecifica('Rtapiz@gmail.com');
    // var_dump($salida);
    // $prueba = new procedimientos_User();
    // $salida = $prueba->VistaPorUsuario('jesus120190240.8@gmail.com');
    // var_dump($salida);
    // $prueba = new procedimientos_User();
    // $salida = $prueba->ModContra('jesus120190240.8@gmail.com', 'holis', 'holaMundo');
    // var_dump($salida);
    // $prueba = new procedimientos_User();
    // $salida = $prueba->ModPuesto('jesus120190240.8@gmail.com', 'Jefe De Laboratorio');
    // var_dump($salida);
    // $prueba = new procedimientos_User();
    // $salida = $prueba->ModNombre('Rtapiz@gmail.com', 'raul', 'jesus', 'ruiz', 'tapiz');
    // var_dump($salida);
    // $prueba = new procedimientos_User();
    // $salida = $prueba->Modcurp('Rtapiz@gmail.com', 'cccc111111bccddd23');
    // var_dump($salida);
    // $prueba = new procedimientos_User();
    // $salida = $prueba->ModRFC('Rtapiz@gmail.com', 'cccc111111b2c');
    // var_dump($salida);
    // $prueba = new procedimientos_User();
    // $salida = $prueba->ModApodo('Rtapiz@gmail.com', 'RTapiz');
    // var_dump($salida);
    // $prueba = new procedimientos_User();
    // $salida = $prueba->ModTelefono('Rtapiz@gmail.com', '6124587766');
    // var_dump($salida);
    // $prueba = new procedimientos_User();
    // $salida = $prueba->ModDireccion('Rtapiz@gmail.com', 'forjadores', 'tec y la terminal', '101', 'Progreso', '24058');
    // var_dump($salida);
    // $prueba = new procedimientos_User();
    // $salida = $prueba->Buscar_tarjetas_usuarios('s');
    // var_dump($salida);
    // $prueba = new procedimientos_User();
    // $salida = $prueba->Filtro_tarjetas_puesto('jefe de laboratorio', 'administrador');
    // var_dump($salida);
    // ========================================================
?>