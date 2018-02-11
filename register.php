<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Registro</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">

        <!-- bootstrap -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">		
		<link href="themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="themes/css/flexslider.css" rel="stylesheet"/>
		<link href="themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="themes/js/jquery-1.7.2.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>				
		<script src="themes/js/superfish.js"></script>	
		<script src="themes/js/jquery.scrolltotop.js"></script>
		<script src='https://www.google.com/recaptcha/api.js'></script>

	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
					<form method="POST" class="search_form">
						<input type="text" class="input-block-level search-query" Placeholder="eg. T-sirt">
					</form>
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							<li><a href="#">Mi cuenta</a></li>
							<li><a href="cart.html">Carrito</a></li>
							<li><a href="checkout.html">Caja</a></li>					
							<li><a href="register.html">Login</a></li>		
						</ul>
					</div>
				</div>
			</div>
		</div>
        
        <!-------------------- MENU -------------------->
        
		<div id="wrapper" class="container">
			<section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<a href="index.php" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
                        
                        
						<?php include('./php/muestramenu.php');?>
                        
                        
					</nav>
				</div>
			</section>			
			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
				<h4><span>Registro y Login</span></h4>
			</section>			
			<section class="main-content">				
				<div class="row">
					<div class="span5">					
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
									<p class="reset">Recuperar <a tabindex="4" href="#" title="Recover your username or password">usuario o contraseña</a></p>
								</div>
							</fieldset>
						</form>				
					</div>
					<div class="span7">					
						<h4 class="title"><span class="text"><strong>Registrarse</strong> </span></h4>
                        
                        <!-------------------- REGISTRO -------------------->
                        
						<form action="./php/registrame.php" method="post" class="form-stacked">
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
                        
                        
					</div>				
				</div>
			</section>			
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navegación</h4>
						<ul class="nav">
							<li><a href="./index.php">Página principal</a></li>  
							<li><a href="./about.html">Sobre nosotros</a></li>
							<li><a href="./contact.html">Contacta</a></li>
							<li><a href="./cart.html">Carrito</a></li>
							<li><a href="./register.html">Login</a></li>							
						</ul>					
					</div>
					<div class="span4">
						<h4>Mi cuenta</h4>
						<ul class="nav">
							<li><a href="#">Mi cuenta</a></li>
							<li><a href="#">Historial de pedidos</a></li>
							<li><a href="#">Lista de deseos</a></li>
							<li><a href="#">Newsletter</a></li>
						</ul>
					</div>
					<div class="span5">
						<p class="logo"><img src="themes/images/logo.png" class="site_logo" alt=""></p>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. the  Lorem Ipsum has been the industry's standard dummy text ever since the you.</p>
						<br/>
						<span class="social_icons">
							<a class="facebook" href="#">Facebook</a>
							<a class="twitter" href="#">Twitter</a>
							<a class="skype" href="#">Skype</a>
							<a class="vimeo" href="#">Vimeo</a>
						</span>
					</div>					
				</div>	
			</section>
			<section id="copyright">
				<span>Copyright 2013 MagicalSnapshots  All right reserved.</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script>
			$(document).ready(function() {
				$('#checkout').click(function (e) {
					document.location.href = "checkout.html";
				})
			});
		</script>		
    </body>
</html>