<?php
	//MySQLi
	$mysqli = new mysqli('localhost', 'root', '', 'ingexis');
	if ($mysqli -> connect_errno)
	{
		// die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() . ") " . $mysqli -> mysqli_connect_error());
	}
	else
	echo "Conexión exitosa!";
	echo "<br>";
	// $mysqli -> mysqli_close();
	//===================================================================================================================
	//MySQLi
	// if ($mysqli->query("UPDATE `usuarios` SET `TipoUsuario` = 'Profe' WHERE `usuarios`.`IdUsuarios` = 2;") === TRUE)
	// {
	// 	printf($mysqli->affected_rows." Filas afectadas");
	// 	echo "<br>";
	// }
	// else
	// echo "Error al ejecutar el comando:".$mysqli->error;
	//===================================================================================================================
	//MySQLi
	$query = "SELECT * FROM usuarios";
	$resultado=$mysqli->query($query);
	print("<table>");
	while ($rows = $resultado->fetch_assoc())
	{
		print("<tr>");
		print("<td>".$rows["id_usuario"]."</td>");
		print("<td>".$rows["correo"]."</td>");
		print("<td>".$rows["password "]."</td>");
		print("</tr>");
	}
	print("</table>");
	$resultado->free();
?>