<?php
	extract[$_POST];
	require './admin/databasename.php';
	$link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);

	if (mysqli_connect_errno()) {
        printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
    }
    else{
    	$username = mysqli_real_escape_string($link, $username);
    	$password = mysqli_real_escape_string($link, $password);
    	$comprobacion = mysqli_query($link, "SELECT PASSWORD FROM usuario WHERE USUARIO='".$username."';");

        // Comprobamos que seleccione una familia
        if(empty($comprobacion)){
            printf("<p align=\"center\">No existe dicho <strong>usuario.</strong></p>");
        }
        else{
        	if(!password_verify($password, $comprobacion)){
	            printf("<p align=\"center\">Datos de usuario <strong>incorrectos.</strong></p>");
	        }
	        else{
	        	// Crear una sesión
	        	session_cache_limiter();
				session_name('nombre');
				session_start();

				$_SESSION['username'] = $username;

				echo "<p align=\"center\">Bienvenido, <strong>"."$nombre".".</strong></p>";
				echo "<a href=\"index.php\">Página inicial</a>"
	        }
    
        }
            
        mysqli_close($link);
    }
?>