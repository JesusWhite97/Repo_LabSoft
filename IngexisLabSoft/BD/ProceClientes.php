<?php
    // ========================================================
    include 'conexion.php';
    // ========================================================
    class procedimientos_Clientes{
        //#####################################################
        public function Insertar_cliente(
            $titulo,    $Nom_emp,       $rfc,
            $direc,     $cod_post,      $colonia,
            $ciudad,    $nom_contacto,  $nun_contacto,
            $correo,    $nota,          $img
        ){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $fecha = date("Y-m-d");
            //============================
            $query = "CALL insertarCliente('".$titulo."', '".$Nom_emp."', '".$rfc."', '".$direc."', '".$cod_post."', '".$colonia."', '".$ciudad."', '".$nom_contacto."', '".$nun_contacto."', '".$correo."', '".$nota."', '".$img."', '".$fecha."')";
            if($mysqli->query($query)===TRUE){
                return "Registro Existoso.";
            }else{
                return "NO se puedo hacer el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function Eliminar_clientes($correo){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL eliminar_cliente('".$correo."')";
            if($mysqli->query($query)===TRUE){
                return "eliminacion Existosa.";
            }else{
                return "NO se puedo eliminar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function Tarjetas_clientes(){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = array();
            $resultado = mysqli_query($mysqli, "call tarjetas_clientes()");
            while ($rows = $resultado->fetch_assoc())
            {
                $salida[] = [
                    "img"           => $rows["img"],
                    "titulo"        => $rows["titulo"],
                    "rfc"           => $rows["rfc"],
                    "nombreContac"  => $rows["nombreContac"],
                    "numeroContac"  => $rows["numeroContac"],
                    "correo"        => $rows["correo"]
                ];
            }
            return $salida;
            $resultado->free();
        }
        //#####################################################
        public function Mod_nota($correo, $nota){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL Clientes_mod_nota('".$correo."', '".$nota."')";
            if($mysqli->query($query)===TRUE){
                return "modificacion Existosa.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function Mod_contacto($correo, $nombreContac, $numeroContac){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL Clientes_mod_Contacto('".$correo."', '".$nombreContac."', '".$numeroContac."')";
            if($mysqli->query($query)===TRUE){
                return "modificacion Existosa.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function Mod_datosBasicos($correo, $titulo, $nomEmpresa, $RFC){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL Clientes_mod_Dbasicos('".$correo."', '".$titulo."', '".$nomEmpresa."', '".$RFC."')";
            if($mysqli->query($query)===TRUE){
                return "modificacion Existosa.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function Mod_direccion($correo, $direccion, $cod_post, $colonia, $ciudad){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL Clientes_mod_direccion('".$correo."', '".$direccion."', '".$cod_post."', '".$colonia."', '".$ciudad."')";
            if($mysqli->query($query)===TRUE){
                return "modificacion Existosa.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function Mod_img($correo, $img){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL Clientes_mod_Img('".$correo."', '".$img."')";
            if($mysqli->query($query)===TRUE){
                return "modificacion Existosa.";
            }else{
                return "NO se puedo Modificar el registro: ".$mysqli->error;
            }     
            //============================
        }
        //#####################################################
        public function Buscar_tarjetas($texto){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = array();
            $resultado = mysqli_query($mysqli, "call buscar_tar_Cliente('".$texto."')");
            while ($rows = $resultado->fetch_assoc())
            {
                $salida[] = [
                    "img"           => $rows["img"],
                    "titulo"        => $rows["titulo"],
                    "rfc"           => $rows["rfc"],
                    "nombreContac"  => $rows["nombreContac"],
                    "numeroContac"  => $rows["numeroContac"],
                    "correo"        => $rows["correo"]
                ];
            }
            return $salida;
            $resultado->free();
        }
        //#####################################################
    }
    // ========================================================
    // $prueba = new procedimientos_Clientes();
    // $salida = $prueba->Insertar_cliente("LA nueva","A Inc.","CZxS671901DFB","8001 Faucibus. Carretera","32674","ipsum","Kingston","Colby","8531171095","InstitutoTecnologico@tecnm.com","la de las pruebas","No Img");
    // var_dump($salida);
    // $prueba = new procedimientos_Clientes();
    // $salida = $prueba->Eliminar_clientes("InstitutoTecnologico@tecnm.com");
    // var_dump($salida);
    // $prueba = new procedimientos_Clientes();
    // $salida = $prueba->Tarjetas_clientes();
    // var_dump($salida);
    // $prueba = new procedimientos_Clientes();
    // $salida = $prueba->Mod_nota("InstitutoTecnologico@tecnm.com", 'este pedo si jala machin');
    // var_dump($salida);
    // $prueba = new procedimientos_Clientes();
    // $salida = $prueba->Mod_nota("InstitutoTecnologico@tecnm.com", 'John Wick', '6241459988');
    // var_dump($salida);
    // $prueba = new procedimientos_Clientes();
    // $salida = $prueba->Mod_datosBasicos("InstitutoTecnologico@tecnm.com", 'El Tep', 'Tecnologico', "el RFC");
    // var_dump($salida);
    // $prueba = new procedimientos_Clientes();
    // $salida = $prueba->Mod_direccion("InstitutoTecnologico@tecnm.com", 'paya y pa ca', '23085', "indelocos", 'la pazcion');
    // var_dump($salida);
    // $prueba = new procedimientos_Clientes();
    // $salida = $prueba->Mod_img("InstitutoTecnologico@tecnm.com", 'suna nueva imagen');
    // var_dump($salida);
    // $prueba = new procedimientos_Clientes();
    // $salida = $prueba->Buscar_tarjetas("gay");
    // var_dump($salida);
    // ========================================================
?>