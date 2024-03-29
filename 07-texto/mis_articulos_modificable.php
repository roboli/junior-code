<?php
  session_start();

  if(empty($_SESSION)) {
    $_SESSION['articulos'] = array();
  } else if($_POST['limpiar']) {
    session_destroy();
    header('Location: mis_articulos_modificable.php');
  } else if($_POST['agregar']) {
    $_SESSION['articulos'][] = $_POST['articulo'];
  } else if(isset($_POST['cambiar'])) {
    $indice = $_POST['indice'];
    $_SESSION['articulos'][$indice] = $_POST["articulo"];
  }

  function imprimir_articulos($array_articulos) {
    $tamano = count($array_articulos);

    for ($i = 0; $i < $tamano; $i++) {
      $form = '';

      $form .= '<form action="mis_articulos_modificable.php" method="post">';
      $form .= "<input type=\"hidden\" name=\"indice\" value=\"$i\" />";
      $form .= "<input type=\"text\" name=\"articulo\" value=\"$array_articulos[$i]\" />";
      $form .= '<input type="submit" name="cambiar" value="Cambiar" />';
      $form .= '</form><br />';

      echo($form);
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

    <form action="mis_articulos_modificable.php" method="post">
      <label for="articulo">Ingresa un articulo:</label>
      <input type="text" id="articulo" name="articulo" />
      <input type="submit" name="agregar" value="Agregar" />
    </form>

    <form action="mis_articulos_modificable.php" method="post">
      <input type="submit" name="limpiar" value="Limpiar" />
    </form>
  </body>
</html>
