<?php
	ob_start();
	session_start();

	extract($_POST);
	require 'database.php';
	$link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);

	if (mysqli_connect_errno()) {
        printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
    }
    else{
    	$username = mysqli_real_escape_string($link, $username);
    	$password = mysqli_real_escape_string($link, $password);
    	$comprobacion = mysqli_query($link, "SELECT PASSWORD, ADMIN FROM usuario WHERE USUARIO='$username';");

        // Comprobamos que seleccione una familia
        if(!$row = mysqli_fetch_row($comprobacion)){
            printf("<p align=\"center\">No existe dicho <strong>usuario.</strong><br>
								                	<a href=\"..\">Volver atrás</a></p>");
        }
        else{
        	if(!password_verify($password, $row[0])){
	            printf("<p align=\"center\">Datos de usuario <strong>incorrectos.</strong><br>
								                	<a href=\"..\">Volver atrás</a></p>");
	        }
	        else{
	        	session_cache_limiter();
				//session_name('nombre');
				
				$_SESSION['username'] = $username;
				if($row[1] == 1)
					$_SESSION['admin'] = $username;

				echo "<p align=\"center\">Bienvenido, <strong>"."$username".".</strong></p>";
				echo "<a href=\"../index.php\">Página inicial</a>";
				header('location: ../index.php');
	        }
    
        }
            
        mysqli_close($link);
    }
    ob_end_flush();
?>