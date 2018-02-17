<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
	<head>
        <meta http-equiv="pragma" content="no-cache" />

		<meta charset="utf-8">
		<title>MagicalSnapshots</title>
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

        
	</head>
    <body>		
		<div id="top-bar" class="container">
			<div class="row">
				<div class="span4">
					<form method="GET" class="search_form" action="products.php">
						<input type="text" name="titulo" class="input-block-level search-query" Placeholder="Por ejemplo: existe dios?">
					</form>
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							<li><a href="#">Mi cuenta</a></li>
							<li><a href="ver_carrito.php">Carrito</a></li>
							<li><a href="checkout.html">Caja</a></li>							
							<?php
								if(isset($_SESSION['username']))
									echo "<li><a>Bienvenido ", $_SESSION['username'], "</a></li>";
								if(isset($_SESSION['admin']))
									echo "<li><a href=\"admin/index.php\">Administración</a></li>";
								if(isset($_SESSION['username']))
									echo "<li><a href=\"./php/logout.php\">Logout</a></li>";
								else{
									echo "<li><a href=\"register.php\">Login y registro</a></li>";
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
					<a href="index.php" class="logo pull-left"><img src="themes/images/logo.png" class="site_logo" alt=""></a>
					<nav id="menu" class="pull-right">
                        
                       <?php include('./php/muestramenu.php');?>
                        
					</nav>
				</div>
			</section>

            
        <!-------------------- EXPOSITOR -------------------->

			<section  class="homepage-slider" id="home-slider">
				<div class="flexslider">
					<ul class="slides">
                        
						<li>
							<img src="themes/images/carousel/banner-1.jpg" alt="" />
						</li>
						<li>
							<img src="themes/images/carousel/banner-2.jpg" alt="" />
							<div class="intro">
								<h1>Temporada de Invierno</h1>
								<p><span>Para disfrutar de una</span></p>
								<p><span> navidad llena de imágenes</span></p>
							</div>
						</li>
                        <li>
							<img src="themes/images/carousel/banner-3.jpg" alt="" />
                            <div class="intro">
								<h1>Los mejores paisajes</h1>
								<p><span>No encontrarás mejores</span></p>
								<p><span> paisajes. ¡Imposible!</span></p>
							</div>
						</li>
                        
					</ul>
				</div>			
			</section>
            
        <!-------------------- TEXTO INICIAL -------------------->

			<section class="header_text">
				Bienvenido a la tienda de fotografías <strong>MagicalSnapshots</strong>. Adquiere aquí los derechos de uso de imagen de nuestras mejores fotografías.
				<br/>¡Explora las diferentes categorías y encuentra tus preferidas!
			</section>
            
			<section class="main-content">
				<div class="row">
					<div class="span12">													
						<div class="row">
							<div class="span12">
								<h4 class="title">
                                    
                                    <!-------------------- DESTACADOS -------------------->
                                    
									<span class="pull-left"><span class="text"><span class="line">Productos <strong>destacados</strong></span></span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">	
												<?php
											        // Guarda la contraseña archivo. Para no cambiar todos los mysqli
											        $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);
											        if (mysqli_connect_errno()) {
											                printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
											        }
											        else{

											            // Consultamos y recorremos los articulos
											            $consultaArticulo="SELECT ID, FOTO, NOMBRE, LEFT(DESCRIPCION, 25), PRECIO FROM ".TABLA_ARTICULO." LIMIT 4";
											            if ($result = mysqli_query($link, $consultaArticulo)) { 
											                while ($row = mysqli_fetch_row($result)) {
											                    echo "<li class=\"span3\"><div class=\"product-box\"><span class=\"sale_tag\"></span>";
											                    echo "<p><a href=\"./product_detail.php?id=".$row[0];
											                    echo "\"><img src=\"admin/images/articulos/".$row[1];
											                    echo "\" alt=\"\" /></a></p>";
											                    echo "<a href=\"./product_detail.php?id=".$row[0]."\" class=\"title\">".$row[2]."</a><br/>";
											                    echo "<a href=\"./product_detail.php?id=".$row[0]."\" class=\"category\">".$row[3]."</a>";
											                    echo "<p class=\"price\">".$row[4]." €</p></div></li>";
											                }
											            }
											            
												?>
											</ul>
										</div>
										<div class="item">
											<ul class="thumbnails">
												<?php
											        
											            // Consultamos y recorremos los articulos
											            $consultaArticulo="SELECT ID, FOTO, NOMBRE, LEFT(DESCRIPCION, 25), PRECIO FROM ".TABLA_ARTICULO." LIMIT 4 OFFSET 4";
											            if ($result = mysqli_query($link, $consultaArticulo)) { 
											                while ($row = mysqli_fetch_row($result)) {
											                    echo "<li class=\"span3\"><div class=\"product-box\"><span class=\"sale_tag\"></span>";
											                    echo "<p><a href=\"./product_detail.php?id=".$row[0];
											                    echo "\"><img src=\"admin/images/articulos/".$row[1];
											                    echo "\" alt=\"\" /></a></p>";
											                    echo "<a href=\"./product_detail.php?id=".$row[0]."\" class=\"title\">".$row[2]."</a><br/>";
											                    echo "<a href=\"./product_detail.php?id=".$row[0]."\" class=\"category\">".$row[3]."</a>";
											                    echo "<p class=\"price\">".$row[4]." €</p></div></li>";
											                }
											            }
											            
												?>																																	
											</ul>
										</div>
									</div>							
								</div>
							</div>						
						</div>
						<br/>
						<div class="row">
							<div class="span12">
								<h4 class="title">
                                    
                                    <!-------------------- RECIENTES -------------------->

									<span class="pull-left"><span class="text"><span class="line">Últimos <strong>lanzamientos</strong></span></span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel-2" data-slide="prev"></a><a class="right button" href="#myCarousel-2" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel-2" class="myCarousel carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails">												
												<?php
											        
											            // Consultamos y recorremos los articulos
											            $consultaArticulo="SELECT ID, FOTO, NOMBRE, LEFT(DESCRIPCION, 25), PRECIO FROM ".TABLA_ARTICULO." ORDER BY ID DESC LIMIT 4";
											            if ($result = mysqli_query($link, $consultaArticulo)) { 
											                while ($row = mysqli_fetch_row($result)) {
											                    echo "<li class=\"span3\"><div class=\"product-box\"><span class=\"sale_tag\"></span>";
											                    echo "<p><a href=\"./product_detail.php?id=".$row[0];
											                    echo "\"><img src=\"admin/images/articulos/".$row[1];
											                    echo "\" alt=\"\" /></a></p>";
											                    echo "<a href=\"./product_detail.php?id=".$row[0]."\" class=\"title\">".$row[2]."</a><br/>";
											                    echo "<a href=\"./product_detail.php?id=".$row[0]."\" class=\"category\">".$row[3]."</a>";
											                    echo "<p class=\"price\">".$row[4]." €</p></div></li>";
											                }
											            }
											            
												?>
											</ul>
										</div>
										<div class="item">
											<ul class="thumbnails">
												<?php
											        
											            // Consultamos y recorremos los articulos
											            $consultaArticulo="SELECT ID, FOTO, NOMBRE, LEFT(DESCRIPCION, 25), PRECIO FROM ".TABLA_ARTICULO." ORDER BY ID DESC LIMIT 4 OFFSET 4";
											            if ($result = mysqli_query($link, $consultaArticulo)) { 
											                while ($row = mysqli_fetch_row($result)) {
											                    echo "<li class=\"span3\"><div class=\"product-box\"><span class=\"sale_tag\"></span>";
											                    echo "<p><a href=\"./product_detail.php?id=".$row[0];
											                    echo "\"><img src=\"admin/images/articulos/".$row[1];
											                    echo "\" alt=\"\" /></a></p>";
											                    echo "<a href=\"./product_detail.php?id=".$row[0]."\" class=\"title\">".$row[2]."</a><br/>";
											                    echo "<a href=\"./product_detail.php?id=".$row[0]."\" class=\"category\">".$row[3]."</a>";
											                    echo "<p class=\"price\">".$row[4]." €</p></div></li>";
											                }
											                mysqli_free_result($result);
											            }
											            mysqli_close($link);
											        }
												?>																																		
											</ul>
										</div>
									</div>							
								</div>
							</div>						
						</div>
                        
                        <!-------------------- CARACTERÍSTICAS -------------------->
                        
						<div class="row feature_box">						
							<div class="span4">
								<div class="service">
									<div class="responsive">	
										<img src="themes/images/feature_img_2.png" alt="" />
										<h4><strong>ARTE</strong> VISUAL</h4>
										<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>									
									</div>
								</div>
							</div>
							<div class="span4">	
								<div class="service">
									<div class="customize">			
										<img src="themes/images/feature_img_1.png" alt="" />
										<h4><strong>ENVÍO</strong> GRATIS</h4>
										<p>Como que compras cosas digitales vaya and printing industry unknown printer.</p>
									</div>
								</div>
							</div>
							<div class="span4">
								<div class="service">
									<div class="support">	
										<img src="themes/images/feature_img_3.png" alt="" />
										<h4><strong>SOPORTE</strong> 25/7</h4>
										<p>Lorem Ipsum is simply dummy text of the printing and printing industry unknown printer.</p>
									</div>
								</div>
							</div>	
						</div>		
					</div>				
				</div>
			</section>
            
            <!-------------------- PROVEEDORES -------------------->
            
			<!--section class="our_client">
				<h4 class="title"><span class="text">Proveedores</span></h4>
				<div class="row">					
					<div class="span2">
						<a href="#"><img alt="" src="themes/images/clients/14.png"></a>
					</div>
					<div class="span2">
						<a href="#"><img alt="" src="themes/images/clients/35.png"></a>
					</div>
					<div class="span2">
						<a href="#"><img alt="" src="themes/images/clients/1.png"></a>
					</div>
					<div class="span2">
						<a href="#"><img alt="" src="themes/images/clients/2.png"></a>
					</div>
					<div class="span2">
						<a href="#"><img alt="" src="themes/images/clients/3.png"></a>
					</div>
					<div class="span2">
						<a href="#"><img alt="" src="themes/images/clients/4.png"></a>
					</div>
				</div>
			</section-->
            
            <!-------------------- NAVEGACIÓN INFERIOR -------------------->
            
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navegación</h4>
						<ul class="nav">
							<li><a href="./index.php">Página principal</a></li>  
							<li><a href="./about.html">Sobre nosotros</a></li>
							<li><a href="./contact.html">Contacta</a></li>
							<li><a href="./cart.html">Carrito</a></li>
							<li><a href="./register.php">Login</a></li>							
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
				<span>Copyright 2017 MagicalSnapshots. All right reserved.</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script src="themes/js/jquery.flexslider-min.js"></script>
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