<?php
	class conexionMySQLi{
		//declaracion de variables
		//========================
		function conexion()
		{
			$mysqli = new mysqli('localhost', 'root', '', 'databaseingexis');
			if ($mysqli -> connect_errno) 
			{
				die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() . ") " . $mysqli -> mysqli_connect_error());
			}
			else
				return $mysqli;
        }
	}
?>