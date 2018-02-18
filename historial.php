<?php
	session_start();
	include('comienzo-pagina.php');
?>

			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
			<?php if(!isset($_SESSION['username']))
				echo '<h4><span><strong>Historial</strong> de compra</span></h4>';
			?>
			</section>	
			<section class="main-content">
				<div class="row">
					<div class="span5" style="margin-left: 30%;">

						<?php
							if(isset($_SESSION['username'])){
									?>
									<h4 class="title"><span class="text"><strong>Historial</strong> de compra</span></h4>
									<table class="table table-striped">
									<thead>
										<tr>
											<th>Número de pedido</th>
											<th>Fecha</th>
											<th>Factura</th>
										</tr>
									</thead>
									<tbody>
									<?php
										$link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);
									        if (mysqli_connect_errno()) {
									                printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
									        }
									        else{
												$consulta = mysqli_query($link, "SELECT ID FROM usuario WHERE USUARIO='".$_SESSION['username']."'");
												$idusuario = mysqli_fetch_row($consulta);

												$consulta = mysqli_query($link, "SELECT ID, FECHA FROM factura WHERE IDUSUARIO='".$idusuario[0]."'");
												while($row = mysqli_fetch_row($consulta)){

													echo '<tr>
														<td>'.$row[0].'</td>
														<td>'.$row[1].'</td>
														<td><a href="php/generar-factura.php?idfactura='.$row[0].'">Generar PDF</a></td>
													</tr>';

												}
												echo '</tbody></table>';
												mysqli_free_result($consulta);
												mysqli_close($link);
											}
								}else{
									echo '<section class="header_text">
											Debes logearte para ver el historial de compra, accede a <strong><a href="register.php">Registro</a></strong>.
										</section>';
							}
						?>
			
					</div>
				</div>
			</section>			
			
<?php include('fin-pagina.php'); ?>