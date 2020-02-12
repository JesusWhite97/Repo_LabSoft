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
    <header id="encabezadoBotones">
    <button id="regresar" onclick="goBack()">
        </button>
        <h2 id="titulo">
                Registro ID muestras
        </h2>
        <button onclick="openNav()" id="menu">
        </button>
    </header> 
    <div class="contenedorCentradoResponsivo">
    <!-- ---------------------- -->
    <div class="tarjetaBlanca centrar">
            <h1 class="tituloPagina" style="margin: 0px 0px 0px 0px">Obra Los Beldadas</h1>
            <h4 class="subtituloPagina" style="margin: 0px 0px 0xp 0px">Baja Construccion</h4>
        </div>
    <!-- ---------------------- -->
    <div class="tarjetaBlanca">
                    <label class="titulo">Descripción:</label>
                    <textarea id="descripcion">Carretera al norte kilometro 5 frente a rancho Los Beldadas de Don Toño.</textarea>
    </div>      
    <!-- ---------------------- -->
    <div class="tarjetaBlanca">
        <p class="titulo"> 7 dias </p>
        <input class="registro" placeholder="Ingresa ID muestra 7 días">
        <p class="textoAyuda">Número de muestra</p>
        <p class="titulo"> 14 dias</p>
        <input class="registro" placeholder="Ingresa ID muestra 12 días">
        <p class="textoAyuda">Número de muestra </p>
        <p class="titulo"> 28 dias</p>
        <input class="registro" placeholder="Ingresa ID muestra 28 días">
        <p class="textoAyuda">Número de muestra </p>
    </div>
    <!-- ---------------------- -->
    <div class="tarjetaBlanca">
        <form>
            <label class="titulo">Descripción:</label>
            <textarea class="registro" id="descripcion"></textarea>
        </form>
    </div>
    
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
        <p class="textoModal">
            ¿Desea GUARDAR las muestras?
        </p>
        <button class="guardarBotonModal"onclick="openModalEliminado()">Guardar</button>
        <button class="cancelarBotonModal"  onclick="closeModal()">Cancelar</button>
    </div>
    
</div>
<div id="contenedorModalEliminado">
<div id="fondoModal"></div>
    <div class="modal">
        <p class="textoModal">
            Muestras guardadas
        </p>
        <button class="OK" onclick="window.location.href='obras.php'">OK</button>
    </div>
    
</div>

<div id="contenedorModal">
<div id="fondoModal"></div>
    <div class="modal">
        <p class="textoModal">
            ¿Desea GUARDAR la obra?
        </p>
        <button class="guardarBotonModal"onclick="openModalEliminado()">Guardar</button>
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







        
    </body>
</html>