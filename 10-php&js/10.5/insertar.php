<?php
require('db.php');

  function insertar_articulo($conexion, $nombre, $precio) {
    $sql = "INSERT INTO lista (nombre, precio) VALUES (?, ?)";

    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 'sd', $nombre, $precio);

    if (!mysqli_stmt_execute($stmt)) {
      echo('Error: ' . $sql . '<br>' . mysqli_error($conexion));
    }
  }

  $conn = conectar_db();

  $nombre = $_POST['nombre'];
  $precio = $_POST['precio'];

  $resultado = new stdClass();

  if(is_numeric($precio)) {
    insertar_articulo($conn, $nombre, $precio);
    $resultado->id = mysqli_insert_id($conn);
    echo(json_encode($resultado));

  } else {
    $resultado->error = 'Precio debe ser un valor numerico';
    echo(json_encode($resultado));

  }

  mysqli_close($conn);

?>
