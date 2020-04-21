<?php
    // ========================================================
    include '../BD/ProceUser.php';
    // ========================================================
    class Usuarios{
        //#####################################################
        public function Existencia_de_correo($correo){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ExisteCorreo($correo);
            return $respuesta;
        }
        //#####################################################
        public function Validar_contra($correo, $contra){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ConfirmarContraseña($correo, $contra);
            return $respuesta;
        }
        //#####################################################
        public function Info_Correo($correo){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->InfoLogin($correo);
            return $respuesta;
        }
        //#####################################################
        public function Insertar( 
            $correo,    $contra,    $img,       $nom1, 
            $nom2,      $ape1,      $ape2,      $apodo, 
            $num,       $puesto,    $curp,      $rfc,
            $calleP,    $entre,     $numCasas,  $col, 
            $codPost
        ){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->AgregarUsuario($correo, $contra, $img, $nom1, $nom2, $ape1, $ape2, $apodo, $num, $puesto, $curp, $rfc, $calleP, $entre, $numCasas, $col, $codPost);
            return $respuesta;
        }
        //#####################################################
        public function Eliminar($correo){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->EliminarUsuario($correo);
            return $respuesta;
        }
        //#####################################################
        public function TarjetasUsuarios(){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ListaTarjetasUsuarios();
            return $respuesta;
        }
        //#####################################################
        public function TarjetaEspecifica($correo){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->TrajetaEspecifica($correo);
            return $respuesta;
        }
        //#####################################################
        public function VistaCompleta($correo){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->VistaPorUsuario($correo);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_contra($correo, $actual, $nueva){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ModContra($correo, $actual, $nueva);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_puesto($correo, $puesto){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ModPuesto($correo, $puesto);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_Nombre($correo, $nom1, $nom2, $ape1, $ape2){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ModNombre($correo, $nom1, $nom2, $ape1, $ape2);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_CURP($correo, $curp){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->Modcurp($correo, $curp);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_RFC($correo, $rfc){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ModRFC($correo, $rfc);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_Apodo($correo, $apodo){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ModApodo($correo, $apodo);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_Telefono($correo, $telefono){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ModTelefono($correo, $telefono);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_Direccion($correo, $calle, $entre, $numCasa, $col, $codP){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->ModDireccion($correo, $calle, $entre, $numCasa, $col, $codP);
            return $respuesta;
        }
        //#####################################################
        public function Modificar_img($correo, $img){
            //pendiente por interfaz
        }
        //#####################################################
        public function Buscar_tarjetas($texto){
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->Buscar_tarjetas_usuarios($texto);
            return $respuesta;
        }
        //#####################################################
        public function Filtro_por_puesto($arregloPuestos){
            //ingresar arreglo con los puestos buscados 
            //Ejemplo1: $puestos = ['Jefe De Laboratorio','Administrador','Laboratorista 1','Laboratorista 2'];
            //Ejemplo2: $puestos = ['Jefe De Laboratorio','Administrador','Laboratorista 1',''];
            //Ejemplo3: $puestos = ['Jefe De Laboratorio','Administrador','',''];
            //Ejemplo4: $puestos = ['Jefe De Laboratorio','','',''];
            $usuarioBD = new procedimientos_User();
            $respuesta = $usuarioBD->Filtro_tarjetas_puesto($arregloPuestos[0], $arregloPuestos[1], $arregloPuestos[2], $arregloPuestos[3]);
            return $respuesta;
        }
        //#####################################################
    }
    // ========================================================
    // $usuario = new Usuarios();
    // $arregloEjemplo = $usuario->TarjetasUsuarios('Luis@gmail.com','1234');
    // var_dump($arregloEjemplo);
    // echo '
    //     <table style="width:100%">
    //     <tr>
    //         <th>img</th>
    //         <th>apodo</th>
    //         <th>puesto</th>
    //         <th>numero</th>
    //         <th>correo</th>
    //     </tr>
    // ';
    // for($ren = 0; $ren < count($arregloEjemplo); $ren++){
    //     echo '
    //         <tr>
    //             <td>'.$arregloEjemplo[$ren]['img'].'</td>
    //             <td>'.$arregloEjemplo[$ren]['apodo'].'</td>
    //             <td>'.$arregloEjemplo[$ren]['puesto'].'</td>
    //             <td>'.$arregloEjemplo[$ren]['numero'].'</td>
    //             <td>'.$arregloEjemplo[$ren]['correo'].'</td>
    //         </tr>
    //     ';        
    // }
    // echo '</table>';
    // ========================================================
?>