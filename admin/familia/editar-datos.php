<?php
  session_start();
  $rutaCss = "../..";
  require($rutaCss.'/php/database.php');
  include $rutaCss.'/admin/comienzo-pagina.php';
?>


<header>Edita una familia existente</header>

<?php 
if (isset($_SESSION['admin'])){
  echo '
<form id="form" class="topBefore" action="./php/editar.php" method="post" autocomplete="off">
		
    <!-- Elementos del formulario -->';
    
      extract($_GET);

      // Conectamos y comprobamos la conexión
      $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);
      if (mysqli_connect_errno()) {
              printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
      }
      else{
          $idfamilia = mysqli_real_escape_string($link, $idfamilia);
          // Consultamos e imprimimos las opciones
          $query="SELECT NOMBRE, DESCRIPCION FROM ".TABLA_FAMILIA." WHERE ID='$idfamilia'";
          if ($result = mysqli_query($link, $query)) {
                                
              $row = mysqli_fetch_row($result);
              if(is_null($row)){
                  printf("<header>Objeto no encontrado. Deja de intentarlo</header>", mysqli_connect_error());
              }
              else{ 
              echo '<input name="nombre" type="text" placeholder="Nuevo nombre" maxlength="30" required value="'.$row[0].'" /><br>';

              echo '<input name="descripcion" type="text" placeholder="Nueva descripción" maxlength="200"  value="'.$row[1].'" /><br>';
              }
          }
          mysqli_close($link);
      }

    echo '<!-- Botones de navegación -->
    
    <input id="ultimo" name="submit" type="submit" value="Actualizar familia">
  
</form>';
}
?>

<?php 
  include $rutaCss.'/admin/fin-pagina.php'; 
?>