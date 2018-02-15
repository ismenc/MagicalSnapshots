
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
					<form method="POST" class="search_form">
						<input type="text" class="input-block-level search-query" Placeholder="Por ejemplo: existe dios?">
					</form>
				</div>
				<div class="span8">
					<div class="account pull-right">
						<ul class="user-menu">				
							<li><a href="#">Mi cuenta</a></li>
							<li><a href="cart.html">Carrito</a></li>
							<li><a href="checkout.html">Caja</a></li>							
							<?php
								if(isset($_SESSION['username'])){
									echo "<li><a href=\"myprofile.php\">Bienvenido ", $_SESSION['username'], "</a></li>";
									//unset($_SESSION['username']);
									//header('Location: index.php');
									echo "<li><a href=\"./php/logout.php\">Logout</a></li>";
								}
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


			<!-- ------------------------------------ Contenido ------------------------------------ -->




			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
				<?php
				extract($_GET);
		        // Guarda la contraseña archivo. Para no cambiar todos los mysqli
		        $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);
		        if (mysqli_connect_errno()) {
		                printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
		        }
		        else{
		        	$id = mysqli_real_escape_string($link, $id);
		            $consultaArticulo="SELECT ID, FOTO, NOMBRE, DESCRIPCION, PRECIO, STOCK FROM ".TABLA_ARTICULO." WHERE ID=".$id;
		            $result = mysqli_query($link, $consultaArticulo);
		            $articulo = mysqli_fetch_row($result);
		            if (empty($articulo)) { 
		            	echo "<br/><h4><span>No existe el producto solicitado</span></h4><br/>";
		            }else{
		            	echo "<h4><span>Detalles del producto</span></h4>";
		            	mysqli_free_result($result);
		           ?>
		    </section>
			<section class="main-content">				
				<div class="row">						
					<div class="span9">
						<div class="row">
							<div class="span4">

								<?php echo "<a href=\"admin/images/articulos/".$articulo[1]."\" class=\"thumbnail\" data-fancybox-group=\"group1\" title=\"Description 1\">";
								echo "<img alt=\"\" src=\"admin/images/articulos/".$articulo[1]."\"></a>"; ?> 

								<!-- IMAGENES SECUNDARIAS

								<ul class="thumbnails small">								
									<li class="span1">
										<a href="themes/images/ladies/2.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 2"><img src="themes/images/ladies/2.jpg" alt=""></a>
									</li>								
									<li class="span1">
										<a href="themes/images/ladies/3.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 3"><img src="themes/images/ladies/3.jpg" alt=""></a>
									</li>													
									<li class="span1">
										<a href="themes/images/ladies/4.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 4"><img src="themes/images/ladies/4.jpg" alt=""></a>
									</li>
									<li class="span1">
										<a href="themes/images/ladies/5.jpg" class="thumbnail" data-fancybox-group="group1" title="Description 5"><img src="themes/images/ladies/5.jpg" alt=""></a>
									</li>
								</ul-->

							</div>
							<div class="span5">
								<address>
									<strong>Producto:</strong> <span><?php echo $articulo[2]; ?></span><br>
									<strong>Identificador:</strong> <span>Producto <?php echo $id; ?></span><br>
									<strong>Stock:</strong> <span><?php echo $articulo[5]; ?> unidades</span><br>								
								</address>									
								<h4><strong>Precio: <?php echo $articulo[4]; ?> €</strong></h4>
							</div>

							<!-- ------------------------------------- Formulario de compra ------------------------------------- -->

							<div class="span5">
								<form class="form-inline">
									<!--label class="checkbox">
										<input type="checkbox" value=""> Option one is this and that
									</label-->
									<br/>
									<!--label class="checkbox">
									  <input type="checkbox" value=""> Be sure to include why it's great
									</label-->
									<p>&nbsp;</p>
									<label>Qty:</label>
									<input type="text" class="span1" placeholder="1">
									<button class="btn btn-inverse" type="submit">Añadir al carro</button>
								</form>
							</div>							
						</div>
						<div class="row">
							<div class="span9">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active"><a href="#home">Descripción</a></li>
									<!-- Pestañas de informacion adicionales li class=""><a href="#profile">Additional Information</a></li-->
								</ul>							 
								<div class="tab-content">
									<div class="tab-pane active" id="home"><?php echo $articulo[3]; ?></div>
									<div class="tab-pane" id="profile">
										<table class="table table-striped shop_attributes">	
											<tbody>
												<tr class="">
													<th>Size</th>
													<td>Large, Medium, Small, X-Large</td>
												</tr>		
												<tr class="alt">
													<th>Colour</th>
													<td>Orange, Yellow</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>							
							</div>



							<div class="span9">	
								<br>
								<h4 class="title">
									<span class="pull-left"><span class="text"><strong>Productos</strong> Similares</span></span>
									<span class="pull-right">
										<a class="left button" href="#myCarousel-1" data-slide="prev"></a><a class="right button" href="#myCarousel-1" data-slide="next"></a>
									</span>
								</h4>
								<div id="myCarousel-1" class="carousel slide">
									<div class="carousel-inner">
										<div class="active item">
											<ul class="thumbnails listing-products">
												<?php
											        // Guarda la contraseña archivo. Para no cambiar todos los mysqli
											        $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);
											        if (mysqli_connect_errno()) {
											                printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
											        }
											        else{

											            // Consultamos y recorremos los articulos
											            $consultaArticulo="SELECT ID, FOTO, NOMBRE, DESCRIPCION, PRECIO FROM ".TABLA_ARTICULO." LIMIT 3";
											            if ($result = mysqli_query($link, $consultaArticulo)) { 
											                while ($row = mysqli_fetch_row($result)) {
											                    echo "<li class=\"span3\"><div class=\"product-box\"><span class=\"sale_tag\"></span>";
											                    echo "<p><a href=\"../product_detail.php?id=".$row[0];
											                    echo "\"><img src=\"admin/images/articulos/".$row[1];
											                    echo "\" alt=\"\" /></a></p>";
											                    echo "<a href=\"../product_detail.php?id=".$row[0]."\" class=\"title\">".$row[2]."</a><br/>";
											                    echo "<a href=\"../product_detail.php?id=".$row[0]."\" class=\"category\">".$row[3]."</a>";
											                    echo "<p class=\"price\">".$row[4]." €</p></div></li>";
											                }
											                mysqli_free_result($result);
											            }
											            mysqli_close($link);
											        }
												?>
											</ul>
										</div>
										<div class="item">
											<ul class="thumbnails listing-products">
												<?php
											        // Guarda la contraseña archivo. Para no cambiar todos los mysqli
											        $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);
											        if (mysqli_connect_errno()) {
											                printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
											        }
											        else{

											            // Consultamos y recorremos los articulos
											            $consultaArticulo="SELECT ID, FOTO, NOMBRE, DESCRIPCION, PRECIO FROM ".TABLA_ARTICULO." LIMIT 3 OFFSET 3";
											            if ($result = mysqli_query($link, $consultaArticulo)) { 
											                while ($row = mysqli_fetch_row($result)) {
											                    echo "<li class=\"span3\"><div class=\"product-box\"><span class=\"sale_tag\"></span>";
											                    echo "<p><a href=\"../product_detail.php?id=".$row[0];
											                    echo "\"><img src=\"admin/images/articulos/".$row[1];
											                    echo "\" alt=\"\" /></a></p>";
											                    echo "<a href=\"../product_detail.php?id=".$row[0]."\" class=\"title\">".$row[2]."</a><br/>";
											                    echo "<a href=\"../product_detail.php?id=".$row[0]."\" class=\"category\">".$row[3]."</a>";
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
					</div>

					<div class="span3 col">
						<div class="block">	
							<ul class="nav nav-list">
								<li class="nav-header">SUB CATEGORIES</li>
								<li><a href="products.html">Nullam semper elementum</a></li>
								<li class="active"><a href="products.html">Phasellus ultricies</a></li>
								<li><a href="products.html">Donec laoreet dui</a></li>
								<li><a href="products.html">Nullam semper elementum</a></li>
								<li><a href="products.html">Phasellus ultricies</a></li>
								<li><a href="products.html">Donec laoreet dui</a></li>
							</ul>
							<br/>
							<ul class="nav nav-list below">
								<li class="nav-header">MANUFACTURES</li>
								<li><a href="products.html">Adidas</a></li>
								<li><a href="products.html">Nike</a></li>
								<li><a href="products.html">Dunlop</a></li>
								<li><a href="products.html">Yamaha</a></li>
							</ul>
						</div>
						<div class="block">
							<h4 class="title">
								<span class="pull-left"><span class="text">Randomize</span></span>
								<span class="pull-right">
									<a class="left button" href="#myCarousel" data-slide="prev"></a><a class="right button" href="#myCarousel" data-slide="next"></a>
								</span>
							</h4>
							<div id="myCarousel" class="carousel slide">
								<div class="carousel-inner">
									<div class="active item">
										<ul class="thumbnails listing-products">
											<li class="span3">
												<div class="product-box">
													<span class="sale_tag"></span>												
													<a href="product_detail.html"><img alt="" src="themes/images/ladies/7.jpg"></a><br/>
													<a href="product_detail.html" class="title">Fusce id molestie massa</a><br/>
													<a href="#" class="category">Suspendisse aliquet</a>
													<p class="price">$261</p>
												</div>
											</li>
										</ul>
									</div>
									<div class="item">
										<ul class="thumbnails listing-products">
											<li class="span3">
												<div class="product-box">												
													<a href="product_detail.html"><img alt="" src="themes/images/ladies/8.jpg"></a><br/>
													<a href="product_detail.html" class="title">Tempor sem sodales</a><br/>
													<a href="#" class="category">Urna nec lectus mollis</a>
													<p class="price">$134</p>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="block">								
							<h4 class="title"><strong>Best</strong> Seller</h4>								
							<ul class="small-product">
								<li>
									<a href="#" title="Praesent tempor sem sodales">
										<img src="themes/images/ladies/1.jpg" alt="Praesent tempor sem sodales">
									</a>
									<a href="#">Praesent tempor sem</a>
								</li>
								<li>
									<a href="#" title="Luctus quam ultrices rutrum">
										<img src="themes/images/ladies/2.jpg" alt="Luctus quam ultrices rutrum">
									</a>
									<a href="#">Luctus quam ultrices rutrum</a>
								</li>
								<li>
									<a href="#" title="Fusce id molestie massa">
										<img src="themes/images/ladies/3.jpg" alt="Fusce id molestie massa">
									</a>
									<a href="#">Fusce id molestie massa</a>
								</li>   
							</ul>
						</div>
					</div>
				</div>
			</section>	
			<?php 
					}
		            mysqli_close($link);
		        }
			?>		
			<section id="footer-bar">
				<div class="row">
					<div class="span3">
						<h4>Navigation</h4>
						<ul class="nav">
							<li><a href="./index.html">Homepage</a></li>  
							<li><a href="./about.html">About Us</a></li>
							<li><a href="./contact.html">Contac Us</a></li>
							<li><a href="./cart.html">Your Cart</a></li>
							<li><a href="./register.html">Login</a></li>							
						</ul>					
					</div>
					<div class="span4">
						<h4>My Account</h4>
						<ul class="nav">
							<li><a href="#">My Account</a></li>
							<li><a href="#">Order History</a></li>
							<li><a href="#">Wish List</a></li>
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
				<span>Copyright 2013 bootstrappage template  All right reserved.</span>
			</section>
		</div>
		<script src="themes/js/common.js"></script>
		<script>
			$(function () {
				$('#myTab a:first').tab('show');
				$('#myTab a').click(function (e) {
					e.preventDefault();
					$(this).tab('show');
				})
			})
			$(document).ready(function() {
				$('.thumbnail').fancybox({
					openEffect  : 'none',
					closeEffect : 'none'
				});
				
				$('#myCarousel-2').carousel({
                    interval: 2500
                });								
			});
		</script>
    </body>
</html>