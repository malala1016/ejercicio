<?php
 
    //conectar BD
    include("includes/database.php"); 
    conectarse();
     
    $user = $_POST['usuario'];
    $pass = $_POST['password'];
    //Obtengo la version encriptada del password
    /*$pass_encrypt = md5($pass);*/ //funcion que encripta la contraseña
     
    $query = "SELECT id FROM usuarios
        WHERE usuario = '".$user."'
        AND password = '".$pass_encrypt."' "; 
         
      $result = mysql_query($query, $link); 

    $user_id = "";//mas adelante guarda el id del usuario de la base de datos de xampp

     
    //Si existe al menos una fila
    if( $fila=mysql_fetch_array($result) )
    {       
        //Obtener el Id del usuario en la BD        
        $user_id = $fila['id'];
        //Iniciar una sesion de PHPs
        session_start();

        //para la parte de las cookies
        //
        //Crear una variable para indicar que se ha autenticado
        $_SESSION['autenticado'] = 'SI';
        //Crear una variable para guardar el ID del usuario para tenerlo siempre disponible
        $_SESSION['user_id'] = $user_id;
        //CODIGO DE SESION
         
        //Crear un formulario para redireccionar al usuario y enviar oculto su Id 
?>
        <form name="formulario" method="post" action="main.php">
            <input type="hidden" name="idUsr" value='<?php echo $user_id ?>' />
        </form>
<?php
    }
    else {
        //En caso de que no exista una fila...
        //..Crear un formulario para redireccionar al usuario a la pagina de login 
        //enviandole un codigo de error
/*?>
        <form name="formulario" method="post" action="index.php">
            <input type="hidden" name="msg_error" value="1">
        </form>
<?php*/
        echo "usuario inválido, por favor vaya al médico";
    }
?>
                     
<script type="text/javascript"> 
    //Redireccionar con el formulario creado
    document.formulario.submit();
</script>