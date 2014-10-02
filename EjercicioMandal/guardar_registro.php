<?php

include_once("includes/database.php");

$link=Conectarse();
$name = $_POST['name'];
$surname= $_POST['surname'];
$email = $_POST['email'];
$username = $_POST['username'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];

$query = sprintf("SELECT usuario FROM usuarios WHERE usuarios.usuario = '%s'", $username); // este query compara la informacion ingresada con la existente en la base de datos

$result=mysql_query($query,$link);

//el condicional dice que si existen tales filas con ese nombre entonces lanza el echo indicado "Los passwords deben coincidir"
if(mysql_num_rows($result)){
	echo "El usuario ya existe en la Base de Datos";
} else {
//el free_result libera la memoria que se asocia con la variable result
	mysql_free_result($result);

	if($pass1!=$pass2) {
		echo "Los passwords deben coincidir";
	} else {

		$query = sprintf("INSERT INTO usuarios (nombre, apellido, correo, usuario, password)
		VALUES ('%s', '%s', '%s', '%s', '%s')", $name, $surname, $email, $username, $pass1);

		$result=mysql_query($query,$link);

		if(mysql_affected_rows()){
			header("Location: index.php");
		} else {
			echo "Ocurrio un Error al Introducir los Datos";
		}
	}
}

?>

