<?php
  $mi_texto = fopen('mi_texto.txt', 'a') or die('No abre archivo');
  $texto = $_POST['texto'];

  fwrite($mi_texto, PHP_EOL . $texto);

  fclose($mi_texto);

  header("Location: http://localhost/ejercicios/lectura_archivo.php");
?>
