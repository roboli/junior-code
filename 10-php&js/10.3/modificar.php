<?php
require('db.php');

  function modificar_articulo($conexion, $id, $nombre, $precio) {
    $sql = "UPDATE lista SET nombre = ?, precio = ? WHERE id = ?";

    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 'sdi', $nombre, $precio, $id);

    if (!mysqli_stmt_execute($stmt)) {
      echo('Error: ' . $sql . '<br>' . mysqli_error($conexion));
    }
  }

  $conn = conectar_db();

  $id = $_POST['id'];
  $nuevo_nombre = $_POST['nombre'];
  $nuevo_precio = $_POST['precio'];

  $resultado = new stdClass();

  if(is_numeric($nuevo_precio)) {
    modificar_articulo($conn, $id, $nuevo_nombre, $nuevo_precio);
    $resultado->resultado = 'okay';
    echo(json_encode($resultado));

  } else {
    $resultado->error = 'Precio debe ser un valor numerico';
    echo(json_encode($resultado));

  }

  mysqli_close($conn);

?>
