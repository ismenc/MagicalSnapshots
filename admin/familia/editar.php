<?php
  session_start();
  $rutaCss = "../..";
  require($rutaCss.'/php/database.php');
  include $rutaCss.'/admin/comienzo-pagina.php';
?>

<header>Editar una familia</header>

<form id="form" class="topBefore" action="editar-datos.php" method="get" autocomplete="off">
		
    <!-- Elementos del formulario -->
    
    <?php
    if (isset($_SESSION['admin'])){

      // Conectamos y comprobamos la conexión
      $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);
      if (mysqli_connect_errno()) {
              printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
      }
      else{

          // Consultamos e imprimimos las opciones
          $query="SELECT ID, NOMBRE, DESCRIPCION FROM ".TABLA_FAMILIA;
          if ($result = mysqli_query($link, $query)) {
              
              echo"<select name=\"idfamilia\" class=\"spinner\"><br>";
              echo "<option value=\"\" disabled selected>ID de familia</option><br>";
                  
              while ($row = mysqli_fetch_row($result)) {
                  echo "<option value=\"".$row[0]."\">".$row[0]." - ".$row[1]."</option><br>";
              }
              echo "</select><br>";
              mysqli_free_result($result);
          }
          mysqli_close($link);
      }
  echo '
    <!-- Botones de navegación -->
    
    <input id="ultimo" name="submit" type="submit" value="Seleccionar familia">
  
</form>';
}
  ?>

<?php include $rutaCss.'/admin/fin-pagina.php'; ?>