<?php
  session_start();
  $rutaCss = "../..";
  require($rutaCss.'/php/database.php');
  include $rutaCss.'/admin/comienzo-pagina.php';
?>

		<header>Insertar nueva familia</header>

<?php 
if (isset($_SESSION['admin'])){
  echo '
    <form id="form" class="topBefore" action="./php/insertar.php" method="post" autocomplete="off">
    <fieldset>

        <!-- Elementos del formulario -->
    		
        <input name="nombre" type="text" placeholder="Nombre" maxlength="30" required /><br>

    	<input name="descripcion" type="text" placeholder="Descripción" maxlength="200"/><br>
      
        <!-- Botones navegación -->
        
        <input class="botonAzul" type="button" onclick="location.href=\'../index.html\';" value="Volver" /><br>
      <input id="ultimo" type="submit" value="Insertar">
      </fieldset>
    </form>';
}
?>
    
<?php 
  include $rutaCss.'/admin/fin-pagina.php'; 
?>