<?php
	session_start();
	include('comienzo-pagina.php');
?>

	
			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
				<?php
					if(isset($_SESSION['username']))
						echo '<h4><span>Está logeado como <strong>'.$_SESSION['username'].'</strong>.</span></h4>';
					else{
						echo '<h4><span>Registro y Login</span></h4>';
				?>
			</section>			
			<section class="main-content">				
				<div class="row">
					<?php
					echo '<div class="span5">					
						<h4 class="title"><span class="text"><strong>Login</strong></span></h4>
                        
                        <!-------------------- LOGIN -------------------->
                        
						<form action="./php/logeame.php" method="post">
							<input type="hidden" name="next" value="/">
							<fieldset>
                                <br/>
								<div class="control-group">
									<label class="control-label">Usuario</label>
									<div class="controls">
										<input name="username" type="text" placeholder="Nombre de usuario" id="username" class="input-xlarge" required maxlength="20">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Contraseña</label>
									<div class="controls">
										<input name="password" type="password" placeholder="Contraseña" id="password" class="input-xlarge" required maxlength="20">
									</div>
								</div>
                                <br/>
								<div class="control-group">
									<input tabindex="3" class="btn btn-inverse large" type="submit" value="Entrar en tu cuenta">
									<hr>
								</div>
							</fieldset>
						</form>				
					</div>
					<div class="span7">					
						<h4 class="title"><span class="text"><strong>Registrarse</strong> </span></h4>
                        
                        <!-------------------- REGISTRO -------------------->
                        
						<form action="registrame.php" method="post" class="form-stacked">
							<fieldset>
								<div class="control-group">
									<label class="control-label">Usuario</label>
									<div class="controls">
										<input name="usuario" type="text" placeholder="Nombre de usuario" class="input-xlarge" required maxlength="20">
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label">Nombre</label>
									<div class="controls">
										<input name="nombre" type="text" placeholder="Nombre" class="input-xlarge" required maxlength="20">
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label">Apellidos</label>
									<div class="controls">
										<input name="apellidos" type="text" placeholder="Apellidos" class="input-xlarge" required maxlength="50">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Email</label>
									<div class="controls">
										<input name="email" type="text" placeholder="Dirección de correo" class="input-xlarge" required maxlength="50">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Contraseña</label>
									<div class="controls">
										<input name="password" type="password" placeholder="Contraseña" class="input-xlarge" required maxlength="20">
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label">Dirección</label>
									<div class="controls">
										<input name="direccion" type="text" placeholder="Dirección postal" class="input-xlarge" required maxlength="100">
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label">Provincia</label>
									<div class="controls">
										<input name="provincia" type="text" placeholder="Provincia" class="input-xlarge" required maxlength="20">
									</div>
								</div>
                                <div class="g-recaptcha" data-sitekey="6LcTuUUUAAAAACInJ8wyIXKwhUQRp4CW_FXOdNQA"></div>
								<hr>
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" value="Crear cuenta"></div>
							</fieldset>
						</form>	
                        
                        
					</div>';
					}
				?>
				</div>
			</section>			
			
			<?php include('fin-pagina.php'); ?>