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
    <form action="escritura_archivo.php" method="post">
      <label for="texto">Ingresa texto:</label><br />
      <textarea type="text" id="texto" name="texto" rows="2" cols="30" maxlength="100"></textarea>
      <br />
      <br />
      <input type="submit" value="Agregar">
    </form>
    <h3>Resultado</h3>
    <p><i><?php echo($texto); ?></i></p>
  </body>
</html>
