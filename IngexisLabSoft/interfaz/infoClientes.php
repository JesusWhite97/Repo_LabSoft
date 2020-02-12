<?PHP
    session_start();
    include '../Logica/claseProcedures.php';
    $correoIn = $_GET["email"];
    $BD = new Procedimientos();
        $DatosUser = $BD->infoCliente($correoIn);
        $id = $DatosUser['idCliente'];
        $img= $DatosUser['img'];
        $titulo = $DatosUser["titulo"];
        $nombre = $DatosUser["nombre"];
        $rfc = $DatosUser["rfc"];
        $numeroContacto = $DatosUser["num_contacto"];
        $nombreContacto = $DatosUser["nom_contacto"];
        $direccion = $DatosUser["direccion"];
        $cp = $DatosUser["cp"];
        $colonia = $DatosUser["col"];
        $ciudad = $DatosUser["ciudad"];
        $notas = $DatosUser["notas"];
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
C:\wamp64\www\SunriseDevelopment\DesarrollodeSoftware\IngexisLabSoft\interfaz\infoClientes.php:7:
array (size=13)

    <body>
    <header id="encabezadoBotones">
            <button id="regresar" onclick="window.location.href='clientes.php'">
            </button>
            <h2 id="titulo">
                    Cliente: <?php echo $DatosUser["titulo"] ?>
            </h2>
            <button onclick="openNav()" id="menu">
            </button>
        </header>
        <div class="contenedorCentradoResponsivo"> 
                <div class="tarjetaBlanca"> 
                <div id="tituloContenedor">
                <div id="editarImagen" style=" background-image: url('<?php echo $img; ?>');  background-size: cover; background-position: center;">
                <form id="formImg">
                <input class="inputImg" id="inImg" name="archivo[]" type='file' accept=".png, .jpg, .jpeg, .png, .gif" onchange="readURL(this);" value="'<?php echo $img; ?>"/>
                </form>
                <label id="botonImg" for="inImg" style="display:none;"></label>
                <div id="blah"> </div>
                </div>
                <input id="tituloInfo"value="<?php echo $DatosUser["titulo"]; ?>"> 
                <button class="tituloBoton" id="editar" onclick="cambiarPantallaEditar('<?php echo $titulo; ?>')">Editar</button>
                </div>
                </div>



<div class="tarjetaBlanca">
        <input id="nombre" type="text" value="<?php echo $nombre ?>">
        <p class="textoAyuda">Nombre de la empresa</p>
        <input id="rfc" type="text" value="<?php echo $rfc ?>">
        <p class="textoAyuda">RFC</p>
        <input id="direccion" type="text" value="<?php echo $direccion ?>">
        <p class="textoAyuda">Dirección</p>
        <div class="inputEnLinea">
                <input id="cp" type="text"value="<?php echo $cp ?>" >
                <input id="colonia" type="text" value="<?php echo $colonia?>">
                <p class="textoAyuda">Codigo Postal</p>
                <p class="textoAyuda">Colonia</p>
        </div>
        <input id="ciudad" type="text" value="<?php echo $ciudad ?>">
        <p class="textoAyuda">Ciudad</p>
    </div>

        <div class="tarjetaBlanca">
                <input id="nombreContacto" type="text" value="<?php echo $nombreContacto ?>">
                <p class="textoAyuda">Nombre del Contacto</p>
                <input id="numeroContacto" type="text" value="<?php echo $numeroContacto ?>">
                <p class="textoAyuda">Número del Contacto</p>
                <input id="email" type="text" value="<?php echo $correoIn ?>">
                <p class="textoAyuda">Email</p>
        </div>
        <div class="tarjetaBlanca">
            <form>
                    <label class="titulo">No hay notas</label>
                    <textarea id="descripcion" value="<?php echo $notas ?>"></textarea>
            </form>
        </div>
        <div class="tarjetaBlanca centrar">
            <div id="botonesDelPrint" class="botonesEliminarImprimer">
                <button class="footerImprimir_Boton">Imprimir</button>
                <button class="footerEliminar_Boton" onclick="openModal()">Eliminar</button>
            </div>
            <div id="botonGuardar" class="botonesEliminarImprimer" style="display:none;">
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
            ¿Desea ELIMINAR el usuario?
        </p>
        <button id ="botonEliminarModal"class="eliminarBotonModal"onclick="eliminarCliente('<?php echo $correoIn; ?>')">Eliminar</button>
        <button id ="botonGuardarModal"class="guardarBotonModal" style="display:none;" onclick="modificarCliente('<?php echo $img; ?>')">Modificar</button>
        <button class="cancelarBotonModal"  onclick="closeModal()">Cancelar</button>
    </div>
    
</div>
<div id="contenedorModalEliminado">
<div id="fondoModal"></div>
    <div class="modal">
        <p class="textoModal">
            Usuario eliminado
        </p>
        <button class="OK" onclick="window.location.href='clientes.php'">OK</button>
    </div>
    
</div>
<input type="number" id="id" style="display:none" value="<?php echo $id;?>">
<div id="contenedorModal">
<div id="fondoModal"></div>
    <div class="modal">
        <p id = "textoModalPregunta"class="textoModal">
            ¿Desea ELIMINAR: <?php echo $titulo;?>?
        </p>
        <button id ="botonEliminarModal"class="eliminarBotonModal" onclick="eliminarCliente()">Eliminar</button>
        <button id ="botonGuardarModal"class="guardarBotonModal" style="display:none;" onclick="modificarCliente('<?php echo $img;?>'>Modificar</button>
        <button class="cancelarBotonModal"  onclick="closeModal()">Cancelar</button>
    </div>
    
</div>
<div id="contenedorModalEliminado">
<div id="fondoModal"></div>
    <div class="modal">
        <p class="textoModal" id="textoExito">
            Usuario eliminado
        </p>
        <button class="OK" onclick="cambiarPantallaInfo('<?php echo $titulo; ?>')">OK</button>
    </div>
    
</div>

    </body>
</html>