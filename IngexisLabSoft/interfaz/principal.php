<?php 
    session_start();
    include '../Logica/claseProcedures.php';
    if(isset($_SESSION["correosesion"])){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_POST["btnPrincipal"]==1){
                
                header('Location: clientes.php');
            }
            if($_POST["btnPrincipal"]==2){
                
                header('Location: obras.php');
            }
            if($_POST["btnPrincipal"]==3){
                
                header('Location: usuarios.php');
            }
            if($_POST["btnPrincipal"]==4){
                unset($_SESSION["correosesion"]);
                header('Location: login.php');
            }
        }  
    }else{
        header('Location: login.php');
    }
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
        <form action="Principal.php" method="POST">
            <div id="headerPrincipal">
                <h1>Ingexis <br> Labsoftware</h1>
                <?php
                    echo '<div id="imgUserHeader" style="background-image: url('."'".$_SESSION["imagen"]."'".');"></div>';
                ?>
            </div>
            <div id="myNav" style="height: 100%;">
                <div id="desenfoque"></div>
                <div id="contenedorPrincipal">
                    <button type="POST" name="btnPrincipal" class="principal" id="bClientes"onclick="window.location.href='clientes.php'" value="1">Clientes</button>
                    <button type="POST" name="btnPrincipal" class="principal" id="bObras" onclick="window.location.href='obras.php'"value="2">Obras</button>
                    <button type="POST" name="btnPrincipal" class="principal" id="bUsuarios"onclick="window.location.href='usuarios.php'"value="3">Usuarios</button>
                    <button type="POST" name="btnPrincipal" id="cerrarSesion" value="4">Cerrar Sesión</button>
                </div>
            </div> 
        </form>
    </body>
</html>