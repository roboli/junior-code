<?php
  $mi_texto = fopen('mi_texto.txt', 'r') or die('No abre archivo');
  $texto = '';

  while(!feof($mi_texto)) {
    $texto .= fgets($mi_texto) . '<br />';
  }

  fclose($mi_texto);
?>

<!DOCTYPE html>
<html>
  <body>
    <p><i><?php echo($texto); ?></i></p>
  </body>
</html>
