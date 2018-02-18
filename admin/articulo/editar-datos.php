<?php
  session_start();
  $rutaCss = "../..";
  require($rutaCss.'/php/database.php');
  include $rutaCss.'/admin/comienzo-pagina.php';
?>


<header>Editar un artículo</header>

<?php 
if (isset($_SESSION['admin'])){
  echo '

<form id="form"  enctype="multipart/form-data" class="topBefore" action="php/editar.php" method="post" autocomplete="off">

    <!-- Elementos del formulario -->';
	


      extract($_GET);

      // Conectamos y comprobamos la conexión
      $link = mysqli_connect(ADDRES_SERVER, USER, PASS, SERVERMYSQL);
      if (mysqli_connect_errno()) {
              printf("<header>Fallo en la conexión: %s</header>", mysqli_connect_error());
      }
      else{

          // Consultamos e imprimimos las opciones
          $query="SELECT NOMBRE, DESCRIPCION, PRECIO, STOCK FROM ".TABLA_ARTICULO." WHERE ID='$idarticulo'";
          if ($result = mysqli_query($link, $query)) {
                  
              $row = mysqli_fetch_row($result);

              if(is_null($row)){
                  printf("<header>Objeto no encontrado. Deja de intentarlo</header>", mysqli_connect_error());
              }
              else{ 
                  echo '<input name="nombre" type="text" placeholder="Nombre" required maxlength="50" value="'.$row[0].'" /><br>';
                  echo '<input name="descripcion" type="text" placeholder="Descripción" maxlength="200" value="'.$row[1].'" /><br>';
                  echo '<input id="foto" name="foto" type="file" placeholder="Imagen del producto" accept="image/*" /><br>';
                  echo '<label id="subir" for="foto" >Subir una imagen</label><br>';
                  echo '<input name="precio" type="number" step="0.01" placeholder="Precio" min="0" required value="'.$row[2].'" /><br>';
                  echo '<input name="stock" type="number" placeholder="Stock" min="0" required value="'.$row[3].'" /><br>';
              }

              mysqli_free_result($result);
          }
          mysqli_close($link);
      }

    include('../php/generaSpinnerSubfamilia.php'); echo '<br>';
    include('../php/generaSpinnerLinea.php'); echo '<br>';
  
    echo '<!-- Botones de navegación -->
    
    <input class="botonAzul" type="button" onclick="location.href='editar.php';" value="Volver" /><br>
  <input id="ultimo" type="submit" value="Actualizar artículo">
  
</form>';
    
} ?>
    
<?php 
  include $rutaCss.'/admin/fin-pagina.php'; 
?>
