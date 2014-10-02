<!--Ejercicio hecho entre Nicodemus Luna y Alejandra Soto

con referencias de las paginas de tutoriales:

 *Inicio de sesion
 *
 * Referencia: http://gonzasilve.wordpress.com/2012/05/23/autenticacion-de-usuarios-en-php-y-mysql/
 
 * Registro
 *
 * Referencia: http://gonzasilve.wordpress.com/2012/05/23/autenticacion-de-usuarios-en-php-y-mysql/
 *

-->

<?php
 
//Inicializar una sesion de PHP
session_start();
 
//Validar que el usuario este logueado y exista un UID
if ( ! ($_SESSION['autenticado'] == 'SI' && isset($_SESSION['user_id'])) )
{
    //En caso de que el usuario no este autenticado, crear un formulario y redireccionar a la 
    //pantalla de login, enviando un codigo de error
?>

<!--DESDE AQUI esto es para mostrar el cuadro que aparece cuando el usuario intenta intregar al main sin 
         tener un registro ni usuario-->
        <!-- <form name="formulario" method="post" action="index.php">
            <input type="hidden" name="msg_error" value="2">
        </form>
        <script type="text/javascript"> 
            document.formulario.submit();
        </script> -->
        <?php 
    		echo "La seccion a la que intentaste entrar esta restringida.\n Solo permitida para usuarios registrados."; 
        ?>
        <!--HASTA AQUI-->
<?php
}
 
    //Conectar BD
    include("includes/database.php");  
    conectarse();
 
    //Sacar datos del usuario que ha iniciado sesion
    $query = "SELECT  nombre,apellido,id,usuario
            FROM usuarios
            WHERE id = '".$_SESSION['user_id']."'";         
    $result = mysql_query($query); 
 
    $nombre_completo = ""; //esta variable forma el nombre completo del usuario y lo muestra en el index
    $username = "";
 
    //Formar el nombre completo del usuario
    if( $fila = mysql_fetch_array($result) ) //aqui creo la variable fila y se almacena el true de la variable result (es como si fuera un boolean)
        $nombre_completo = $fila['nombre']." ".$fila['apellido']; //aqui se le dice a la variable lo que contiene para que forme el nombre
    	$username = $fila['usuario']; //


    //Aqui se sacan los datos de los posts de los usuarios
    $query_post = " SELECT usuarios.usuario, usuarios.nombre, usuarios.apellido, posts.posts 
    				FROM usuarios
    				RIGHT JOIN posts 
    				ON usuarios.usuario=posts.usuario
    				ORDER BY fecha DESC LIMIT 0 , 30";
	$result_post=mysql_query($query_post);

	$nombre_completo_amigo = "";
    $username_amigo = "";
    $post = "";	
     
//Cerrrar conexion a la BD
    //como ya esta abierta la conexion con la variable $link, 
//por eso no se coloca como parametro en la variable de arriba de result, 
//y por eso se pone mysql_close($link);
mysql_close($link);

?>


<!Doctype html>
<html>

<head>
        <title>Mandal</title>

		<meta charset="UTF-8" lang="es">
		<meta name="viewport" content="width=device-width,user-scalable=no">
		
		<link rel="stylesheet" href="css/style.css">   
		<script type="text/javascript"></script>   
        
 </head>
	
	<body>

	     <header>
			<figure id="logo"> <!-- para decir que aqui va una imagen -->
				<img src="images/logo.png" alt="" />
			</figure>
			<h1>Mandal</h1>
			<h3>Tu red para comentar...</h3>
		</header>

	<div class="fondo">
		<nav>
			<ul>
				<li>Home</li>
				<li>About</li>
				<li>Profile</li>
			</ul>
		</nav>
		<div class="centro"></div>

		<section>

			<article>
				<figure class="foto_Usuario">
					<img src="images/fotoUsuario.png" alt="" />
				</figure>
				<div class="cont">				
					<h2><?php echo $nombre_completo ?></h2>
					<div class="parrafo">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui quisquam modi iste. Sequi, veritatis, repellendus.
					Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui quisquam modi iste.
					</div>
				</div>
				<div class="minifooter">
					

				</div>
				<figure class="cosito">
					<img src="images/cosito.png" alt="" />
				</figure>				
			</article>

			<article>			
				<figure class="foto_Usuario">
					<img src="images/fotoUsuario.png" alt="" />
				</figure>
				<div class="cont">
					<h2><?php echo $nombre_completo ?></h2>
					<div class="parrafo">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui quisquam modi iste. Sequi, veritatis, repellendus.
					Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui quisquam modi iste.
					</div>
				</div>
				<div class="minifooter">
					
					
				</div>	
				<figure class="cosito">
					<img src="images/cosito.png" alt="" />
				</figure>			
			</article>

			<article>
				<figure class="foto_Usuario">
					<img src="images/fotoUsuario.png" alt="" />
				</figure>
				<div class="cont">
					<h2><?php echo $nombre_completo ?></h2>
					<div class="parrafo">
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui quisquam modi iste. Sequi, veritatis, repellendus.
					Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui quisquam modi iste.
					</div>
				</div>
				<div class="minifooter">
					
					
				</div>	
				<figure class="cosito">
					<img src="images/cosito.png" alt="" />
				</figure>			
			</article>

		  </section>

		  <footer>	
            <div class="footer">
            	
            </div>     
		  </footer>
		
	  </div>
	</body>

</html>
