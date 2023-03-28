<?php
require('db.php');

  function eliminar_articulo($conexion, $id) {
    $sql = "DELETE FROM lista WHERE id = ?";

    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (!mysqli_stmt_execute($stmt)) {
      echo('Error: ' . $sql . '<br>' . mysqli_error($conexion));
    }
  }

  $conn = conectar_db();

  $id = $_POST['id'];
  eliminar_articulo($conn, $id);

  $resultado = new stdClass();
  $resultado->resultado = 'okay';
  echo(json_encode($resultado));

  mysqli_close($conn);

?>
