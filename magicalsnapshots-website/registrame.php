<?php
	session_start();
	include('./comienzo-pagina.php');
?>

			<section class="main-content">				
				<div class="row">

					<!-- ================================== Contenido ================================== -->

					<?php

					    // Inicializamos y conectamos. Database.php incluido en el muestramenu.php de arriba
					    extract($_POST);
					    include_once('recaptchalib.php');

					    
					    // Elementos del captcha
					    $sentCaptcha=$_POST["g-recaptcha-response"];
					    $secretKey = "6LcTuUUUAAAAANW5jhPnFRstntcUgcQbwmq8EBIC";
					    $url= "https://www.google.com/recaptcha/api/siteverify";
					 	$infoForGoogle=$url."?secret=".$secretKey."&response=".$sentCaptcha."&remoteip=".$_SERVER['REMOTE_ADDR'];

					 	// Obtenemos captcha
					 	if (!$_POST["g-recaptcha-response"]) {
					 		echo "<p>DEBE PULSAR CAPTCHA</p>";
					 	} else{
					 		$jsondata=curl_init($infoForGoogle);

							curl_setopt($jsondata,CURLOPT_RETURNTRANSFER, TRUE);
							$jsondata = curl_exec($jsondata);

							$getGoogle = json_decode($jsondata,true);

							$resultado = $getGoogle['success'];

							// Captcha entregado bien o mal
							if ($resultado!=null){

								// Captcha bien
								if ($resultado) {
									$link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);

									// Comprobación de conexión
								    if (mysqli_connect_errno()) {
								        printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
								    }
								    else{

								        
								        // Evitar la inyeccción de codigo y encriptamos pass
							            $usuario = mysqli_real_escape_string($link, $usuario);
							            $nombre = mysqli_real_escape_string($link, $nombre);
							            $apellidos = mysqli_real_escape_string($link, $apellidos);
							            $email = mysqli_real_escape_string($link, $email);
							            $password=password_hash($password, PASSWORD_DEFAULT);
							            $direccion = mysqli_real_escape_string($link, $direccion);
							            $provincia = mysqli_real_escape_string($link, $provincia);	

										/* Comprobamos posibles errores (Usuario o email ya existen) */
										$comprobacion = mysqli_query($link, "SELECT USUARIO FROM usuario WHERE USUARIO='$usuario'");
										$row = mysqli_fetch_row($comprobacion);
								        if($row[0] == $usuario){
								                printf("<header>El usuario \"$usuario\" ya está registrado.</header><br>
								                	<p><a href=\"..\">Volver atrás</a></p>");
								        }
								        else{


								        	$comprobacion = $result = mysqli_query($link, "SELECT EMAIL FROM usuario WHERE EMAIL='$email'");
								        	$row = mysqli_fetch_row($comprobacion);
								            if($row[0] == $email){
								            	printf("<header>El email \"$email\" ya está registrado.</header><br>
								                	<p><a href=\"..\">Volver atrás</a></p>");
								            }else{
								                
								            	// Insertamos en base de datos
								                $insert="INSERT INTO ".TABLA_USUARIO." (".COLUMNAS_USUARIO.") VALUES ('$usuario','$nombre', '$apellidos', '$email', '$password', '$direccion', '$provincia', 0)";

								                $resultadoInsercion = mysqli_query($link, $insert);

								                // Interpretación de resultados
								                if ($resultadoInsercion){
								                    echo "<header>Registro realizado con éxito. <a href=\"..\">Volver a la página principal</a></header>";
								                }
								                else{
								                    echo "<header>No fue posible registrar el usuario.<br>Vuelve a <a href=\"../register.php\">registro</a> y comprueba algún campo.</header>";
								                }
								            }
								        }
								        mysqli_close($link);
								    }
								}
								else{
									echo "<header>Captcha incorrecto</header>";
								}
							}
							else{
								echo "<header>Debe rellenar el captcha</header>";
							}
					 	}

					?>




				</div>
			</section>			
			
			<?php include('./fin-pagina.php'); ?>