<?php
	session_start();
	include('comienzo-pagina.php');
?>

			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
				<h4><span><strong>Caja</strong></span></h4>
			</section>	
			<section class="main-content">
				<div class="row">
					<div class="span12">

						<?php
							if(isset($_SESSION['username'])){
								if(!empty($_SESSION['carro'])){
									?>
									<h4 class="title"><span class="text"><strong>Cesta</strong> de la compra</span></h4>
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
													$totalProductos = 0;
													$totalAPagar = 0;
													foreach($carro as $c => $producto){

														$consulta = mysqli_query($link, "SELECT ID, FOTO, NOMBRE, PRECIO, STOCK FROM ".TABLA_ARTICULO." WHERE ID='".$producto['id']."'");
														$row = mysqli_fetch_row($consulta);

														if($producto['cantidad'] <= $row[4]){
															$cantidad = $producto['cantidad'];
															$msg = "";
														}
														else{
															$cantidad = $row[4];
															$msg = " (limitado por stock)";
														}

														echo '<tr>
															<td><a href="product_detail.php?id='.$row[0].'"><img alt="" height="100" width="100" src="admin/images/articulos/'.$row[1].'"></a></td>
															<td>'.$row[2].'</td>
															<td>'.$cantidad.$msg.'</td>
															<td>'.$row[3].' €</td>
															<td>'.($row[3]*$cantidad).' €</td>
														</tr>';

														$totalProductos = $totalProductos + $cantidad;
														$totalAPagar = $totalAPagar + ($row[3]*$cantidad);
													}
													echo '</tbody></table>';

													echo '<h4 style="margin:0 auto;"><span class="text" ><strong>Cantidad productos: </strong>'.$totalProductos.' <br><strong>Precio total: </strong>'.$totalAPagar.' €</span></h4><br>';

													mysqli_free_result($consulta);
													mysqli_close($link);
												}

									echo '
													<h4 align="center">Confirma tu contraseña para realizar el pedido</h4>
													<!--p align="center">Confirma que quieres realizar el pedido introduciendo tus datos de login</p-->
													<form action="realizar-pedido.php" method="post" align="center">
														<fieldset>
															<div class="control-group">
																<label class="control-label" >Usuario</label>
																<div class="controls">
																	<input type="text" name="usuario" placeholder="Enter your username" id="username" class="input-xlarge" value="'.$_SESSION['username'].'" disabled>
																</div>
															</div>
															<div class="control-group">
																<label class="control-label">Contraseña</label>
																<div class="controls">
																<input type="password" name="password" placeholder="Enter your password" id="password" class="input-xlarge">
																</div>
															</div>
															<button class="btn btn-inverse">Continue</button>
														</fieldset>
													</form> <br/>';
								}else{
									echo '<section class="header_text">
											¡Vaya! Tienes el carrito vacío, dirígete a <strong><a href="products.php">Productos</a></strong>.
										</section>';
									}
							}else{
								echo '<section class="header_text">
										Debes logearte para realizar la compra, accede a <strong><a href="register.php">Registro</a></strong>.
									</section>';
							}
						?>
			
					</div>
				</div>
			</section>			
			
<?php include('fin-pagina.php'); ?>