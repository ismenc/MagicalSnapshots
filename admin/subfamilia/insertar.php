<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Insertar subfamilia</title>

      <link rel="stylesheet" href="../styles.css">

  
</head>

<body>

		<header>Insertar nueva subfamilia</header>

<form id="form" class="topBefore" action="./php/insertar.php" method="post" autocomplete="off">

    <!-- Elementos del formulario -->
		
    <input name="nombre" type="text" placeholder="Nombre" required maxlength="30" />
    
    <input name="descripcion" type="text" placeholder="Descripción" maxlength="200" />

    <?php require '../databasename.php'; include('../php/generaSpinnerFamilia.php'); ?>

    <!-- Botones de navegación -->
    
    <input class="botonAzul" type="button" onclick="location.href='./index.html';" value="Volver" />
  <input id="ultimo" type="submit" value="Insertar">
  
</form>
    
<canvas></canvas>
<script  src="../index.js"></script>

</body>
</html>
