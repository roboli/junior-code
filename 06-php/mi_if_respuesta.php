<?php
  $numero = $_POST['valor_x'];
  $respuesta = '';
  $es_correcta = false;

  if ($numero == '2') {
    $respuesta = 'Acetaste! Eres un genio.';
    $es_correcta = true;
  } elseif ($numero == '1' || $numero == '3') {
    $respuesta = 'Casi, intenta de nuevo.';
  } else {
    $respuesta = 'Oye, tienes que ponerte a estudiar!';
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Respuesta Algebra</title>
  </head>
  <body>
    <?php echo($respuesta); ?>
    <?php if (!$es_correcta): ?>
    <a href="http://localhost/ejemplos/mi_if_formulario.html" />
       Regresar
    </a>
    <?php endif; ?>
  </body>
</html>
