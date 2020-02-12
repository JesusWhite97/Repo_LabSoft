<?php
include "claseProcedures.php";

$procedimientos = new claseProcedures();

if(isset($_GET["userDel"])){

    return $procedimientos->eliminarUsuario($_GET["userDel"]);

?>