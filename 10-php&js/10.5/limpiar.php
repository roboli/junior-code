<?php
require('db.php');

  function limpiar_articulos($conexion) {
    $sql = 'DELETE FROM lista';

    if (!mysqli_query($conexion, $sql)) {
      echo('Error: ' . $sql . '<br>' . mysqli_error($conexion));
    }
  }

  $conn = conectar_db();

  limpiar_articulos($conn);

  $resultado = new stdClass();
  $resultado->resultado = 'okay';
  echo(json_encode($resultado));

  mysqli_close($conn);

?>
