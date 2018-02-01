<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <title>Editar artículo</title>

      <link rel="stylesheet" href="../styles.css">

  
</head>

<body>

    <header>Editar un artículo</header>

<form id="form"  enctype="multipart/form-data" class="topBefore" action="./php/editar.php" method="post" autocomplete="off">

    <!-- Elementos del formulario -->
	
    <?php require '../databasename.php';include('../php/generaSpinnerArticulo.php'); ?>
    <input name="nombre" type="text" placeholder="Nombre" required maxlength="50" />
    <input name="descripcion" type="text" placeholder="Descripción" maxlength="200" />
    <input id="foto" name="foto" type="file" placeholder="Imagen del producto" accept="image/*" />
    <label id="subir" for="foto" >Subir una imagen</label>
    <input name="precio" type="number" step="0.01" placeholder="Precio" min="0" required />
    <input name="stock" type="number" placeholder="Stock" min="0" required />
    <?php include('../php/generaSpinnerSubfamilia.php'); ?>
    <?php include('../php/generaSpinnerLinea.php'); ?>
  
    <!-- Botones de navegación -->
    
    <input class="botonAzul" type="button" onclick="location.href='./index.html';" value="Volver" />
  <input id="ultimo" type="submit" value="Editar">
  
</form>
    
<canvas></canvas>
<script  src="../index.js"></script>

</body>
</html>
