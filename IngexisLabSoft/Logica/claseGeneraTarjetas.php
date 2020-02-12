<link rel="stylesheet" href="../css/main.css">
<?php 
    class GenerarTarjetas{
        // ========================================================================================
        public function tarjetaUsuario($img, $nombreU, $puesto, $tel, $correo){
            return '
            <div class="contenedorTarjetaUsuario">
            <a href="infoUsuarios.php?email='.$correo.'">
                <div class="imgUsuario" style="background-image: url('."'".$img."'".');"></div>
                <h2 class="tituloTarjetaUsuario"> '.$nombreU.' </h2>
                <h3 class="subtituloTarjetaUsuario">'.$puesto.'</h3>
            </a>
                <a id="telefono" class="botonInfo" href="tel: '.$tel.'"></a>
                <a id="email" class="botonInfo" href="mailto: '.$correo.'"></a>
            </div>
            ';
        }
        // ========================================================================================
        public function tarjetaMuestras_Azules($idMuestra, $fechaM, $fechaP, $resultado, $realizada, $imgProbador){
            $textoBtn = 'Agregar';
            echo '
                <div class="contenedorTarjetaAzul">
                    <div class="hederTarjetaAzul">
                        <div class="TarjetaAzul_round">
                            <input type="checkbox" id="checkbox'.$idMuestra.'"/>
                            <label for="checkbox'.$idMuestra.'"></label>
                        </div>
                        <div class="textoTarjetaAzul">
                            <h2 style="font-size:24px;margin: 0px 0px 0px 0px">Muestra 7 Dias</h2>
                            <h4 style="font-size:14px;margin: 0px 0px 0px 0px">'.$idMuestra.'</h4>
                        </div>
                        <div class="imgTarjetaAzul" style="background-image: url('."'".$imgProbador."'".');"></div>  
                    </div>
                    <div class="contenidoTarjetaAzul">
                        <h4 style=" margin: 0px 0px 0px 0px">Fecha de Muestreo</h4>
                        <h4 style="margin: 0px 0px 0px 0px">'.$fechaM.'</h4>
                        <h4 style="margin: 0px 0px 0px 0px">Fecha de Prueba</h4>
                        <h4 style="margin: 0px 0px 0px 0px">'.$fechaP.'</h4>
                        <h4 style="margin: 0px 0px 0px 0px">Resultado</h4>
                        <h4 style="margin: 0px 0px 0px 0px">'.$resultado.' kg/m2</h4>
                    </div>';
            if($realizada == 'si')
            {
                $textoBtn = 'Modificar';
            }
            else{
                $textoBtn = 'Agregar';
            }
            echo '
                    <div class="centrar">
                        <button class="TarjetaAzulBtnModificar_registrar">'.$textoBtn.'</button>
                    </div>
                </div>
            ';
        }
        // ========================================================================================
        public function tarjetaClietes($img, $nombreC, $rfc, $nomCont, $tel, $correo){
            echo '
                <div class="contenedorTarjetaUsuario" >
                        <a href="infoClientes.php?email='.$correo.'">
                        <div class="imgUsuario" style="background-image: url('."'".$img."'".');"></div>
                        <h2 class="tituloTarjetaUsuario"> '.$nombreC.'</h2>
                        <div class="subtitulosClientes">
                            <h3 >'.$rfc.'</h3>
                            <h3 >'.$nomCont.'</h3>
                        </div>
                        </a>
                        <a id="telefono" class="botonInfo" href="tel: '.$tel.'"></a>
                        <a id="email" class="botonInfo" href="mailto: '.$correo.'"></a> 
                </div>
            ';
        }
        // ========================================================================================
        public function tarjetaObra($iO, $obra, $direccion, $cliente, $img){
            return '
                <div class="tarjetaBlCh_TejetaConCheck">
                    <div class="tarjetaBlCh_texto">
                        <a href="infoObras.php?id='.$iO.'" style="text-decoration: none; width: 230px; position: absolute;">
                        <div class="tarjetaBlCh_Obra_1">
                            <span>'.$obra.'</span>
                        </div>
                        <div class="Direcci_n_de_la_obra___Cliente">
                            <span>'.$direccion.' - '.$cliente.'</span>
                        </div>
                        </a>
                    </div>
                    <div class="tarjetaBlCh_round">
                        <input type="checkbox" id="checkbox'.$iO.'" />
                        <label for="checkbox'.$iO.'"></label>
                    </div>
                    <div class="tarjetaBlCh_imgUserHeader" style="background-image: url('."'".$img."'".');"></div>
                </div>
            ';
        }
        // ========================================================================================
        public function tarjetaDiasObra($Obras,$DiaObra){
    
                    $cadena = '<div class="CuadritoDeAbajo">
                        <div class="CentarCuadritoDeAbajo">
                            <!-- =================================== -->
                            <h3 class="tituloCuadritoAbajo">'.$DiaObra.'</h3>
                            <!-- =================================== -->
                            <div class="tarjetaBlCh_TarjetaConCheckDisplay">
                            ';
                            //------------------------
                            for($iObras = 0; $iObras < count($cantObras); ++$iObras){
                                $iO = $DiaObra . (string)$iObras;
                                $tarjetas = new GenerarTarjetas();
                                $tarjetas -> tarjetaObra($Obras[]);
                            }
                            //------------------------
                            $cadena = $cadena.'
                            </div>
                        </div>
                    </div>
                ';
            }
        }
        // ========================================================================================
    // #############################
    // $arregloPrueba = array(
    //     array(
    //         "hoy",
    //         array(
    //             array('my obra1 alv', 'aqui alv', 'mi compa', '../img/user.jpg'),
    //             array('my obra2 alv', 'aqui alv', 'mi compa', '../img/user.jpg'),
    //             array('my obra3 alv', 'aqui alv', 'mi compa', '../img/user.jpg'),
    //             array('my obra4 alv', 'aqui alv', 'mi compa', '../img/user.jpg'),
    //             array('my obra5 alv', 'aqui alv', 'mi compa', '../img/user.jpg'),
    //             array('my obra6 alv', 'aqui alv', 'mi compa', '../img/user.jpg')
    //         )
    //     ),
    //     array(
    //         "mañana",
    //         array(
    //             array('my Mobra1 alv', 'aqui alv', 'mi compa', '../img/user.jpg'),
    //             array('my Mobra2 alv', 'aqui alv', 'mi compa', '../img/user.jpg'),
    //             array('my Mobra3 alv', 'aqui alv', 'mi compa', '../img/user.jpg'),
    //             array('my Mobra4 alv', 'aqui alv', 'mi compa', '../img/user.jpg'),
    //             array('my Mobra5 alv', 'aqui alv', 'mi compa', '../img/user.jpg'),
    //             array('my Mobra6 alv', 'aqui alv', 'mi compa', '../img/user.jpg')
    //         )
    //     )   
    // );
    // // #############################
    // $prueba1 = new GenerarTarjetas();
    // $prueba1 -> tarjetaUsuario('../img/user.jpg', 'jesus', 'don vergas', '6121671121', 'jesus@gmailcom');
    // echo "<br><br><br><br>";
    // $prueba1 = new GenerarTarjetas();
    // $prueba1 -> tarjetaMuestras_Azules('1234', '12-09-2019', '12-09-2019', '200', 'si', '../img/user.jpg');
    // echo "<br><br><br><br>";
    // $prueba1 = new GenerarTarjetas();
    // $prueba1 -> tarjetaClietes('../img/user.jpg', 'Larry, La Riata', 'RFC', 'Elver Gon', '6121671121', 'jesus@gmailcom');
    // echo "<br><br><br><br>";
    // $prueba1 = new GenerarTarjetas();
    // $prueba1 -> tarjetaDiasObra($arregloPrueba);
?>