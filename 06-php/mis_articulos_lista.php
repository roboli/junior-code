<?php
  session_start();

  if(empty($_SESSION)) {
    $_SESSION['articulos'] = array();
  } else if($_POST['limpiar']) {
    session_destroy();
    header('Location: mis_articulos.html');
  }

  $_SESSION['articulos'][] = $_POST['articulo'];

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
    <a href="mis_articulos.html">Atras</a>
    <form action="mis_articulos_lista.php" method="post">
      <input type="hidden" name="limpiar" value="limpiar" />
      <input type="submit" value="Limpiar">
    </form>
  </body>
</html>
