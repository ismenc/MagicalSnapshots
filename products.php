<?php
	session_start();
	include('comienzo-pagina.php');
?>

			<!-- ------------------------------------ Contenido ------------------------------------ -->


			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
				<h4><span>Nuestras fotos</span></h4>
			</section>
			<section class="main-content">
				
				<div class="row">						
					<div class="span7" style="margin: 0 25%;">								
						<ul class="thumbnails listing-products">


							<!-- ------------------------------------ Variables de muestra de productos ------------------------------------ -->

							<?php
								//extract($_GET);
						        // Guarda la contraseña archivo. Para no cambiar todos los mysqli
						        $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);
						        if (mysqli_connect_errno()) {
						                printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
						        }
						        else{

						        	// Protegemos la entrada de datos
						        	if(isset($pag))
						        		$pag = mysqli_real_escape_string($link, $pag);
						        	else
						        		$pag = 0;

						        	$where = "WHERE a.IDSUBFAMILIA=s.ID ";
						        	if(isset($cat)){
						        		$cat = mysqli_real_escape_string($link, $cat);
						        		$where .= "AND s.IDFAMILIA=$cat ";
						        	}
						        	if(isset($subcat)){
						        		$subcat = mysqli_real_escape_string($link, $subcat);
						        		$where .= "AND a.IDSUBFAMILIA=$subcat ";
						        	}
						        	if(isset($titulo)){
						        		$titulo = mysqli_real_escape_string($link, $titulo);
						        		$where .= "AND a.NOMBRE LIKE '%$titulo%' ";
						        	}

						        	// Variables que afectan a cómo se muestran los artículos
						        	$artPorPag = 6;
						        	$totalArticulos = mysqli_fetch_row(mysqli_query($link, "SELECT COUNT(a.ID) FROM ".TABLA_ARTICULO." a, ".TABLA_SUBFAMILIA." s ".$where));
						        	$totalPaginas = $totalArticulos[0]/$artPorPag;
						        	$limites = "LIMIT ".$artPorPag." OFFSET ".($artPorPag*$pag);

						            // Consultamos y recorremos los articulos
						            $consultaArticulo="SELECT a.ID, a.FOTO, a.NOMBRE, a.DESCRIPCION, a.PRECIO FROM ".TABLA_ARTICULO." a, ".TABLA_SUBFAMILIA." s ".$where.$limites;
						            if ($result = mysqli_query($link, $consultaArticulo)) { 
						                while ($row = mysqli_fetch_row($result)) {
						                    ?><li class="span2">
												<div class="product-box">
													<span class="sale_tag"></span>												
													<a href=<?php echo "\"product_detail.php?id=".$row[0]."\""; ?>><img alt="" src=<?php echo "\"admin/images/articulos/".$row[1]."\""; ?>></a><br/>
													<a href=<?php echo "\"product_detail.php?id=".$row[0]."\""; ?> class="title"><?php echo $row[2]; ?></a><br/>
													<!--a href="#" class="category">Phasellus consequat</a-->
													<p class="price"><?php echo $row[4]; ?> €</p>
												</div>
											</li> 

											<?php

						                }
						                mysqli_free_result($result);
						            }
						            mysqli_close($link);
						        }
							?>
							      
							
						</ul>								
						<hr>
						<!-- ---------------------------------- Paginacion -------------------------------------- -->
						<div class="pagination pagination-small pagination-centered">
							<ul>
							<?php

								$get = "?";
								if(isset($cat) && $cat >= 0)
									$get .= "cat=$cat&";
								if(isset($subcat))
									$get .= "subcat=$subcat&";
								if (isset($titulo))
									$get .= "titulo=$titulo&";


								for ($i=0; $i < $totalPaginas ; $i++){
									if($i==$pag)
										echo "<li class=\"active\"><a href=\"products.php".$get."pag=".$i."\">".$i."</a></li>";
									else
										echo "<li><a href=\"products.php".$get."pag=".$i."\">".$i."</a></li>";
								}
							?>
							</ul>
						</div>
					</div>
				</div>
			</section>
			

			<?php include('fin-pagina.php'); ?>