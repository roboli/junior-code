<?php
  $color = $_POST['color'];
?>

<!DOCTYPE html>
<html>
  <body>
    <h1 style="color: <?php echo($color == 'rojo' ? 'red' : ''); ?>">
      Hola Mundo!
    </h1>
    <form action="texto_color.php" method="post">
      <input type="hidden" id="color" name="color" value="rojo" />
      <input type="submit" value="Cambiar color">
    </form>
  </body>
</html>
