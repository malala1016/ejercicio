<?php

/**
 * Termina la sesion actual
 */

//aqui se destruyen todas las variables almacenadas en los cookies
//y cuando se cierra la sesion, envia al usuario a la pagina de index.

//el start continua la sesion que yo tenia en el main
session_start();
// Destruye todas las variables de la sesion
session_unset();
// Finalmente, destruye la sesion
session_destroy();
 
//Redireccionar a la pagina de login
header ("Location: index.php");

?>