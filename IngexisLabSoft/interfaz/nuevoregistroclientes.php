<?php
    // ==========================================
    session_start();
    include '../Logica/claseSubirImg.php';
    // ==========================================
    $imagenes = new uploadImg();
    if(isset($_FILES["archivo"]) && $_FILES["archivo"]["name"][0]){
        echo '<script>alert("'.$imagenes->GuardarImagen().'");</script>';
    }
    // ==========================================
?>
<!-- ################################################################################################# -->
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/main.css">
        <script src="../js/main.js"></script>
        <title>Ingexis LabSoftware</title>
    </head>
    <body>
        <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" enctype="multipart/form-data" name="inscripcion">
            <header id="encabezadoBotones">
                <button id="regresar" onclick="goBack()"></button>
                <h2 id="titulo">Registro Clientes</h2>
                <button onclick="openNav()" id="menu"></button>
            </header> 
            <div class="contenedorCentradoResponsivo"> 
                <div class="tarjetaBlanca">  
                    <div id="tituloContenedor">
                        <!-- ======================================================================= -->
                        <div id="editarImagen">
                            <input class="inputImg" id="inImg" type='file' name="archivo[]" multiple="multiple" accept=".png, .jpg, .jpeg, .png, .gif" onchange="readURL(this);"/>
                            <label for="inImg"></label>
                            <div id="blah"> </div>
                        </div>
                        <!-- ======================================================================= -->
                        <input class="registro inputTexto mayus" type="text">
                        <p class="textoAyuda textoAyudaTitulo">Titulo</p>
                    </div>
                </div>
                <div class="tarjetaBlanca">
                    <input class="registro" type="text">
                    <p class="textoAyuda">Nombre de la empresa</p>
                    <input class="registro mayus" type="text">
                    <p class="textoAyuda">RFC</p>
                    <input class="registro" type="text">
                    <p class="textoAyuda">Dirección</p>
                    <div class="inputEnLinea">
                        <input class="registro" type="text">
                        <input class="registro" type="text">
                        <p class="textoAyuda">Codigo Postal</p>
                        <p class="textoAyuda">Colonia</p>
                    </div>
                    <input class="registro" type="text">
                    <p class="textoAyuda">Ciudad</p>
                </div>
                <div class="tarjetaBlanca">
                        <input class="registro" type="text">
                        <p class="textoAyuda">Nombre del Contacto</p>
                        <input class="registro" type="text">
                        <p class="textoAyuda">Número del Contacto</p>
                        <input class="registro" type="text">
                        <p class="textoAyuda">Email</p>
                </div>
                <div class="tarjetaBlanca">
                    <label class="titulo">No hay notas</label>
                    <textarea class="registro" id="descripcion"></textarea>
                </div>
                <button id="footerGuardar_Boton" onclick="openModal()">Guardar</button>  
                <div id="myNav">
                    <div id="desenfoque"></div>
                        <div id="contenedorPrincipal">
                            <button class="principal" id="bClientes"onclick="window.location.href='clientes.php'">Clientes</button>
                            <button class="principal" id="bObras" onclick="window.location.href='obras.php'">Obras</button>
                            <button class="principal" id="bUsuarios"onclick="window.location.href='usuarios.php'">Usuarios</button>
                            <button id="cerrarSesion" onclick="window.location.href='login.php'">Cerrar Sesión</button>
                        </div>
                    </div>
                    <div id="contenedorModal">
                        <div id="fondoModal"></div>
                            <div class="modal">
                                <p class="textoModal">¿Desea GUARDAR la obra?</p>
                                <!-- ======================================================================= -->
                                <button type="submit" value="Enviar" class="trig" class="guardarBotonModal" onclick="openModalEliminado()">Guardar</button>
                                <!-- ======================================================================= -->
                                <button class="cancelarBotonModal"  onclick="closeModal()">Cancelar</button>
                            </div>
                        </div>
                        <div id="contenedorModalEliminado">
                            <div id="fondoModal"></div>
                                <div class="modal">
                                    <p class="textoModal">
                                        Obra guardada
                                    </p>
                                    <button class="OK" onclick="window.location.href='obras.php'">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
