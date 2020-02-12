<?php 
    session_start();
    include '../Logica/claseProcedures.php';
    if(isset($_SESSION["correosesion"])){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $correoIn = $_SESSION["correosesion"];
            $Contra = $_POST["password"];    
            $BD = new Procedimientos();
            $Existe = $BD->validaLogin($correoIn, $Contra);
            if($Existe == "si"){
                header('Location: principal.php');
            }else{
                echo "<script type='text/javascript'>alert('¡contraseña No Valida!');</script>";
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
        <form action="loginPassword.php" method="POST">
            <div id="contenedorLogin">
                <div id="contenedorTituloLogin">
                    <?php
                    echo' <div id="imgUser" style="background-image: url('."'".$_SESSION["imagen"]."'".');"></div>';
                    ?>
                    <?php
                    echo '<h2 id="tituloLogin">'.$_SESSION["titulo"].'</h2>';
                    ?>
                </div>
                <div id="contenedorInputLogin">
                    <input type="password" name="password" id="inputLogin" placeholder="Contraseña">
                    <button type = "submit" id="footerGuardar_Boton" style="margin:00px auto;">Iniciar sesión</button>
                </div>
            </div>
        </form>
    </body>
</html>