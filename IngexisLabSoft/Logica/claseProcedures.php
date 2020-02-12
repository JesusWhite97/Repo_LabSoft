<?php
    include '../BD/conexion.php';
    $procedimientos = new Procedimientos();

    if(isset($_POST["metodo"])){
        if($_POST["metodo"]=="eliminar"){
            $json[] =   
                [
                    'mensajeDatos'   => $procedimientos->eliminarUsuario($_POST["usuario"])
                ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
        if($_POST["metodo"]=="modificar"){
            $json[] =
                [
                    'mensajeDatos'   => $procedimientos->modificarUsuario($_POST["img"],$_POST["titulo"],$_POST["puesto"],$_POST["primerNombre"],$_POST["segundoNombre"],$_POST["apellidoPaterno"],$_POST["apellidoMaterno"],$_POST["rfc"],$_POST["curp"],$_POST["telefono"],$_POST["email"],$_POST["ciudad"],$_POST["calle"],$_POST["entre"],173,$_POST["cp"],$_POST["colonia"])
                ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
        if($_POST["metodo"]=="registrarCliente"){
            $json[] =
                [
                    'mensajeDatos'   => $procedimientos->agregarClientes($_POST["titulo"],$_POST["nombre"],$_POST["rfc"],$_POST["direccion"],$_POST["cp"],$_POST["colonia"],$_POST["ciudad"],$_POST["nombreContacto"],$_POST["telefono"],$_POST["email"],$_POST["notas"],"2019-12-09",$_POST["img"])
                ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
        if($_POST["metodo"]=="registrar"){
            $json[] =
                [
                    'mensajeDatos'   => $procedimientos->agregarUsuario($_POST["email"],$_POST["password"],$_POST["img"],$_POST["titulo"],$_POST["puesto"],$_POST["primerNombre"],$_POST["segundoNombre"],$_POST["apellidoPaterno"],$_POST["apellidoMaterno"],$_POST["rfc"],$_POST["curp"],$_POST["telefono"],$_POST["ciudad"],$_POST["calle"],$_POST["entre"],173,$_POST["cp"],$_POST["colonia"])
                ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
        if($_POST["metodo"]=="agregarClientes"){
            $json[] =
                [
                    'mensajeDatos'   => $procedimientos->agregarClientes($_POST["titulo"],$_POST["empresa_nombre"],$_POST["rfc"],$_POST["direccion"],$_POST["cod_postal"],$_POST["col"],$_POST["ciudad"],$_POST["nom_contacto"],$_POST["num_contacto"],$_POST["notas"],$_POST["fecha_reg"],$_POST["img"])
                ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
        if($_POST["metodo"]=="modificarCliente"){
            $json[] =
                [
                    'mensajeDatos'   => $procedimientos->modificarClientes(intval($_POST["idCliente"]),$_POST["titulo"],$_POST["nombre"],$_POST["rfc"],$_POST["direccion"],$_POST["cp"],$_POST["colonia"],$_POST["ciudad"],$_POST["nombreContacto"],$_POST["numeroContacto"],$_POST["notas"],"2019-12-09",$_POST["img"])
                ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
        if($_POST["metodo"]=="eliminarCliente"){
            $json[] =
                [
                    'mensajeDatos'   => $procedimientos->eliminaClientes(intval($_POST["cliente"]))
                ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
        if($_POST["metodo"]=="agregarobras"){
            $json[] =
                [
                    'mensajeDatos'   => $procedimientos->agregarobras($_POST["titulo"],$_POST["cliente"],$_POST["direccion"],$_POST["nombreencargado"],$_POST["telefono"],$_POST["email"],$_POST["usuario"],$_POST["descripcion"],$_POST["fechamuestreo"])
                ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
        if($_POST["metodo"]=="modificarobras"){
            $json[] =
                [
                    'mensajeDatos'   => $procedimientos->modificarobras($_POST["titulo"],$_POST["cliente"],$_POST["direccion"],$_POST["nombreencargado"],$_POST["telefono"],$_POST["email"],$_POST["usuario"],$_POST["descripcion"],$_POST["fechamuestreo"])
                ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
        if($_POST["metodo"]=="eliminarObra"){
            $json[] =
                [
                    'mensajeDatos'   => $procedimientos->eliminarobras(intval($_POST["idObra"]))
                ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
        if($_POST["metodo"]=="agregarMuestra"){
            $json[] =
                [
                    'mensajeDatos'   => $procedimientos->agregarMuestra($_POST["id_obra"],$_POST["fecha_prueba"])
                ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
        if($_POST["metodo"]=="modificarmuestra"){
            $json[] =
                [
                    'mensajeDatos'   => $procedimientos->modificarmuestra($_POST["id_obra"],$_POST["fecha_prueba"])
                ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
        if($_POST["metodo"]=="eliminarmuestra"){
            $json[] =
                [
                    'mensajeDatos'   => $procedimientos->eliminarmuestra($_POST["id_muestra"])
                ];
                $jsonString = json_encode($json);
                echo $jsonString;
        }
    }
    // ============================================================================================
    class Procedimientos{
        public function validaLogin($correo, $contra){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = "no";
            $query = "call login_usuario('".$correo."', '".$contra."');";
            $resultado=$mysqli->query($query);
            while ($rows = $resultado->fetch_assoc())
            {
                if($rows["id_usuario"])
                {
                    $salida="si";
                }
            }
            return $salida;
            $resultado->free();
        }
        // ============================================================================================
        public function ValidaCorreo($correo){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = "no";
            $query = "SELECT correo FROM `usuarios` WHERE correo = '".$correo."' LIMIT 1;";
            $resultado=$mysqli->query($query);
            while ($rows = $resultado->fetch_assoc())
            {
                if($rows["correo"])
                {
                    $salida="si";
                }
            }
            return $salida;
            $resultado->free();
        }
        // ============================================================================================
        public function infoUsuario($correo){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "SELECT * FROM `info_usuario` WHERE info_usuario.email = '".$correo."' LIMIT 1;";
            $resultado=$mysqli->query($query);
            $Salida =array();
            while ($rows = $resultado->fetch_assoc())
            {
                $Salida["usuario_id"] = $rows["usuario_id"];
                $Salida["imagen"] = $rows["imagen"];
                $Salida["titulo"] = $rows["titulo"];
                $Salida["puesto"] = $rows["puesto"];
                $Salida["primer_nombre"] = $rows["primer_nombre"];
                $Salida["segundo_nombre"] = $rows["segundo_nombre"];
                $Salida["primer_apellido"] = $rows["primer_apellido"];
                $Salida["segundo_apellido"] = $rows["segundo_apellido"];
                $Salida["rfc"] = $rows["rfc"];
                $Salida["curp"] = $rows["curp"];
                $Salida["numero_contacto"] = $rows["numero_contacto"];
                $Salida["email"] = $rows["email"];
                $Salida["calle"] = $rows["calle"];
                $Salida["entre"] = $rows["entre"];
                $Salida["numero"] = $rows["numero"];
                $Salida["codigo_postal"] = $rows["codigo_postal"];
                $Salida["colonia"] = $rows["colonia"];
                $Salida["ciudad"] = $rows["ciudad"];
            }
            return $Salida;
            $resultado->free();
        }
        // ============================================================================================
        public function agregarUsuarios($correo, $password, $foto, $titulo, $puesto, $primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $rfc, $curp, $numero_contacto, $ciudad, $calle, $entre, $numero, $codigo_postal, $colonia){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query1 = "CALL agregarusuario('".$correo."','".$password."');";
            $query2 = "CALL agregarinfousuario('".$foto."','".$titulo."','".$puesto."','".$primer_nombre."','".$segundo_nombre."','".$primer_apellido."','".$segundo_apellido."','".$rfc."','".$curp."','".$numero_contacto."','".$correo."','".$ciudad."','".$calle."','".$entre."','".$numero."','".$codigo_postal."','".$colonia."');";
            if(($mysqli->query($query1)===TRUE) && ($mysqli->query($query2)===TRUE)){
                return "Registro exitosa.";
            }else{
                return "NO se pudo Agregar usuario: ".$mysqli->error;
            }
        }
        // ============================================================================================
        public function eliminarUsuario($correo)
        {
             //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
             //============================
            $query = "DELETE FROM `usuarios` WHERE correo = '$correo';";
            if($mysqli->query($query)===TRUE)
            {
                $query = "DELETE FROM `info_usuario` WHERE email = '$correo';";
                $resultado=$mysqli->query($query);
                if($mysqli->query($query)===TRUE){
                    return "Eliminación exitosa.";
                }else{
                    return "NO se pudo eliminar en USUARIOS: ".$mysqli->error;
                }
            }else{
                return "NO se pudo eliminar en Inf_Usuarios: ".$mysqli->error;
            }
        }
        // ============================================================================================
        public function modificarUsuario($img,$titulo,$puesto,$primerNombre,$segundoNombre,$apellidoPaterno,$apellidoMaterno,$rfc,$curp,$telefono,$email,$ciudad,$calle,$entre,$numeroCasa,$cp,$colonia){
             //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
             //============================
            $query = "CALL modificarinfousuario('".$img."','".$titulo."','".$puesto."','".$primerNombre."','".$segundoNombre."','".$apellidoPaterno."','".$apellidoMaterno."','".$rfc."','".$curp."','".$telefono."','".$email."','".$ciudad."','".$calle."','".$entre."','".$numeroCasa."','".$cp."','".$colonia."');";
            if($mysqli->query($query)===TRUE){
                return "Modificación exitosa.";
            }else{
                return "NO se pudo modificar: ".$mysqli->error;
            }
        }
        // ============================================================================================
        public function agregarobras($titulo,$cliente,$direccion,$nombreencargado,$telefono,$email,$usuario,$descripcion,$fechamuestreo){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL agregarobras('".$titulo."','".$cliente."','".$direccion."','".$nombreencargado."','".$telefono."','".$email."','".$usuario."','".$descripcion."','".$fechamuestreo."');";
            if($mysqli->query($query)===TRUE){
                $salida = "Registro Existoso.";
            }else{
                $salida = "NO se puedo hacer el registro: ".$mysqli->error;
            }
            //------------------------------
            $ultimoID = 0;
            $query = "SELECT id_obra FROM `obras` ORDER BY id_obra DESC LIMIT 1;";
            $resultado=$mysqli->query($query);
            while ($rows = $resultado->fetch_assoc())
            {
                $ultimoID = $rows["id_obra"];
            }
            $resultado->free();
            //------------------------------
            for($i = 1; $i <= 3; $i++){
                $fecha = date("Y-m-d", strtotime($fechamuestreo. "+ ".($i*7)." days"));
                //============================
                $query = "CALL insertarmuestra('".$ultimoID."','".$fecha."');";
                if($mysqli->query($query)===TRUE){
                    $salida = "Registro Existoso.";
                }else{
                    $salida = "NO se puedo hacer el registro: ".$mysqli->error;
                }  
            }
            return $salida;
        }
        // ============================================================================================
        public function modificarobras($titulo,$cliente,$direccion,$nombreencargado,$telefono,$email,$usuario,$descripcion,$fechamuestreo){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL modificarobras('".$titulo."','".$cliente."','".$direccion."','".$nombreencargado."','".$telefono."','".$email."','".$usuario."','".$descripcion."','".$fechamuestreo."');";
            if($mysqli->query($query)===TRUE){
                return "Modificacion Existoza.";
            }else{
                return "NO se puedo hacer la modificacion del registro: ".$mysqli->error;
            }
        }
        // ============================================================================================
        public function eliminarobras($gmial){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL eliminarobra('".$gmial."');";
            if($mysqli->query($query)===TRUE){
                return "Sea eliminado el registro correctamente.";
            }else{
                return "NO sea podido borrar el registro: ".$mysqli->error;
            }
        }
        // ============================================================================================
        public function infoCliente($correo){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "SELECT * FROM `clinetes` WHERE clinetes.email = '".$correo."' LIMIT 1;";
            $resultado=$mysqli->query($query);
            $Salida =array();
            while ($rows = $resultado->fetch_assoc())
            {
                    $Salida["idCliente"] =intval($rows["id_clinete"]);
                    $Salida["titulo"] = $rows["titulo"];
                    $Salida["nombre"] = $rows["empresa_nombre"];
                    $Salida["rfc"] = $rows["rfc"];
                    $Salida["direccion"] = $rows["direccion"];
                    $Salida["cp"] = $rows["cod_postal"];
                    $Salida["col"] = $rows["col"];
                    $Salida["ciudad"] = $rows["ciudad"];
                    $Salida["nom_contacto"] = $rows["nom_contacto"];
                    $Salida["num_contacto"] = $rows["num_contacto"];
                    $Salida["email"] = $rows["email"];
                    $Salida["notas"] = $rows["notas"];
                    $Salida["img"] = $rows["img"];
                
            }
            return $Salida;
            $resultado->free();
        }
        
        // ============================================================================================
        public function todoClientes(){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = array();
            $query = "call todoclientes();";
            $resultado=$mysqli->query($query);
            $num = 0;
            while ($rows = $resultado->fetch_assoc())
            {
                $salida[$num] = array(
                    "id_clinete" => $rows["id_clinete"],
                    "titulo" => $rows["titulo"],
                    "empresa_nombre" => $rows["empresa_nombre"],
                    "rfc" => $rows["rfc"],
                    "direccion" => $rows["direccion"],
                    "cod_postal" => $rows["cod_postal"],
                    "col" => $rows["col"],
                    "ciudad" => $rows["ciudad"],
                    "nom_contacto" => $rows["nom_contacto"],
                    "num_contacto" => $rows["num_contacto"],
                    "email" => $rows["email"],
                    "notas" => $rows["notas"],
                    "fecha_reg" => $rows["fecha_reg"],
                    "img" => $rows["img"]
                );
                $num++;
            }
            return $salida;
            $resultado->free();
        }
        // ============================================================================================
        public function agregarClientes($titulo, $empresa_nombre, $rfc, $direccion, $cod_postal, $col, $ciudad, $nom_contacto, $num_contacto, $email, $notas, $fecha_reg, $img){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL insertarclientes('".$titulo."','".$empresa_nombre."','".$rfc."','".$direccion."','".$cod_postal."','".$col."','".$ciudad."','".$nom_contacto."','".$num_contacto."','".$email."','".$notas."','".$fecha_reg."','".$img."');";
            if($mysqli->query($query)===TRUE){
                return "Registro Existoso.";
            }else{
                return "NO se puedo hacer el registro: ".$mysqli->error;
            }            
        }
        // ============================================================================================
        public function modificarClientes($id, $titulo, $empresa_nombre, $rfc, $direccion, $cod_postal, $col, $ciudad, $nom_contacto, $num_contacto, $notas, $fecha_reg, $img){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL modificarclientes('".$id."','".$titulo."','".$empresa_nombre."','".$rfc."','".$direccion."','".$cod_postal."','".$col."','".$ciudad."','".$nom_contacto."','".$num_contacto."','".$notas."','".$fecha_reg."','".$img."');";
            if($mysqli->query($query)===TRUE){
                return "Modificacion Existoso.";
            }else{
                return "NO se puedo hacer el registro: ".$mysqli->error;
            }
        }
        // ============================================================================================
        public function eliminaClientes($id){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL eliminarclientes(".$id.");";
            if($mysqli->query($query)===TRUE){
                return "Sea eliminado el registro correctamente.";
            }else{
                return "NO sea podido borrar el registro: ".$mysqli->error;
            }
        }
        // ============================================================================================
        public function todoInfoUsuarios(){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = array();
            $query = "call todousurios()";
            $resultado=$mysqli->query($query);
            while ($rows = $resultado->fetch_assoc())
            {
                $salida[] = [
                    "usuario_id" => $rows["usuario_id"],
                    "imagen" => $rows["imagen"],
                    "titulo" => $rows["titulo"],
                    "puesto" => $rows["puesto"],
                    "primer_nombre" => $rows["primer_nombre"],
                    "segundo_nombre" => $rows["segundo_nombre"],
                    "primer_apellido" => $rows["primer_apellido"],
                    "segundo_apellido" => $rows["segundo_apellido"],
                    "rfc" => $rows["rfc"],
                    "curp" => $rows["curp"],
                    "numero_contacto" => $rows["numero_contacto"],
                    "email" => $rows["email"],
                    "ciudad" => $rows["ciudad"],
                    "calle" => $rows["calle"],
                    "entre" => $rows["entre"],
                    "numero" => $rows["numero"],
                    "codigo_postal" => $rows["img"],
                    "colonia" => $rows["colonia"]
                ];
            }
            return $salida;
            $resultado->free();
        }
        // ============================================================================================
        public function todoMuestra(){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = array();
            $query = "call todomuestra()";
            $resultado=$mysqli->query($query);
            while ($rows = $resultado->fetch_assoc())
            {
                $salida[] = [
                    "id_muestra" => $rows["id_muestra"],
                    "id_obra" => $rows["id_obra"],
                    "resultado" => $rows["resultado"],
                    "fecha_prueba" => $rows["fecha_prueba"]
                ];
            }
            return $salida;
            $resultado->free();
        }
        // ============================================================================================
        public function todoObras(){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = array();
            $query = "call todoobras()";
            $resultado=$mysqli->query($query);
            while ($rows = $resultado->fetch_assoc())
            {
                $salida[] = [
                    "id_obra" => $rows["id_obra"],
                    "titulo" => $rows["titulo"],
                    "id_cliente" => $rows["id_cliente"],
                    "direccion" => $rows["direccion"],
                    "nom_encargado" => $rows["nom_encargado"],
                    "telefono" => $rows["telefono"],
                    "email" => $rows["email"],
                    "id_usuario" => $rows["id_usuario"],
                    "descripcion" => $rows["descripcion"],
                    "fecha_muestreo" => $rows["fecha_muestreo"]
                ];
            }
            return $salida;
            $resultado->free();
        }
        // ============================================================================================
        public function modificarmuestra($id_muestra, $id_obra, $resultado, $fecha_prueba){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL modificarmuestra('".$id_muestra."','".$id_obra."','".$resultado."','".$fecha_prueba."');";
            if($mysqli->query($query)===TRUE){
                return "Modificacion Existoso.";
            }else{
                return "NO se puedo hacer el registro: ".$mysqli->error;
            }
        }
        // ============================================================================================
        public function agregarMuestra($id_obra, $fecha_prueba){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL insertarmuestra('".$id_obra."','".$fecha_prueba."');";
            if($mysqli->query($query)===TRUE){
                return "Registro Existoso.";
            }else{
                return "NO se puedo hacer el registro: ".$mysqli->error;
            }            
        }
        // ============================================================================================
        public function eliminarmuestra($id_muestra){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "CALL eliminarmuesta('".$id_muestra."');";
            if($mysqli->query($query)===TRUE){
                return "Sea eliminado el registro correctamente.";
            }else{
                return "NO sea podido borrar el registro: ".$mysqli->error;
            }
        }
        // ============================================================================================
        public function muestrasOrdenadas($hoy){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = array();
            $query = "call muestrasordenadas('".$hoy."')";
            $resultado=$mysqli->query($query);
            while ($rows = $resultado->fetch_assoc())
            {
                $salida[] = [
                    "id_muestra" => $rows["id_muestra"],
                    "id_obra" => $rows["id_obra"],
                    "resultado" => $rows["resultado"],
                    "fecha_muestreo" => $rows["fecha_muestreo"],
                    "fecha_prueba" => $rows["fecha_prueba"],
                    "imagen" => $rows["imagen"],
                    "direccion" => $rows["direccion"],
                    "titulo"=>$rows["titulo"],
                    "nom_contacto"=>$rows["nom_contacto"]
                ];
            }
            return $salida;
            $resultado->free();
        }
        // ============================================================================================
        public function busquedaCliente($titulo){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $salida = array();
            $query = "call clientesbuscador('".$titulo."')";
            $resultado=$mysqli->query($query);
            while ($rows = $resultado->fetch_assoc())
            {
                $salida[] = [
                    "id_clinete" => $rows["id_clinete"],
                    "titulo" => $rows["titulo"],
                    "empresa_nombre" => $rows["empresa_nombre"],
                    "rfc" => $rows["rfc"],
                    "direccion" => $rows["direccion"],
                    "cod_postal	col" => $rows["cod_postal	col"],
                    "ciudad" => $rows["ciudad"],
                    "nom_contacto"=>$rows["titnom_contactoulo"],
                    "num_contacto"=>$rows["num_contacto"],
                    "email"=>$rows["email"],
                    "notas"=>$rows["notas"],
                    "fecha_reg"=>$rows["fecha_reg"],
                    "img"=>$rows["img"]
                ];
            }
            return $salida;
            $resultado->free();
        }
        // ============================================================================================
        public function infoUsuarioID($id){

              //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
              //============================
              $query = "SELECT * FROM `info_usuario` WHERE info_usuario.usuario_id = '".$id."' LIMIT 1;";
            $resultado=$mysqli->query($query);
            $Salida =array();
            while ($rows = $resultado->fetch_assoc())
            {
                $Salida["usuario_id"] = $rows["usuario_id"];
                $Salida["imagen"] = $rows["imagen"];
                $Salida["titulo"] = $rows["titulo"];
                $Salida["puesto"] = $rows["puesto"];
                $Salida["primer_nombre"] = $rows["primer_nombre"];
                $Salida["segundo_nombre"] = $rows["segundo_nombre"];
                $Salida["primer_apellido"] = $rows["primer_apellido"];
                $Salida["segundo_apellido"] = $rows["segundo_apellido"];
                $Salida["rfc"] = $rows["rfc"];
                $Salida["curp"] = $rows["curp"];
                $Salida["numero_contacto"] = $rows["numero_contacto"];
                $Salida["email"] = $rows["email"];
                $Salida["calle"] = $rows["calle"];
                $Salida["entre"] = $rows["entre"];
                $Salida["numero"] = $rows["numero"];
                $Salida["codigo_postal"] = $rows["codigo_postal"];
                $Salida["colonia"] = $rows["colonia"];
                $Salida["ciudad"] = $rows["ciudad"];
                    
            }
            return $Salida;
            $resultado->free();
        }

        // ============================================================================================
        public function infoClienteID($id){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "SELECT * FROM `clinetes` WHERE clinetes.id_clinete = '".$id."' LIMIT 1;";
            $resultado=$mysqli->query($query);
            $Salida =array();
            while ($rows = $resultado->fetch_assoc())
            {
                    $Salida["idCliente"] =intval($rows["id_clinete"]);
                    $Salida["titulo"] = $rows["titulo"];
                    $Salida["nombre"] = $rows["empresa_nombre"];
                    $Salida["rfc"] = $rows["rfc"];
                    $Salida["direccion"] = $rows["direccion"];
                    $Salida["cp"] = $rows["cod_postal"];
                    $Salida["col"] = $rows["col"];
                    $Salida["ciudad"] = $rows["ciudad"];
                    $Salida["nom_contacto"] = $rows["nom_contacto"];
                    $Salida["num_contacto"] = $rows["num_contacto"];
                    $Salida["email"] = $rows["email"];
                    $Salida["notas"] = $rows["notas"];
                    $Salida["img"] = $rows["img"];
                
            }
            return $Salida;
            $resultado->free();
        }

        // ============================================================================================
        public function infoObra($id){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "SELECT * FROM `obras` WHERE obras.id_obra = '".$id."' LIMIT 1;";
            $resultado=$mysqli->query($query);
            $Salida =array();
            while ($rows = $resultado->fetch_assoc())
            {
                    $Salida["idobra"] =$rows["id_obra"];
                    $Salida["titulo"] = $rows["titulo"];
                    $Salida["cliente"] = $rows["id_cliente"];
                    $Salida["direccion"] = $rows["direccion"];
                    $Salida["encargado"] = $rows["nom_encargado"];
                    $Salida["telefono"] = $rows["telefono"];
                    $Salida["email"] = $rows["email"];
                    $Salida["usuario"] = $rows["id_usuario"];
                    $Salida["descripcion"] = $rows["descripcion"];
                    $Salida["fechaMuestreo"] = $rows["fecha_muestreo"];
                
            }
            return $Salida;
            $resultado->free();
        }

        // ============================================================================================
        public function infoMuestras($id){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "SELECT * FROM `muesta` WHERE muesta.id_obra = '".$id."';";
            $resultado=$mysqli->query($query);
            $Salida =array();
            $num = 7;
            $Muestras = array();
            while ($rows = $resultado->fetch_assoc())
            {
                    $Muestras["idMuestra".$num] = $rows["id_muestra"];
                    $Muestras["idObra".$num] = $rows["id_obra"];
                    $Muestras["resultado".$num] = $rows["resultado"];
                    $Muestras["fechaPrueba".$num] = $rows["fecha_prueba"];
                $num = $num + $num;
            }
            return $Muestras;
            $resultado->free();
        }
        // ============================================================================================
        public function InfoXdeCliente($empresa){
            //crea Conexion===============
            $conex = new conexionMySQLi();
            $mysqli = $conex->conexion();
            //============================
            $query = "SELECT clinetes.num_contacto, clinetes.email FROM `clinetes` WHERE clinetes.empresa_nombre = '".$empresa."' LIMIT 1;";
            $Salida = array();
            $resultado=$mysqli->query($query);
            while ($rows = $resultado->fetch_assoc()){
                $Salida[] = array(
                    "numC" => $rows["num_contacto"],
                    "email" => $rows["email"]
                );
            }         
            return $Salida;
            $resultado->free();
        }
        // ============================================================================================
    }
    // $prueba = new procedimientos();
    // $salida = $prueba->todoClientes();
    // var_dump($salida);
    // $prueba = new procedimientos();
    // $salida = $prueba->eliminarobras("example@mail.com");
    // var_dump($salida);
    // $prueba = new procedimientos();
    // $salida = $prueba->todoInfoUsuarios();
    // var_dump($salida);
    // $prueba = new procedimientos();
    // $salida = $prueba->agregarUsuarios('correo', 'password', 'foto123', 'titulo', 'puesto', 'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido', 'rfc', 'curp', 'numero_contacto', 'ciudad', 'calle', 'entre', 'numero', 'codigo_postal', 'colonia');
    // var_dump($salida);
    // $fechamuestreo = "2001-08-06"; $i = 1;
    // $fecha = date("Y-m-d", strtotime($fechamuestreo. "+ ".($i*7)." days"));
    // var_dump($fecha);
    // $prueba = new procedimientos();
    // for($i = 0; $i<10; $i++){
    //     $fechita = "2012-09-".$i;
    //     $salida = $prueba->agregarobras("no mamesssss",12,"pa ya","yo","el mio","cucurukuku@gmail.com","3","bien verga",$fechita);
    // }
    // $prueba = new procedimientos();
    // $salida = $prueba->muestrasOrdenadas("2012-08-06");
    // var_dump($salida);
?>



