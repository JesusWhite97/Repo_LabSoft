<?PHP
    session_start();
    include '../Logica/claseProcedures.php';
    $correoIn = $_GET["email"];
    $BD = new Procedimientos();
    $Existe = $BD->ValidaCorreo($correoIn);
    if($Existe == "si"){
        $DatosUser = $BD->infoUsuario($correoIn);
        $img= $DatosUser["imagen"];
        $titulo = $DatosUser["titulo"];
        $puesto = $DatosUser["puesto"];
        $primerNombre = $DatosUser["primer_nombre"];
        $segundoNombre = $DatosUser["segundo_nombre"];
        $apellidoPaterno = $DatosUser["primer_apellido"];
        $apellidoMaterno = $DatosUser["segundo_apellido"];
        $rfc = $DatosUser["rfc"];
        $curp = $DatosUser["curp"];
        $numeroContacto = $DatosUser["numero_contacto"];
        $calle = $DatosUser["calle"];
        $entre = $DatosUser["entre"];
        $numeroCasa = $DatosUser["numero"];
        $cp = $DatosUser["codigo_postal"];
        $colonia = $DatosUser["colonia"];
        $ciudad = $DatosUser["ciudad"];
    }

    function printOptions($selected){
        $options =array(
            "Administrador",
            "Laboratorista 1",
            "Laboratorista 2",
            "Jefe de Laboratorio"
        );
        for($i = 0; $i < count($options); $i++){
            if($options[$i] == $selected){
                echo '<option value="'.$options[$i].'" selected>'.$options[$i].'</option>';
            }else{
                echo '<option value="'.$options[$i].'">'.$options[$i].'</option>';

            }
        }
    }
?>
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
                    <?php echo $titulo; ?>
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
            
            <input id="tituloInfo"value="<?php echo $titulo; ?>"> 
            <button class="tituloBoton" id="editar" onclick="cambiarPantallaEditar('<?php echo $titulo; ?>')">Editar</button>
        </div>
    </div>

    <div class="tarjetaBlanca">
        <select id="puesto">
            <?php printOptions($puesto); ?>
        </select>
        <p class="textoAyuda" style="text-align: center;">Puesto</p>
    </div>

<div class="tarjetaBlanca">
        <div class="inputEnLinea">
                <input id="primerNombre"type="text" value="<?php echo $primerNombre; ?>">
                <input id="segundoNombre" type="text" value="<?php echo $segundoNombre; ?>">
                <p class="textoAyuda">Primer Nombre</p>
                <p class="textoAyuda">Segundo Nombre</p>
        </div>
        <div class="inputEnLinea">
                <input id="apellidoPaterno" type="text" value="<?php echo $apellidoPaterno; ?>">
                <input id="apellidoMaterno"type="text" value="<?php echo $apellidoMaterno; ?>">
                <p class="textoAyuda">Apellido Paterno</p>
                <p class="textoAyuda">Apellido Materno</p>
        </div>
        <input id="rfc" type="text" value="<?php echo $rfc; ?>">
        <p class="textoAyuda">RFC</p>
        <input id = "curp" type="text" value="<?php echo $curp; ?>">
        <p class="textoAyuda">CURP</p>
    </div>

    <div class="tarjetaBlanca">
            <p class="titulo">Contacto:</p>
            
                    <input type="text"id="telefono" value="<?php echo $numeroContacto; ?>">
                    <p class="textoAyuda">Número celular</p>
                    
            
            <input type="text" id="email" value="<?php echo $correoIn; ?>">
                <p class="textoAyuda">Email</p>
                <input type="text" id="password" value="******">
                <p class="textoAyuda" >Contraseña</p>
        </div>

        <div class="tarjetaBlanca">
                <p class="titulo">Dirección</p>
                <input id="calle"type="text" value="<?php echo $calle; ?>">
                <p class="textoAyuda">Calle</p>
                <input  id="entre" type="text" value="<?php echo $entre; ?>">
                <p class="textoAyuda">Entre</p>
                <div class="inputEnLinea">
                        <input id="ciudad" type="text" value="<?php echo $ciudad; ?>">
                        <input id="cp" type="text" value="<?php echo $cp; ?>">
                        <p class="textoAyuda">Ciudad</p>
                        <p class="textoAyuda">Código Postal</p>
                </div>
                <input id="colonia" type="text" value="<?php echo $colonia; ?>">
                <p class="textoAyuda">Colonia</p>
            </div>
            <div class="tarjetaBlanca centrar">
            <div id="botonesDelPrint" class="botonesEliminarImprimer">
                <button class="footerImprimir_Boton">Imprimir</button>
                <button class="footerEliminar_Boton" onclick="openModal()">Eliminar Usuario</button>
            </div>
            <div id="botonGuardar" class="botonesEliminarImprimer" style="display:none;">
                <button id="footerGuardar_Boton" onclick="openModal()" style="grid-column: 1 / span 2;">Guardar</button>
            </div>
        </div>
</div>






        
  <div id="myNav">
        <div id="desenfoque"></div>
        <div id="contenedorPrincipal">
                    <button type="POST" name="btnPrincipal" class="principal" id="bClientes"onclick="window.location.href='clientes.php'" value="1">Clientes</button>
                    <button type="POST" name="btnPrincipal" class="principal" id="bObras" onclick="window.location.href='obras.php'"value="2">Obras</button>
                    <button type="POST" name="btnPrincipal" class="principal" id="bUsuarios"onclick="window.location.href='usuarios.php'"value="3">Usuarios</button>
                    <button type="POST" name="btnPrincipal" id="cerrarSesion" value="4">Cerrar Sesión</button>
        </div>
</div>
<div id="contenedorModal">
<div id="fondoModal"></div>
    <div class="modal">
        <p id = "textoModalPregunta"class="textoModal">
            ¿Desea ELIMINAR: <?php echo $titulo;?>?
        </p>
        <button id ="botonEliminarModal"class="eliminarBotonModal"onclick="eliminarUsuario('<?php echo $correoIn; ?>')">Eliminar</button>
        <button id ="botonGuardarModal"class="guardarBotonModal" style="display:none;" onclick="modificarUsuario('<?php echo $img; ?>')">Modificar</button>
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

