<?php
	session_start();
	include('comienzo-pagina.php');
?>
			<!-- ------------------------------------ Contenido ------------------------------------ -->


			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
				<?php
					if(empty($_SESSION['carro'])){
						echo '<h4><span><strong>Carrito</strong> de la compra</span></h4>';
					}else{
						echo '<h4><span><strong>Carrito</strong> de la compra</span></h4>';
						echo '<h4 align="center"><span><a href="php/vaciar_carrito.php">Vaciar carrito</a></span></h4>';
					}
				?>
			</section>
			<section class="main-content">
				
				<div class="row">
					<div class="span12">

						<?php
								if(!empty($_SESSION['carro'])){
									?>
									<h4 class="title"><span class="text"><strong>Tu</strong> carrito</span></h4>
									<table class="table table-striped">
									<thead>
										<tr>
											<th>Imagen</th>
											<th>Nombre</th>
											<th>Cantidad</th>
											<th>Precio unitario</th>
											<th>Subtotal</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);
										        if (mysqli_connect_errno()) {
										                printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
										        }
										        else{
													$carro = $_SESSION['carro'];
													foreach($carro as $c => $producto){

														$consulta = mysqli_query($link, "SELECT ID, FOTO, NOMBRE, PRECIO, STOCK FROM ".TABLA_ARTICULO." WHERE ID='".$producto['id']."'");
														$row = mysqli_fetch_row($consulta);

														if($producto['cantidad'] <= $row[4])
															$cantidad = $producto['cantidad'];
														else
															$cantidad = $row[4];
														

														echo '<tr>
															<td><a href="product_detail.php?id='.$row[0].'"><img alt="" height="100" width="100" src="admin/images/articulos/'.$row[1].'"></a></td>
															<td>'.$row[2].'</td>
															<td>Deseado: '.$producto['cantidad'].'<br>Disponible: '.$row[4].'</td>
															<td>'.$row[3].' €</td>
															<td>'.($row[3]*$cantidad).' €</td>
														</tr>';

													}
													echo '</tbody></table>';
													mysqli_free_result($consulta);
													mysqli_close($link);
												}
								}else
									echo '<section class="header_text">
											¡Vaya! Tienes el carrito vacío, dirígete a <strong><a href="products.php">Productos</a></strong>.
										</section>';
									
						?>
			
					</div>
				</div>
			</section>
			

			<?php include('fin-pagina.php'); ?>