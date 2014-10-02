<!DOCTYPE html>

<html>

	<head>

		<title>Iniciar sesión</title>

		<meta charset="UTF-8" lang="es">
		<meta name="viewport" content="width=device-width,user-scalable=no">
		
		<link rel="stylesheet" href="css/styleDos.css">   
		<script type="text/javascript"></script>  

		<meta name="viewport" content="width=device-width, user-scalable=no">
		
	</head>
	

	<body id="registro-login">



     <!--abre parte de php-->
        <?php
		/* Con esto validamos si existe una id en nuestros cookies para continuar con la sesion iniciada y ejecuta la funcion redirect */
		  if(isset($_SESSION['user_id'])){
		   redirect();
		  }
		?>
     <!--cierra parte de php-->


		
		<div class="colorC">
			<figure id="logoDos"> <!-- para decir que aqui va una imagen -->
				<img src="images/logoDos.png" alt="" />
			</figure>
			<div class="h11"><h1>Mandal</h1></div>
			<div class="h33"><h3>Tu red para comentar...</h3></div>
			</div>
			
			
			<section class="campos-log">

			<form id="frmlogin" name="frmlogin"  method="POST" action="validar_usuario.php">

				<h3 class="etiqueta-campos">Nombre de usuario</h3>			
				<input class="campos" type="text" name="usuario" id="usuario" class="required" maxlength="50">
				<h3 class="etiqueta-campoDos">Contraseña</h3>
				<input class="campos" type="password" name="password" id="password" class="required"  maxlength="50">
				<input class="boton" id="boton-logs" type="submit" name="enviar" value="Iniciar sesión" >
				<br/>
				 <div class="registrarse"><a class="call-to-action" href="registro.php">Registrarse</a></div>	


            <!--abre parte de php-->
                <?php
    			//Mostramos los errores de validacion de usuario en esta misma pantalla usando mensajes de Javascript
				if( isset( $_POST['msg_error'] ) )
				{
					switch( $_POST['msg_error'] )
					{
						case 1:
							?>
							<script type="text/javascript"> 
								alert("El usuario o password son incorrectos.");
							</script>
							<?php
						break;          
						case 2:
							?>
							<script type="text/javascript"> 
								alert("La seccion a la que intentaste entrar esta restringida.\n Solo permitida para usuarios registrados.");
							</script>
							<?php       
						break;
            		}//Fin switch
       			}
        		?>
             <!--cierraparte de php-->






			</form>
			</section>

	</body>


</html>