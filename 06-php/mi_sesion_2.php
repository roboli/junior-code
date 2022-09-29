<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <body>
    <h1><?php echo('Mi var es: ' . $_SESSION["mi_var"]); ?></h1>
  </body>
</html>
