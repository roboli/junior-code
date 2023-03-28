<?php
require('db.php');

  $conn = conectar_db();

  function limpiar_articulos($conexion) {
    $sql = 'DELETE FROM lista';

    if (!mysqli_query($conexion, $sql)) {
      echo('Error: ' . $sql . '<br>' . mysqli_error($conexion));
    }
  }

  limpiar_articulos($conn);

  $resultado = new stdClass();
  $resultado->resultado = 'okay';
  echo(json_encode($resultado));

  mysqli_close($conn);

?>
