<?php
	session_start();
	include('comienzo-pagina.php');
?>


            
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
						<li>
							<img src="themes/images/carousel/banner-4.jpeg" alt="" />
						</li>
						<li>
							<img src="themes/images/carousel/banner-5.jpg" alt="" />
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
            
<?php include('fin-pagina.php'); ?>
            