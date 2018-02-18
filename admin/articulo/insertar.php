<?php
  session_start();
  $rutaCss = "../..";
  require($rutaCss.'/php/database.php');
  include $rutaCss.'/admin/comienzo-pagina.php';
?>


<header>Insertar nuevo artículo</header>

<?php 
if (isset($_SESSION['admin'])){
  echo '
    

<form id="form"  enctype="multipart/form-data" class="topBefore" action="./php/insertar.php" method="post" autocomplete="off">

    <!-- Elementos del formulario -->
		
    <input name="nombre" type="text" placeholder="Nombre" required maxlength="50" /><br>
    <input name="descripcion" type="text" placeholder="Descripción" maxlength="200" /><br>
    <input id="foto" name="foto" type="file" placeholder="Imagen del producto" accept="image/*" required /><br>
    <label id="subir" for="foto" >Subir una imagen</label><br>
    <input name="precio" type="number" step="0.01" placeholder="Precio" min="0" required /><br>
    <input name="stock" type="number" placeholder="Stock" min="0" required /><br>';
    include('../php/generaSpinnerSubfamilia.php'); 
    echo '<br><!-- Botones de navegación -->
    
  <input id="ultimo" type="submit" value="Insertar">
  
</form>';
    
} ?>
    
<?php 
  include $rutaCss.'/admin/fin-pagina.php'; 
?>
