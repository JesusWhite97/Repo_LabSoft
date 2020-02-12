<?PHP
    session_start();
    include '../Logica/claseProcedures.php';
    $id = $_GET["id"];
    $BD = new Procedimientos();
        $DatosObra = $BD->infoObra($id);
        $DatosCliente = $BD->infoClienteID($DatosObra["cliente"]);
        $DatosUsuario = $BD->infoUsuarioID($DatosObra["usuario"]);
        $DatosMuestras = $BD->infoMuestras($id);

        function printOptionsClientes($selected){
            $BD = new Procedimientos();
            $options = $BD->todoClientes();
            var_dump($selected);
            
            for($i = 0; $i < count($options); $i++){
                if($options[$i]["id_clinete"] == $selected){
                    echo '<option value="'.$options[$i]["id_clinete"].'" selected>'.$options[$i]["titulo"].'</option>';
                }else{
                    echo '<option value="'.$options[$i]["id_clinete"].'">'.$options[$i]["titulo"].'</option>';
    
                }
            }
        }
        function printOptionsUsuarios($selected){
            $BD = new Procedimientos();
            $options = $BD->todoInfoUsuarios();
            
            for($i = 0; $i < count($options); $i++){
                if($options[$i]["usuario_id"] == $selected){
                    echo '<option value="'.$options[$i]["usuario_id"].'" selected>'.$options[$i]["titulo"].'</option>';
                }else{
                    echo '<option value="'.$options[$i]["usuario_id"].'">'.$options[$i]["titulo"].'</option>';
    
                }
            }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ingexis LabSoftware</title>
    <!-- ============================================================= -->
    <script src="../js/main.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <script
            src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
    <!-- ============================================================= -->
</head>
<body>


<header id="encabezadoBotones">
                    <button id="regresar" onclick="goBack()">
                        </button>
                        <h2 id="titulo">
                                Modificar obra: <?php echo $DatosObra["titulo"];?>
                        </h2>
                        <button onclick="openNav()" id="menu">
                        </button>
                    </header> 
                    <!-- ---------------------- -->
                    <div class="contenedorCentradoResponsivo">
                        <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
                        <div class="tarjetaBlanca centrar">
                                <input id="titulo" class="registro" value="<?php echo $DatosObra["titulo"];?>">
                                <p class="textoAyuda">Titulo de la obra</p>
                                <select class="registro">
                                <?php printOptionsClientes($DatosCliente["idCliente"]); ?>
                                </select>
                                <p class="textoAyuda">Cliente</p>
                    
                        </div>
                        <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
                        <div class="tarjetaBlanca">
                            <input id="encargado" class="registro" value="<?php echo $DatosObra["encargado"];?>">
                            <p class="textoAyuda">Encargado de la obra</p>
                            <input id ="direccion" class="registro" value="<?php echo $DatosObra["direccion"];?>">
                            <p class="textoAyuda">Dirección de la obra</p>
                            <input type="date" class="registro" value="2018-07-22" min="2018-01-01" max="2018-12-31" value="<?php echo $DatosObra["fechaMuestreo"];?>">
                            <p class="textoAyuda">Fecha de muestreo</p>
                        </div>
                        <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
                        <div class="tarjetaBlanca">
                            <p class="titulo"> Asignado para muestreo </p>
                            <select class="registro">
                                <?php printOptionsUsuarios($DatosUsuario["usuario_id"]); ?>
                            </select>
                            
                        </div>
                        <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
                        <div class="tarjetaBlanca">
                            <form>
                                    <label class="titulo">Descripción:</label>
                                    <textarea class="registro" id="descripcion" value="<?php echo $DatosObra["descripcion"];?>"><?php echo $DatosObra["descripcion"];?></textarea>
                            </form>
                        </div>
                        <!-- ≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡≡ -->
                        <button id="footerGuardar_Boton" onclick="openModal()">Guardar</button> 
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