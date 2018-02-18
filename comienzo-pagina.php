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
						<?php 
						extract($_GET);
						if(isset($cat))
							echo "<input type=\"hidden\" name=\"cat\" class=\"input-block-level search-query\" value=\"".$cat."\">";
						if(isset($subcat))
							echo "<input type=\"hidden\" name=\"subcat\" class=\"input-block-level search-query\" value=\"".$subcat."\">";
						?>
						<input type="text" name="titulo" class="input-block-level search-query" Placeholder="Por ejemplo: existe dios?">
					</form>
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							<li><a href="ver_carrito.php">Carrito</a></li>
							<li><a href="checkout.php">Caja</a></li>
							<li><a href="historial.php">Historial de compra</a></li>
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