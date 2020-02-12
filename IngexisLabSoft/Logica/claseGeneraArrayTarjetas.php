<?PHP
    // ------------------------------------------------------------------------------
    // include_once '../BD/conexion.php';
    include_once "claseGeneraTarjetas.php";
    include_once "claseProcedures.php";
    
    function arrayTarjetas(){
        $tarjetas = new GenerarTarjetas();
        $cadena = "";
        $conex = new conexionMySQLi();
        $mysqli = $conex->conexion();
        //============================  
        $query = "SELECT * FROM `info_usuario`;";
        $resultado=$mysqli->query($query);
        while ($rows = $resultado->fetch_assoc())
        {
            echo($tarjetas->tarjetaUsuario($rows["imagen"],$rows["titulo"] , $rows["puesto"], $rows["numero_contacto"], $rows["email"]));
        }
        $resultado->free();
    }
    function arrayTarjetasClientes(){
        $tarjetas = new GenerarTarjetas();
        $cadena = "";
        $conex = new conexionMySQLi();
        $mysqli = $conex->conexion();
        //============================  
        $query = "SELECT * FROM `clinetes`;";
        $resultado=$mysqli->query($query);
        while ($rows = $resultado->fetch_assoc())
        {
            echo($tarjetas->tarjetaClietes($rows["img"],$rows["titulo"] , $rows["rfc"], $rows["nom_contacto"],$rows["num_contacto"], $rows["email"]));
        }
        $resultado->free();
    }
    // ------------------------------------------------------------------------------
    function arrayTarjetaObrasDias(){
        $tarjetas = new GenerarTarjetas();
        $cadena = "";
        $conex = new conexionMySQLi();
        $mysqli = $conex->conexion();
        //============================  
        $query = "SELECT DISTINCT fecha_muestreo FROM `obras` ORDER by fecha_muestreo DESC;";
        $resultado=$mysqli->query($query);
        while ($row = $resultado->fetch_assoc())
        {
            $cadena = '<div class="CuadritoDeAbajo">
            <div class="CentarCuadritoDeAbajo">
                <!-- =================================== -->
                <h3 class="tituloCuadritoAbajo">'.$row['fecha_muestreo'].'</h3>
                <!-- =================================== -->
                <div class="tarjetaBlCh_TarjetaConCheckDisplay">
                ';
        
            $fecha = $row['fecha_muestreo'];
            $query = "SELECT * FROM `obras` WHERE obras.fecha_muestreo='".$fecha."';";
            $resultado1=$mysqli->query($query);
            while ($rows = $resultado1->fetch_assoc())
            {
                $cadena = $cadena.$tarjetas -> tarjetaObra($rows["id_obra"],$rows["titulo"],$rows["direccion"],$rows["id_cliente"],$rows["id_usuario"]);

            }
            $cadena = $cadena.'
                        </div>
                    </div>
                </div>
            ';
            echo $cadena;
        }
        $resultado->free();
        




        }
    // ------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------
?>