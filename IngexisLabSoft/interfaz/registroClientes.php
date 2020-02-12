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
            <header id="encabezadoBotones">
                <button id="regresar" onclick="window.location.href='clientes.php'"></button>
                <h2 id="titulo">Registro Clientes</h2>
                <button onclick="openNav()" id="menu"></button>
            </header> 
            <div class="contenedorCentradoResponsivo"> 
                <div class="tarjetaBlanca">  
                    <div id="tituloContenedor">
                        <!-- ======================================================================= -->
                        <div id="editarImagen">
                        <form id="formImg">
                            <input class="inputImg" id="inImg" type='file' name="archivo[]" multiple="multiple" accept=".png, .jpg, .jpeg, .png, .gif" onchange="readURL(this);"/>
                        </form>
                            <label for="inImg"></label>
                            <div id="blah"> </div>
                        </div>
                        <!-- ======================================================================= -->
                        <input id="tituloInfo" class="registro inputTexto mayus" type="text" >
                        <p class="textoAyuda textoAyudaTitulo" >Titulo</p>
                    </div>
                </div>
                <div class="tarjetaBlanca">
                    <input class="registro" type="text" id="nombre">
                    <p class="textoAyuda">Nombre de la empresa</p>
                    <input class="registro mayus" type="text" id="rfc">
                    <p class="textoAyuda">RFC</p>
                    <input class="registro" type="text" id="direccion">
                    <p class="textoAyuda">Dirección</p>
                    <div class="inputEnLinea">
                        <input class="registro" type="text" id="cp">
                        <input class="registro" type="text" id="colonia">
                        <p class="textoAyuda">Codigo Postal</p>
                        <p class="textoAyuda">Colonia</p>
                    </div>
                    <input class="registro" type="text" id="ciudad">
                    <p class="textoAyuda">Ciudad</p>
                </div>
                <div class="tarjetaBlanca">
                        <input class="registro" type="text" id="nombreContacto">
                        <p class="textoAyuda">Nombre del Contacto</p>
                        <input class="registro" type="tel" id="telefono">
                        <p class="textoAyuda">Telefono del Contacto</p>
                        <input class="registro" type="email" id="email">
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
                                <button class="guardarBotonModal"onclick="registrarCliente()">Guardar</button>
                                <!-- ======================================================================= -->
                                <button class="cancelarBotonModal"  onclick="closeModal()">Cancelar</button>
                            </div>
                        </div>
                        <div id="contenedorModalEliminado">
                            <div id="fondoModal"></div>
                                <div class="modal">
                                    <p id="textoExito" class="textoModal">
                                       Cliente guardado.
                                    </p>
                                    <button class="OK" onclick="window.location.href='clientes.php'">OK</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </body>
</html>
