<?php

  function guardar_archivo($ruta, $array_articulos) {
    $mi_archivo = fopen($ruta, 'w') or die('No abre archivo');
    $cuenta = count($array_articulos);

    for($i = 0; $i < $cuenta; $i++) {
      fwrite($mi_archivo, $array_articulos[$i] . PHP_EOL);
    }

    fclose($mi_archivo);
  }

  $archivo_ruta = 'mis_articulos_texto.txt';
  $articulos = file($archivo_ruta, FILE_IGNORE_NEW_LINES);

  if($_POST['limpiar']) {
    file_put_contents($archivo_ruta, '');
    header('Location: mis_articulos_permanente.php');

  } else if(isset($_POST['agregar'])) {
    $articulos[] = $_POST['articulo'];
    guardar_archivo($archivo_ruta, $articulos);

  } else if(isset($_POST['cambiar'])) {
    $indice = $_POST['indice'];
    $articulos[$indice] = $_POST["articulo"];
    guardar_archivo($archivo_ruta, $articulos);

  }

  function imprimir_articulos($array_articulos) {
    $tamano = count($array_articulos);

    for ($i = 0; $i < $tamano; $i++) {
      $form = '';

      $form .= '<form action="mis_articulos_permanente.php" method="post">';
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
    <?php imprimir_articulos($articulos); ?>

    <form action="mis_articulos_permanente.php" method="post">
      <label for="articulo">Ingresa un articulo:</label>
      <input type="text" id="articulo" name="articulo" />
      <input type="submit" name="agregar" value="Agregar" />
    </form>

	<form action="mis_articulos_permanente.php" method="post">
      <input type="submit" name="limpiar" value="Limpiar" />
    </form>
  </body>
</html>
