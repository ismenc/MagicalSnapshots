
<?php
	session_start();
	include('comienzo-pagina.php');
?>


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
					<div class="span12">
						<div class="row">
							<div class="span4">

								<?php echo "<a href=\"admin/images/articulos/".$articulo[1]."\" class=\"thumbnail\" data-fancybox-group=\"group1\" title=\"Description 1\">";
								echo "<img alt=\"\" src=\"admin/images/articulos/".$articulo[1]."\"></a>"; ?> 

								<!-- IMAGENES SECUNDARIAS DEL PRODUCTO

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
								<form class="form-inline" action="php/agregar_al_carro.php" method="POST">
									<br/>
									<p>&nbsp;</p>
									<label>Cantidad:</label>
									<?php echo '<input type="hidden" name="id" value="'.$articulo[0].'">'; ?>
									<input type="number" min="1" name="cantidad" class="span1" placeholder="1">
									<button class="btn btn-inverse" type="submit">Añadir al carro</button>
								</form>
							</div>							
						</div>
						<div class="row">
							<div class="span12">
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



							<div class="span12">	
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
											            $consultaArticulo="SELECT ID, FOTO, NOMBRE, DESCRIPCION, PRECIO FROM ".TABLA_ARTICULO." LIMIT 4";
											            if ($result = mysqli_query($link, $consultaArticulo)) { 
											                while ($row = mysqli_fetch_row($result)) {
											                    echo "<li class=\"span3\"><div class=\"product-box\"><span class=\"sale_tag\"></span>";
											                    echo "<p><a href=\"product_detail.php?id=".$row[0];
											                    echo "\"><img src=\"admin/images/articulos/".$row[1];
											                    echo "\" alt=\"\" /></a></p>";
											                    echo "<a href=\"product_detail.php?id=".$row[0]."\" class=\"title\">".$row[2]."</a><br/>";
											                    echo "<a href=\"product_detail.php?id=".$row[0]."\" class=\"category\">".$row[3]."</a>";
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
											            $consultaArticulo="SELECT ID, FOTO, NOMBRE, DESCRIPCION, PRECIO FROM ".TABLA_ARTICULO." LIMIT 4 OFFSET 4";
											            if ($result = mysqli_query($link, $consultaArticulo)) { 
											                while ($row = mysqli_fetch_row($result)) {
											                    echo "<li class=\"span3\"><div class=\"product-box\"><span class=\"sale_tag\"></span>";
											                    echo "<p><a href=\"product_detail.php?id=".$row[0];
											                    echo "\"><img src=\"admin/images/articulos/".$row[1];
											                    echo "\" alt=\"\" /></a></p>";
											                    echo "<a href=\"product_detail.php?id=".$row[0]."\" class=\"title\">".$row[2]."</a><br/>";
											                    echo "<a href=\"product_detail.php?id=".$row[0]."\" class=\"category\">".$row[3]."</a>";
											                    echo "<p class=\"price\">".$row[4]." €</p></div></li>";
											                }
											                mysqli_free_result($result);
											            }
											        }
												?>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>	
			<?php 
					}
		            mysqli_close($link);
		        }
			?>		
			
			<?php include('fin-pagina.php'); ?>