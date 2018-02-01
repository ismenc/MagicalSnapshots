<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Editar subfamilia</title>

      <link rel="stylesheet" href="../styles.css">

  
</head>
<body>

        <header>Edita una subfamilia existente</header>

<form id="form" class="topBefore" action="./php/editar.php" method="post" autocomplete="off">
		
    <!-- Elementos del formulario -->

    <?php require '../databasename.php'; include('../php/generaSpinnerSubfamilia.php'); ?>

    <input name="nombre" type="text" placeholder="Nuevo nombre" required maxlength="30" />

    <input name="descripcion" type="text" placeholder="Nueva descripción" maxlength="200" />

    <?php include('../php/generaSpinnerFamilia.php'); ?>


    <!-- Botones de navegación -->
    
    <input class="botonAzul" name="volver" type="button" onclick="location.href='./index.html';" value="Volver" />
    <input id="ultimo" name="submit" type="submit" value="Actualizar">
  
</form>

    <canvas></canvas>
    <script  src="../index.js"></script>
    
</body>
</html>
