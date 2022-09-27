<?php
  $limite = $_POST['limite'];
  $total = 0;
  $es_valido = false;

  if ($limite > 0 && $limite <= 1000) {
    $es_valido = true;

    for ($i = 1; $i <= $limite; $i++) {
      $total = $total + $i;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Respuesta Algebra</title>
  </head>
  <body>
    <?php if ($es_valido): ?>
    <p>El total es:</p>
    <?php echo($total); ?>
    <?php else: ?>
    <p>Oye no te pases! Ingresa un numero del 1 al 1000.</p>
    <?php endif; ?>
  </body>
</html>
