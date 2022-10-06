<?php
  session_start();

  if(empty($_SESSION)) {
    $_SESSION['articulos'] = array();
  } else if($_POST['limpiar']) {
    session_destroy();
    header('Location: mis_articulos_final.php');
  } else if($_POST['articulo']) {
    $_SESSION['articulos'][] = $_POST['articulo'];
  }

  function imprimir_articulos($array_articulos) {
    foreach($array_articulos as $articulo) {
      echo('<p>' . $articulo . '</p>');
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Mis Articulos</title>
  </head>
  <body>
    <?php imprimir_articulos($_SESSION['articulos']); ?>

    <form action="mis_articulos_final.php" method="post">
      <label for="articulo">Ingresa un articulo:</label>
      <input type="text" id="articulo" name="articulo" />
      <input type="submit" value="Agregar">
    </form>

    <form action="mis_articulos_final.php" method="post">
      <input type="hidden" name="limpiar" value="limpiar" />
      <input type="submit" value="Limpiar">
    </form>
  </body>
</html>
