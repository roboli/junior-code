<?php

  function conectar_db($nombre_servidor, $usuario, $password, $nombre_db) {
    $conx = mysqli_connect($nombre_servidor, $usuario, $password, $nombre_db);

    if (!$conx) {
      die('Conexion fallida: ' . mysqli_connect_error());
    }

    return $conx;
  }

  function seleccionar_sagas($conexion) {
    $sql = 'SELECT s.id, s.nombre, v.votos FROM sagas s '
      . 'INNER JOIN (SELECT saga_id AS id, COUNT(*) AS votos FROM votos GROUP BY saga_id) AS v '
      . 'ON s.id = v.id';
    $resultado = mysqli_query($conexion, $sql);
    return $resultado;
  }

  function existe_voto($conexion, $sesion_id) {
    $sql = 'SELECT saga_id FROM votos WHERE session_id = ?';

    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 's', $sesion_id);

    if (!mysqli_stmt_execute($stmt)) {
      echo('Error: ' . $sql . '<br>' . mysqli_error($conexion));
    } else {
      $voto = mysqli_stmt_get_result($stmt)->fetch_array();
      return is_array($voto);
    }
  }

  function insertar_voto($conexion, $sesion_id, $saga_id) {
    $sql = "INSERT INTO votos (session_id, saga_id) VALUES (?, ?);";

    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $sesion_id, $saga_id);

    if (!mysqli_stmt_execute($stmt)) {
      echo('Error: ' . $sql . '<br>' . mysqli_error($conexion));
    }
  }

?>
