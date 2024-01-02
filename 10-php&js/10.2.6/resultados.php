<?php
require('db.php');

  session_start();

  $conn = conectar_db('localhost', 'root', '', 'votaciones');

  $saga_id = $_POST['saga_id'];
  $hay_voto = existe_voto($conn, session_id());
  if (!$hay_voto) {
    insertar_voto($conn, session_id(), $saga_id);
  }

  function obtener_saga($array_sagas, $id) {
    $indice = array_search($id, array_column($array_sagas, 'id'));
    return $array_sagas[$indice];
  }

  function ordernar_sagas($array_sagas) {
    function comparar_votos($a, $b) {
      if ($a['votos'] > $b['votos']) {
        return -1;
      } elseif ($a['votos'] < $b['votos']) {
        return 1;
      } else {
        return 0;
      }
    }

    usort($array_sagas, 'comparar_votos');
    return $array_sagas;
  }

  function imprimir_sagas($array_sagas, $total) {
    $tabla = '<table>';

    // Columnas
    $tabla .= '<tr>';
    $tabla .= '<th></th><th></th><th></th>';
    $tabla .= '</tr>';

    foreach($array_sagas as $saga) {
      $fila = '<tr>';
      $fila .= '<td width="30%">';
      $fila .= $saga['nombre'];
      $fila .= '</td>';
      $fila .= '<td width="65%">';
      $fila .= '<div class="resultado">';
      $fila .= '<div class="' . $saga['id'] . '">';
      $fila .= (round($saga['votos'] / $total, 2) * 100) . '%';
      $fila .= '</div>';
      $fila .= '</div>';
      $fila .= '</td>';
      $fila .= '<td>(';
      $fila .= $saga['votos'];
      $fila .= ')</td>';
      $fila .= '</tr>';

      $tabla .= $fila;
    }

    $tabla .= '</table>';

    echo($tabla);
  }

  function imprimir_sagas_clases($array_sagas, $total) {
    foreach($array_sagas as $saga) {
      $clase = '.' . $saga['id'] . ' {';
      $clase .= ' width: ' . (round($saga['votos'] / $total, 2) * 100) . '%;';
      $clase .= ' background-color: ' . '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6) . ';';
      $clase .= ' padding: 10px 0;';
      $clase .= ' text-align: center;';
      $clase .= ' font-size: 0.7em;';
      $clase .= ' color: black;';

      $clase .= ' }' . PHP_EOL;

      echo($clase);
    }
  }

  function suma_total($acumulado, $s) {
    $acumulado += $s['votos'];
    return $acumulado;
  }

  $sagas = seleccionar_sagas($conn);
  $sagas_ordenadas = ordernar_sagas($sagas->fetch_all(MYSQLI_ASSOC));
  $total_votos = array_reduce($sagas_ordenadas, 'suma_total');
  $saga = obtener_saga($sagas_ordenadas, $saga_id);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Resultados</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
      href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap"
      rel="stylesheet">

    <style>
      * {
      	  font-family: 'Mochiy Pop P One', sans-serif;
      }

      body {
          background-color: #f1faee;
      }

      .menu {
          margin: 0 auto;
          width: 40%;
          text-align: center;
      }

      .menu > ul {
          list-style-type: none;
          margin: 0;
          padding: 0;
      }

      .menu > ul > li {
          display: inline;
      }

      .menu > ul > li > a {
          color: green;
          text-align: center;
          padding: 15px 18px;
          text-decoration: none;
          font-size: 0.8em;
      }

      div.contenido {
          margin: 0 auto;
          padding-top: 50px;
          width: 30%;
      }

      h1 {
          margin: 0 auto;
          padding-top: 50px;
          width: 30%;
          border-bottom-style: solid;
          border-width: 1px;
          text-align: center;
          color: #e63946;
      }

      h3 {
          color: #1d3557;
      }

      p, td {
          color: #457b9d;
      }

      table {
          width: 100%;
      }

      .resultado {
          width: 100%;
          background-color: #ddd;
          padding: 0;
      }

      <?php imprimir_sagas_clases($sagas_ordenadas, $total_votos); ?>
    </style>
  </head>
  <body>
    <h1>Resultados</h1>
    <div class="menu">
      <ul>
        <li><a href="../mis_sagas_favoritas.html">Inicio</a></li>
        <li><a href="index.html">Votaciones</a></li>
        <li><a href="#">Resultados</a></li>
      </ul>
    </div>
    <div class="contenido">
      <?php if ($hay_voto): ?>
      <h3>Ya has votado anteriormente y no puedes hacerlo de nuevo.</h3>
      <?php else: ?>
      <h3>Gracias por tu voto.</h3>
      <?php endif; ?>
        <p>Votaste por: <b><?php echo($saga['nombre']) ?></b></p>
      <?php imprimir_sagas($sagas_ordenadas, $total_votos); ?>
    </div>
  </body>
</html>
