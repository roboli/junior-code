<?php
require('db.php');

  $conn = conectar_db('localhost', 'root', '', 'votaciones');

  $saga_id = $_POST['saga_id'];
  modificar_sagas($conn, $saga_id);

  $saga;

  switch($saga_id)
  {
    case 'harry':
      $saga = 'Harry Potter';
      break;

    case 'percy':
      $saga = 'Percy Jackson';
      break;

    case 'ender':
      $saga = 'Ender Wigin';
      break;
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
      $fila .= '<td>';
      $fila .= $saga['nombre'];
      $fila .= '</td>';
      $fila .= '<td>';
      $fila .= $saga['votos'];
      $fila .= '</td>';
      $fila .= '<td>';
      $fila .= (round($saga['votos'] / $total, 2) * 100) . '%';
      $fila .= '</td>';
      $fila .= '</tr>';

      $tabla .= $fila;
    }

    $tabla .= '</table>';

    echo($tabla);
  }

  function suma_total($acumulado, $s) {
    $acumulado += $s['votos'];
    return $acumulado;
  }

  $sagas = seleccionar_sagas($conn);
  $sagas_ordenadas = ordernar_sagas($sagas->fetch_all(MYSQLI_ASSOC));
  $total_votos = array_reduce($sagas_ordenadas, 'suma_total');

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Resultados</title>
  </head>
  <body>
    <h3>Gracias por tu voto.</h3>
    <p>Votaste por: <b><?php echo($saga) ?></b></p>
    <p>Resultados:</p>
    <?php imprimir_sagas($sagas_ordenadas, $total_votos); ?>
  </body>
</html>
