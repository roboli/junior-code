<?php
require('db.php');

$conn = conectar_db('localhost', 'root', '', 'votaciones');

$voto = $_POST['voto'];

modificar_votos($conn, $voto);

$saga;

switch($voto)
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
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Resultados</title>
  </head>
  <body>
    <h3>Gracias por tu voto.</h3>
    <p>Votaste por: <b><?php echo($saga) ?></b></p>
  </body>
</html>
