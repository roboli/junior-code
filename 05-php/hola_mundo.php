<?php
  $tiempo = date_create();
  $hoy    = date_format($tiempo, 'd/m/Y H:i:s');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Hola Mundo!</title>
  </head>
  <body>
    <h1>Hola Mundo!</h1>
    <h2>Hoy es: <?php echo($hoy); ?></h2>
  </body>
</html>
