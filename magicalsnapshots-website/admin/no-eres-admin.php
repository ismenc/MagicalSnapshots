<!DOCTYPE html>
<html lang="es">
	<head>
        <meta http-equiv="pragma" content="no-cache" />

		<meta charset="utf-8">
		<title>MagicalSnapshots</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
        <?php
        $rutaCss = "..";
		echo '<!-- bootstrap -->
		<link href="'.$rutaCss.'/bootstrap/css/bootstrap.min.css" rel="stylesheet">      
		<link href="'.$rutaCss.'/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		
		<link href="'.$rutaCss.'/themes/css/bootstrappage.css" rel="stylesheet"/>
		
		<!-- global styles -->
		<link href="'.$rutaCss.'/themes/css/flexslider.css" rel="stylesheet"/>
		<link href="'.$rutaCss.'/themes/css/main.css" rel="stylesheet"/>

		<!-- scripts -->
		<script src="'.$rutaCss.'/themes/js/jquery-1.7.2.min.js"></script>
		<script src="'.$rutaCss.'/bootstrap/js/bootstrap.min.js"></script>				
		<script src="'.$rutaCss.'/themes/js/superfish.js"></script>	
		<script src="'.$rutaCss.'/themes/js/jquery.scrolltotop.js"></script>';
		?>

        
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
					<!--form method="GET" class="search_form" action="products.php">
						<input type="text" name="titulo" class="input-block-level search-query" Placeholder="Por ejemplo: existe dios?">
					</form-->
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							<?php
								if(isset($_SESSION['admin'])){
									echo "<li><a>Bienvenido ", $_SESSION['admin'], "</a></li>";
									echo "<li><a href=\"".$rutaCss."/index.php\">Volver a la tienda</a></li>";
									echo "<li><a href=\"./php/logout.php\">Logout</a></li>";
								}
								else{
									echo "<li><a href=\"".$rutaCss."/index.php\">Volver a la tienda</a></li>";
									echo "<li><a>Debes logearte</a></li>";
								}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
        
        <!-------------------- NAVEGACIÓN -------------------->
        
		<div id="wrapper" class="container">            
            
            <section class="navbar main-menu">
				<div class="navbar-inner main-menu">				
					<?php echo '<a href="'.$rutaCss.'/index.php" class="logo pull-left"><img src="'.$rutaCss.'/themes/images/logo.png" class="site_logo" alt="">';?></a>
					<nav id="menu" class="pull-right">
                        
                        <?php
                        if (isset($_SESSION['admin']))
                       		echo '<ul>
								    <li><a>Familia</a>                 
								        <ul>
								            <li><a href="'.$rutaCss.'/admin/familia/insertar.php">Añadir</a></li>                                 
								            <li><a href="'.$rutaCss.'/admin/familia/editar.php">Editar</a></li>
								            <li><a href="'.$rutaCss.'/admin/familia/listar.php">Listar</a></li>                                 
								        </ul>
								    </li>
								    <li><a>Subamilia</a>                 
								        <ul>
								            <li><a href="'.$rutaCss.'/admin/subfamilia/insertar.php">Añadir</a></li>                                 
								            <li><a href="'.$rutaCss.'/admin/subfamilia/editar.php">Editar</a></li>
								            <li><a href="'.$rutaCss.'/admin/subfamilia/listar.php">Listar</a></li>                                 
								        </ul>
								    </li>
								    <li><a>Articulo</a>                 
								        <ul>
								            <li><a href="'.$rutaCss.'/admin/articulo/insertar.php">Añadir</a></li>                                 
								            <li><a href="'.$rutaCss.'/admin/articulo/editar.php">Editar</a></li>
								            <li><a href="'.$rutaCss.'/admin/articulo/listar.php">Listar</a></li>                                 
								        </ul>
								    </li>
								</ul>
								';
                       	else
                       		echo '<ul></ul>';
                        ?>
                        
					</nav>
				</div>
			</section>

       
            
        <!-------------------- TEXTO INICIAL -------------------->

			<section class="header_text">
				<br/><br/>
				<?php
				if (isset($_SESSION['admin']))
					header('Location: index.php');
				else
					echo "Lo sentimos pero <strong>no eres administrador</strong>."; 
				?>
				<br/><br/>
			</section>
            
			<section class="main-content">
				<div class="row">
					<div class="span12" align="center">													
						
						<?php
						if (!isset($_SESSION['admin'])){
							echo '
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
						</form>';
					}

				?>



                        <br/><br/>
						
					</div>				
				</div>
			</section>
			
            <!-------------------- NAVEGACIÓN INFERIOR -------------------->
            
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navegación</h4>
						<ul class="nav">
							<?php 
							echo '<li><a href="'.$rutaCss.'/index.php">Página principal</a></li>  
							<li><a href="#">Sobre nosotros</a></li>
							<li><a href="#">Contacta</a></li>
							<li><a href="'.$rutaCss.'/ver-carrito.php">Carrito</a></li>
							<li><a href="'.$rutaCss.'/register.php">Login</a></li>	
						</ul>					
					</div>
					<div class="span4">
						<h4>Mi cuenta</h4>
						<ul class="nav">
							<li><a href="#">Mi cuenta</a></li>
							<li><a href="'.$rutaCss.'/historial.php">Historial de pedidos</a></li>
							<li><a href="'.$rutaCss.'/ver-carrito.php">Lista de deseos</a></li>
							<li><a href="#">Newsletter</a></li> '; ?>
						</ul>
					</div>
					<div class="span5">
						<?php echo '<p class="logo"><img src="'.$rutaCss.'/themes/images/logo.png" class="site_logo" alt=""></p>'; ?>
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
				<span>Copyright 2017 MagicalSnapshots. All right reserved.</span>
			</section>
		</div>
		<?php echo '<script src="'.$rutaCss.'/themes/js/common.js"></script>
		<script src="'.$rutaCss.'/themes/js/jquery.flexslider-min.js"></script>'; ?>
		<script type="text/javascript">
			$(function() {
				$(document).ready(function() {
					$('.flexslider').flexslider({
						animation: "fade",
						slideshowSpeed: 4000,
						animationSpeed: 600,
						controlNav: false,
						directionNav: true,
						controlsContainer: ".flex-container" // the container that holds the flexslider
					});
				});
			});
		</script>
    </body>
</html>