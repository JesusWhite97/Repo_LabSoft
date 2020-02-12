<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/main.css">
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>

    <title>Ingexis LabSoftware</title>
</head>
    <body>
        <header id="encabezadoBotones">
            <button id="regresar" onclick="window.location.href='usuarios.php'">
            </button>
            <h2 id="titulo">
                    Registro de usuario
            </h2>
            <button onclick="openNav()" id="menu">
            </button>
        </header>
        <div class="contenedorCentradoResponsivo"> 
        <div class="tarjetaBlanca">     
        <div id="tituloContenedor">
            <div id="editarImagen" style=" background-image: url('');  background-size: cover; background-position: center;">
            <form id="formImg">
            <input class="inputImg" id="inImg" name="archivo[]" type='file' accept=".png, .jpg, .jpeg, .png, .gif" onchange="readURL(this);" value=""/>
            </form>
                        <label id="botonImg" for="inImg"></label>
                        <div id="blah"> </div>
            </div>
            
            <input id="tituloInfo" class="registro" style="color:#605A77; border-bottom:2px solid #848484;text-shadow:none;width:90%;" value="">
            <p class="textoAyuda" style="text-align: center;color:#848484; text-shadow:none;">Titulo</p>
        </div>
    </div>

    <div class="tarjetaBlanca">
        <select id="puesto" class="registro">
        <option value="Administrador">Administrador</option>
        <option value="Laboratorista 1">Laboratorista 1</option>
        <option value="Laboratorista 2">Laboratorista 2</option>
        <option value="Jefe de Laboratorio">Jefe de Laboratorio</option>
        </select>
        <p class="textoAyuda" style="text-align: center;">Puesto</p>
    </div>

<div class="tarjetaBlanca">
        <div class="inputEnLinea">
                <input class="registro" id="primerNombre"type="text" value="">
                <input class="registro" id="segundoNombre" type="text" value="">
                <p class="textoAyuda">Primer Nombre</p>
                <p class="textoAyuda">Segundo Nombre</p>
        </div>
        <div class="inputEnLinea">
                <input class="registro" id="apellidoPaterno" type="text" value="">
                <input class="registro" id="apellidoMaterno"type="text" value="">
                <p class="textoAyuda">Apellido Paterno</p>
                <p class="textoAyuda">Apellido Materno</p>
        </div>
        <input class="registro" id="rfc" type="text" value="">
        <p class="textoAyuda">RFC</p>
        <input class="registro" id = "curp" type="text" value="">
        <p class="textoAyuda">CURP</p>
    </div>

    <div class="tarjetaBlanca">
            <p class="titulo">Contacto:</p>
            
                    <input class="registro" type="tel"id="telefono" value="">
                    <p class="textoAyuda">Número celular</p>
                    
            
            <input  class="registro"type="email" id="email" value="">
                <p class="textoAyuda">Email</p>
                <input class="registro" type="password" id="password" value="">
                <p class="textoAyuda" >Contraseña</p>
    </div>

    <div class="tarjetaBlanca">
                <p class="titulo">Dirección</p>
                <input class="registro" id="calle"type="text" value="">
                <p class="textoAyuda">Calle</p>
                <input  class="registro" id="entre" type="text" value="">
                <p class="textoAyuda">Entre</p>
                <div class="inputEnLinea">
                        <input class="registro" id="ciudad" type="text" value="">
                        <input class="registro" id="cp" type="text" value="">
                        <p class="textoAyuda">Ciudad</p>
                        <p class="textoAyuda">Código Postal</p>
                </div>
                <input class="registro" id="colonia" type="text" value="">
                <p class="textoAyuda">Colonia</p>
    </div>

    <div class="tarjetaBlanca">
            <div id="botonGuardar" class="botonesEliminarImprimer">
                <button id="footerGuardar_Boton" onclick="openModal()" style="grid-column: 1 / span 2;">Guardar</button>
            </div>
    </div>
                





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
        <p class="textoModal">
            ¿Desea GUARDAR el usuario?
        </p>
        <button class="guardarBotonModal"onclick="registrarUsuario()">Guardar</button>
        <button class="cancelarBotonModal"  onclick="closeModal()">Cancelar</button>
    </div>
    
</div>
<div id="contenedorModalEliminado">
<div id="fondoModal"></div>
    <div class="modal">
        <p id="textoExito" class="textoModal">
            Usuario guardado.
        </p>
        <button class="OK" onclick="window.location.href='usuarios.php'">OK</button>
    </div>
    
</div>
    </body>
</html>
