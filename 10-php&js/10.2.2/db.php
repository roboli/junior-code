<?php

function conectar_db($nombre_servidor, $usuario, $password, $nombre_db) {
  $conx = mysqli_connect($nombre_servidor, $usuario, $password, $nombre_db);

  if (!$conx) {
    die('Conexion fallida: ' . mysqli_connect_error());
  }

  return $conx;
}

function modificar_votos($conexion, $id) {
  $sql = "UPDATE votaciones SET = INC(votos) WHERE id = ?";

  $stmt = mysqli_prepare($conexion, $sql);
  mysqli_stmt_bind_param($stmt, 's', $id);

  if (!mysqli_stmt_execute($stmt)) {
    echo('Error: ' . $sql . '<br>' . mysqli_error($conexion));
  }
}

?>
