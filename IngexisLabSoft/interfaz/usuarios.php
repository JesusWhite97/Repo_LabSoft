<?php  
include "../Logica/claseGeneraArrayTarjetas.php";
    
    
?>

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
        <button id="regresar" onclick="window.location.href='principal.php'">
        </button>
        <h2 id="titulo">Usuarios</h2>
        <button onclick="openNav()" id="menu">
        </button>
    </header>
    <div id="contenedorBuscador">
            <input type="text" id="buscarEntrada" onkeyup="myFunction()" placeholder="Buscar..." title="Type in a name">
            <button id="agregar" onclick="window.location.href='registroUsuarios.php'"></button>
    </div> 
    <div id="contenedorGridResponsivo"> 
           <?PHP arrayTarjetas();?>
    </div>
    <div id="myNav">
        <div id="desenfoque"></div>
        <div id="contenedorPrincipal">
        <button class="principal" id="bClientes"onclick="window.location.href='clientes.php'">Clientes</button>
        <button class="principal" id="bObras" onclick="window.location.href='obras.php'">Obras</button>
        <button class="principal" id="bUsuarios"onclick="window.location.href='usuarios.php'">Usuarios</button>
        <button id="cerrarSesion">Cerrar Sesión</button>
        </div>
    </div>
</body>
</html>