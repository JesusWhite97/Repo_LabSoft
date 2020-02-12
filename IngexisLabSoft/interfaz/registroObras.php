<?php
    session_start();
    include '../Logica/claseProcedures.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $BD = new Procedimientos();
        $infoEX = $BD->InfoXdeCliente($_POST["Cliente"]);
        $titulo = $_POST["Titulo"];
        $cliente = $_POST["Cliente"];
        $encargadoO = $_POST["encargadoObra"];
        $direccion = $_POST["direccionObra"];
        $fechaMuestreo = $_POST["fechaMuestreo"];
        $usuarioA = $_POST["usuarioAsignado"];
        $descripcion = $_POST["descripcion"];
        $numTel = $infoEX["numC"];
        $email = $infoEX["email"];
        $salida = $BD->agregarobras($titulo, $cliente, $direccion, $encargadoO, $numTel, $email, $usuarioA, $descripcion, $fechaMuestreo);
        // ----------------------------------
        if($salida == "Registro Existoso."){
            echo "<script>alert('".$salida."')</script>";
            unset($_POST);
            header('Location: obras.php');
        }else{
            echo "<script>alert('hay un error en el registro')</script>";
        }
    }
    function printOptionsClientes(){
        $BD = new Procedimientos();
        $options = $BD->todoClientes();
        
        for($i = 0; $i < count($options); $i++){
                echo '<option value="'.$options[$i]["id_clinete"].'">'.$options[$i]["titulo"].'</option>';
        }
    }
    function printOptionsUsuarios(){
        $BD = new Procedimientos();
        $options = $BD->todoInfoUsuarios();
        
        for($i = 0; $i < count($options); $i++){
                echo '<option value="'.$options[$i]["usuario_id"].'">'.$options[$i]["titulo"].'</option>';
        }
    }
?>
<!-- ################################################################################################### -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Obras</title>
        <!-- ============================================================= -->
        <script src="../js/main.js"></script>
        <link rel="stylesheet" href="../css/main.css">
        <!-- ============================================================= -->
    </head>
    <body>
        <form action="registroObras.php" method="POST">
            <header id="encabezadoBotones">
                <button id="regresar" onclick="goBack()"></button>
                <h2 id="titulo">Registrar Obras</h2>
                <button onclick="openNav()" id="menu"></button>
            </header> 
            <!-- ---------------------- -->
            <div class="contenedorCentradoResponsivo">
                <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
                <div class="tarjetaBlanca centrar">
                    <input class="registro" name = "Titulo" >
                    <p class="textoAyuda">Titulo de la obra</p>
                    <select class="registro" name = "Cliente">
                    <?php printOptionsClientes(); ?>
                    </select>
                    <p class="textoAyuda">Cliente</p>
                </div>
                <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
                <div class="tarjetaBlanca">
                    <input class="registro" name = "encargadoObra" >
                    <p class="textoAyuda">Encargado de la obra</p>
                    <input class="registro" name = "direccionObra">
                    <p class="textoAyuda">Dirección de la obra</p>
                    <input type="date" name = "fechaMuestreo" class="registro" value="2018-07-22" min="2018-01-01" max="2018-12-31">
                    <p class="textoAyuda">Fecha de muestreo</p>
                </div>
                <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
                <div class="tarjetaBlanca">
                    <p class="titulo"> Asignado para muestreo </p>
                    <select class="registro" name = "usuarioAsignado">
                    <?php printOptionsUsuarios(); ?>
                    </select> 
                </div>
                <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
                <div class="tarjetaBlanca">
                    <label class="titulo">Descripción:</label>
                    <textarea name = "descripcion" class="registro" id="descripcion"></textarea>
                </div>
                <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
                <button id="footerGuardar_Boton" type = "submit"  >Guardar</button> 
                <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
                <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
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
                        ¿Desea GUARDAR la obra?
                    </p>
                    <button class="guardarBotonModal" onclick="openModalEliminado()">Guardar</button>
                    <button class="cancelarBotonModal" onclick="closeModal()">Cancelar</button>
                </div>
            </div>
            <div id="contenedorModalEliminado">
                <div id="fondoModal"></div>
                <div class="modal">
                    <p class="textoModal">Obra guardada</p>
                    <button class="OK" onclick="window.location.href='obras.php'">OK</button>
                </div>
            </div>
        </form>
    </body>
</html>