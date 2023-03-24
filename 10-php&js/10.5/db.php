<?php

  function crear_conexion($nombre_servidor, $usuario, $password, $nombre_db) {
    $conx = mysqli_connect($nombre_servidor, $usuario, $password, $nombre_db);

    if (!$conx) {
      die('Conexion fallida: ' . mysqli_connect_error());
    }

    return $conx;
  }

  function conectar_db() {
    return crear_conexion('localhost', 'root', '', 'articulos');
  }

?>
