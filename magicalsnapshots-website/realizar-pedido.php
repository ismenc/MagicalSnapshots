<?php
	session_start();
	include('comienzo-pagina.php');
?>

			<section class="header_text sub">
			<img class="pageBanner" src="themes/images/pageBanner.png" alt="New products" >
				<h4><span>Resultado de compra</span></h4>
			</section>
			<section class="main-content">
				
				<div class="row">						
					<div class="span12">


<?php

	if(empty($_SESSION['carro']) || !isset($_SESSION['username'])){
		echo '<h4><span>¡Eh! Fuera de aquí <strong>pillín</strong></span></h4>';
	}else{

		$link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);
	    if (mysqli_connect_errno()) {
	            printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
	    }
	    else{
			$carro = $_SESSION['carro'];

			// Obtenemos la id del usuario para las facturas
			$consultaUsuario = mysqli_query($link, "SELECT ID FROM ".TABLA_USUARIO." WHERE USUARIO='".$_SESSION['username']."'");
			$usuario = mysqli_fetch_row($consultaUsuario);

			// Insertamos la factura
			mysqli_query($link, "INSERT INTO factura(FECHA, IDUSUARIO) values(now(), $usuario[0]);");
			mysqli_free_result($consultaUsuario);

			// Obtenemos la id de nuestra factura (la ultima insertada)
			$consultaFactura = mysqli_query($link, "SELECT ID FROM factura ORDER BY ID DESC LIMIT 1");
			$factura = mysqli_fetch_row($consultaFactura);

			// Recorremos todos los productos del carrito y los insertamos
			foreach($carro as $c => $producto){

				// Obtenemos el precio y stock del producto
				$consultaArticulo = mysqli_query($link, "SELECT PRECIO, STOCK FROM ".TABLA_ARTICULO." WHERE ID='".$producto['id']."'");
				$rowArticulo = mysqli_fetch_row($consultaArticulo);

				// Comprobamos stock
				if($producto['cantidad'] <= $rowArticulo[1])
					$cantidad = $producto['cantidad'];
				else
					$cantidad = $rowArticulo[1];
				

				if($cantidad > 0){
					// Insertamos linea de factura
					mysqli_query($link, "INSERT INTO lineas(PRECIO, CANTIDAD, IDFACTURA, IDARTICULO) values($rowArticulo[0], $cantidad, $factura[0], ".$producto['id'].");");
					
					// Restamos del stock
					mysqli_query($link, "UPDATE articulos SET STOCK = STOCK - $cantidad WHERE ID=".$producto['id']);
				}
			}

			echo '<h4><span>Compra realizada con <strong>éxito</strong></span></h4>';

			echo '<a href="php/generar-factura.php?idfactura='.$factura[0].'">Ver factura</a>';

			unset($_SESSION['carro']);

			mysqli_free_result($consultaArticulo);
			mysqli_close($link);
		}
	}

?>


					</div>
				</div>
			</section>	


			<?php include('fin-pagina.php'); ?>