<?PHP
    session_start();
    include '../Logica/claseProcedures.php';
    $id = $_GET["id"];
    $BD = new Procedimientos();
        $DatosObra = $BD->infoObra($id);
        $DatosCliente = $BD->infoClienteID($DatosObra["cliente"]);
        $DatosUsuario = $BD->infoUsuarioID($DatosObra["usuario"]);
        $DatosMuestras = $BD->infoMuestras($id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/main.js"></script>
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
    <title>Ingexis LabSoftware</title>
</head>

    <body>
    <!-- ---------------------- -->
    <header id="encabezadoBotones">
    <button id="regresar" onclick="goBack()">
        </button>
        <h2 id="titulo">
                Obra: <?php echo $DatosObra["titulo"];?>
        </h2>
        <button onclick="openNav()" id="menu">
        </button>
    </header> 
    <!-- ---------------------- -->
    <div class="contenedorCentradoResponsivo">
        <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
        <div class="tarjetaBlanca centrar">
            <h1 class="tituloPagina" style="margin: 0px 0px 0px 0px"><?php echo $DatosObra["titulo"];?></h1>
            <h4 class="subtituloPagina" style="margin: 0px 0px 0xp 0px"><?php echo $DatosCliente["titulo"];?></h4>
            <button class="tituloBoton" id="editar" onclick="window.location.href='modificarObras.php?id=<?php echo $id;?>'">Editar</button>
        </div>
        <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
        <div class="tarjetaBlanca">
            <input value="<?php echo $DatosObra["encargado"];?>">
            <p class="textoAyuda">Encargado de la obra</p>
            <input value="<?php echo $DatosObra["direccion"];?>">
            <p class="textoAyuda">Dirección de la obra</p>
            <input type="date" class="registro" value="2018-07-22" min="2018-01-01" max="2018-12-31" value="<?php echo $DatosObra["fechaMuestreo"];?>">
            <p class="textoAyuda">Fecha de muestreo</p>
        </div>
        <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
        <div class="tarjetaBlanca">
            <p class="titulo"> Asignado para muestreo </p>
            <div class="contenedorTarjetaUsuario">
                <div class="imgUsuario" style="background-image: url('<?php echo $DatosUsuario["imagen"];?>');"></div>
                <h2 class="tituloTarjetaUsuario"> <?php echo $DatosUsuario["titulo"];?></h2>
                <h3 class="subtituloTarjetaUsuario"><?php echo $DatosUsuario["puesto"];?></h3>
                <button id="telefono" class="botonInfo" href="tel:<?php echo $DatosUsuario['numero_contacto'];?>"></button>
                <button id="email" class="botonInfo" href="email:<?php echo $DatosUsuario['email'];?>"></button>
            </div>
        </div>
        <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
        <div class="tarjetaBlanca">
                    <label class="titulo">Descripción:</label>
                    <textarea id="descripcion"><?php echo $DatosObra["descripcion"];?></textarea>
        </div>
        <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
        <div class="tarjetaBlanca centrar">
            <p class="titulo">Muestras y pruebas: </p>


            <div class="contenedorTarjetaAzul">
                    <div class="hederTarjetaAzul">
                            <div class="TarjetaAzul_round">
                                <input type="checkbox" id="checkbox"/>
                                <label for="checkbox"></label>
                            </div>
                            <div class="textoTarjetaAzul">
                                <h2 style="font-size:24px;margin: 0px 0px 0px 0px">Muestra 7 Dias</h2>
                                <h4 style="font-size:14px;margin: 0px 0px 0px 0px"><?php echo $DatosMuestras['idMuestra7'];?></h4>
                            </div>

                    </div>
                    <div class="contenidoTarjetaAzul">
                            <h4 style=" margin: 0px 0px 0px 0px">Fecha de Muestreo</h4>
                            <h4 style="margin: 0px 0px 0px 0px"><?php echo $DatosObra['fechaMuestreo'];?></h4>
                            <h4 style="margin: 0px 0px 0px 0px">Fecha de Prueba</h4>
                            <h4 style="margin: 0px 0px 0px 0px"><?php echo $DatosMuestras['fechaPrueba7'];?></h4>
                            <h4 style="margin: 0px 0px 0px 0px">Resultado Prueba</h4>
                            <input style="margin: 0px 0px 0px 0px" id="diasSiete" class="noVisible" value="<?php echo $DatosMuestras['resultado7'];?>">
                    </div>
                    <div class="centrar">
                            <button id="botonRegistrarPrueba" class="TarjetaAzulBtnModificar_registrar" onclick="mostrarInput('diasSiete','TarjetaAzulBotones','botonRegistrarPrueba')">Registrar Prueba</button>
                            <div id="TarjetaAzulBotones">
                                    <button id="botonGuardarPrueba" class="TarjetaAzulBtnGuardar" onclick="guardarRegistro('diasSiete','checkbox','TarjetaAzulBotones','botonRegistrarPrueba')">Guardar</button>
                                    <button id="botonCancelarPrueba" class="TarjetaAzulBtnCancelar"  onclick="cancelarRegistro('diasSiete','checkbox','TarjetaAzulBotones','botonRegistrarPrueba')">Cancelar</button>
                            </div>
                    </div>
            </div>


           <div class="contenedorTarjetaAzul">
                    <div class="hederTarjetaAzul">
                            <div class="TarjetaAzul_round">
                                <input type="checkbox" id="checkbox1"/>
                                <label for="checkbox1"></label>
                            </div>
                            <div class="textoTarjetaAzul">
                                <h2 style="font-size:24px;margin: 0px 0px 0px 0px">Muestra 14 Dias</h2>
                                <h4 style="font-size:14px;margin: 0px 0px 0px 0px"><?php echo $DatosMuestras['idMuestra14'];?></h4>
                            </div>
            
                    </div>
                    <div class="contenidoTarjetaAzul">
                            <h4 style=" margin: 0px 0px 0px 0px">Fecha de Muestreo</h4>
                            <h4 style="margin: 0px 0px 0px 0px"><?php echo $DatosObra['fechaMuestreo'];?></h4>
                            <h4 style="margin: 0px 0px 0px 0px">Fecha de Prueba</h4>
                            <h4 style="margin: 0px 0px 0px 0px"><?php echo $DatosMuestras['fechaPrueba14'];?></h4>
                            <h4 style="margin: 0px 0px 0px 0px">Resultado Prueba</h4>
                            <input style="margin: 0px 0px 0px 0px" id="diasUnoCuatro" class="noVisible" value="<?php echo $DatosMuestras['resultado14'];?>">
                    </div>
                    <div class="centrar">
                            <button id="botonRegistrarPruebaDos" class="TarjetaAzulBtnModificar_registrar" onclick="mostrarInput('diasUnoCuatro','TarjetaAzulBotonesDos','botonRegistrarPruebaDos')">Registrar Prueba</button>
                            <div id="TarjetaAzulBotonesDos">
                                    <button id="botonGuardarPruebaDos" class="TarjetaAzulBtnGuardar" onclick="guardarRegistro('diasUnoCuatro','checkbox1','TarjetaAzulBotonesDos','botonRegistrarPruebaDos')">Guardar</button>
                                    <button id="botonCancelarPruebaDos" class="TarjetaAzulBtnCancelar"  onclick="cancelarRegistro('diasUnoCuatro','checkbox1','TarjetaAzulBotonesDos','botonRegistrarPruebaDos')">Cancelar</button>
                            </div>
                    </div>
            </div>


            <div class="contenedorTarjetaAzul">
                    <div class="hederTarjetaAzul">
                            <div class="TarjetaAzul_round">
                                <input type="checkbox" id="checkbox2"/>
                                <label for="checkbox2"></label>
                            </div>
                            <div class="textoTarjetaAzul">
                                <h2 style="font-size:24px;margin: 0px 0px 0px 0px">Muestra 28 Dias</h2>
                                <h4 style="font-size:14px;margin: 0px 0px 0px 0px"><?php echo $DatosMuestras['idMuestra28'];?></h4>
                            </div>
                
                    </div>
                    <div class="contenidoTarjetaAzul">
                            <h4 style=" margin: 0px 0px 0px 0px">Fecha de Muestreo</h4>
                            <h4 style="margin: 0px 0px 0px 0px"><?php echo $DatosObra['fechaMuestreo'];?></h4>
                            <h4 style="margin: 0px 0px 0px 0px">Fecha de Prueba</h4>
                            <h4 style="margin: 0px 0px 0px 0px"><?php echo $DatosMuestras['fechaPrueba14'];?></h4>
                            <h4 style="margin: 0px 0px 0px 0px">Resultado Prueba</h4>
                            <input style="margin: 0px 0px 0px 0px" id="diasDosOcho" class="noVisible" value="<?php echo $DatosMuestras['resultado28'];?>">
                    </div>
                    <div class="centrar">
                            <button id="botonRegistrarPruebaTres" class="TarjetaAzulBtnModificar_registrar" onclick="mostrarInput('diasDosOcho','TarjetaAzulBotonesTres','botonRegistrarPruebaTres')">Registrar Prueba</button>
                            <div id="TarjetaAzulBotonesTres">
                                    <button id="botonGuardarPruebaTres" class="TarjetaAzulBtnGuardar" onclick="guardarRegistro('diasDosOcho','checkbox2','TarjetaAzulBotonesTres','botonRegistrarPruebaTres')">Guardar</button>
                                    <button id="botonCancelarPruebaTres" class="TarjetaAzulBtnCancelar"  onclick="cancelarRegistro('diasDosOcho','checkbox2','TarjetaAzulBotonesTres','botonRegistrarPruebaTres')">Cancelar</button>
                            </div>
                    </div>
            </div>


        </div>
        <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
        <div class="tarjetaBlanca centrar">
            <div class="botonesEliminarImprimer">
                <button class="footerImprimir_Boton">Imprimir</button>
                <button class="footerEliminar_Boton" onclick="openModal()">Eliminar obra</button>
            </div>
        </div>
</div>


        <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
    </div>
    <!-- ---------------------- -->

    <div id="contenedorModal">
<div id="fondoModal"></div>
    <div class="modal">
        <p class="textoModal">
            ¿Desea ELIMINAR la obra?
        </p>
        <button class="eliminarBotonModal"onclick="eliminarObra(<?php echo $id; ?>)">Eliminar</button>
        <button class="cancelarBotonModal"  onclick="closeModal()">Cancelar</button>
    </div>
    
</div>
<div id="contenedorModalEliminado">
<div id="fondoModal"></div>
    <div class="modal">
        <p class="textoModal">
            Obra eliminada
        </p>
        <button class="OK" onclick="window.location.href='obras.php'">OK</button>
    </div>
    
</div>





        
    </body>
</html>