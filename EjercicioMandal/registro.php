<!DOCTYPE html>
<html>
	<head>
		<title>Registrarse</title>

		<meta charset="UTF-8" lang="es">
		<meta name="viewport" content="width=device-width,user-scalable=no">
		
		<link rel="stylesheet" href="css/styleTres.css">   
		<script type="text/javascript"></script> 

	 	
	 	<meta name="viewport" content="width=device-width, user-scalable=no">

	</head>

	<body id="registro-login">

		<header>
			<figure id="logo"> <!-- para decir que aqui va una imagen -->
				<img src="images/logo.png" alt="" />
			</figure>
			<h1>Mandal</h1>
			<h3>Registro</h3>
		</header>
			
			<section class="campos-log">

			<form name="user_form" action="guardar_registro.php" method="POST">
				<h3 class="etiqueta-campos">Nombre:</h3>
				<input type="text" class="campos" name="name" size="30" maxlength="100" />
				<h3 class="etiqueta-campos">Apellido:</h3>
				<input type="text" class="campos" name="surname" size="30" maxlength="100" />
				<h3 class="etiqueta-campos">Correo electrónico:</h3>
				<input type="text" class="campos" name="email" size="30" maxlength="100" />
				<h3 class="etiqueta-campos">Nombre de Usuario:</h3>
				<input type="text" class="campos" name="username" size="30" maxlength="100" />
				<h3 class="etiqueta-campos">Contraseña:</h3>
				<input type="password" class="campos" name="pass1" />
				<h3 class="etiqueta-campos">Repetir contraseña:</h3>
				<input type="password" class="campos" name="pass2" />
				<br />
				<input class="boton" id="boton-logs" type="submit" name="crear" value="Registrarse" />

         
         <!--abre parte de php-->

             <?php
				//se muestran los errores de validacion de usuario, si llegan al error

				if( isset( $_POST['status_registro'] ) )
				{
					switch( $_POST['status_registro'] )
					{
						case 1:
							?>
							<script type="text/javascript"> 
								alert("El usuario ya existe en la Base de Datos");
							</script>
							<?php
						break;          
						case 2:
							?>
							<script type="text/javascript"> 
								alert("Los passwords deben coincidir");
							</script>
							<?php       
						break;
						case 3:
							?>
							<script type="text/javascript"> 
								alert("Ocurrio un Error al Introducir los Datos");
							</script>
							<?php       
						break;
	        		}//Fin switch
	   			}
	    		?>

        <!--cierra parte de php-->

			</form>

			<br />

			<div class="iniciarSesion"><a class="call-to-action" href="index.php">Iniciar Sesión</a></div>

		</section>

	</body>

	
</html>