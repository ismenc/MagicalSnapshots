<?php
  session_start();
  $rutaCss = "../..";
  require($rutaCss.'/php/database.php');
  include $rutaCss.'/admin/comienzo-pagina.php';
?>


<header>Insertar nueva subfamilia</header>

<?php 
if (isset($_SESSION['admin'])){
  echo '
<form id="form" class="topBefore" action="./php/insertar.php" method="post" autocomplete="off">

    <!-- Elementos del formulario -->
		
    <input name="nombre" type="text" placeholder="Nombre" required maxlength="30" /><br>
    
    <input name="descripcion" type="text" placeholder="Descripción" maxlength="200" /><br>';
    
    include('../php/generaSpinnerFamilia.php');

    echo '<!-- Botones de navegación --><br>
    
    <input class="botonAzul" type="button" onclick="location.href=\'./index.html\';" value="Volver" /><br>
  <input id="ultimo" type="submit" value="Insertar">
  
</form>';
}
?>
    
<?php 
  include $rutaCss.'/admin/fin-pagina.php'; 
?>
