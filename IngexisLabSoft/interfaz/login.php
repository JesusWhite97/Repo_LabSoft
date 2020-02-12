<?php 
    session_start();
    include '../Logica/claseProcedures.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $correoIn = $_POST["email"];
        $BD = new Procedimientos();
        $Existe = $BD->ValidaCorreo($correoIn);
        if($Existe == "si"){
            $_SESSION["correosesion"] = $correoIn;
            $DatosUser = $BD->infoUsuario($correoIn);
            $_SESSION["imagen"] = $DatosUser["imagen"];
            $_SESSION["titulo"] = $DatosUser["titulo"];
            $_SESSION["puesto"] = $DatosUser["puesto"];
            $_SESSION["primer_nombre"] = $DatosUser["primer_nombre"];
            $_SESSION["segundo_nombre"] = $DatosUser["segundo_nombre"];
            $_SESSION["primer_apellido "] = $DatosUser["primer_apellido"];
            $_SESSION["segundo_apellido "] = $DatosUser["segundo_apellido"];
            $_SESSION["rfc"] = $DatosUser["rfc"];
            $_SESSION["curp"] = $DatosUser["curp"];
            $_SESSION["numero_contacto"] = $DatosUser["numero_contacto"];
            $_SESSION["email"] = $DatosUser["email"];
            $_SESSION["calle"] = $DatosUser["calle"];
            $_SESSION["entre"] = $DatosUser["entre"];
            $_SESSION["numero"] = $DatosUser["numero"];
            $_SESSION["codigo_postal"] = $DatosUser["codigo_postal"];
            $_SESSION["colonia"] = $DatosUser["colonia"];
            header('Location: loginPassword.php');
        }else{
            echo "<script type='text/javascript'>alert('¡Correo No Valido!');</script>";
        }
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../img/Logo.ico" />
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/main.js"></script>
    <title>Ingexis LabSoftware</title>
</head>
<body>
    <form action="login.php" method="POST">
        <div id="contenedorLogin">
            <div id="contenedorTituloLogin">
                <div id="imgLogin"></div>
                <h2 id="tituloLogin">Software de laboratorio de <br> control de calidad de<br>concretos.</h2>
            </div>
            <div id="contenedorInputLogin">                
                <input type="email" name="email" id="inputLogin" placeholder="Correo Electrónico">
                <button type="submit" id="footerGuardar_Boton" style="margin:00px auto;">Iniciar sesión</button>
            </div>
        </div>
    </form>
</body>
</html>

