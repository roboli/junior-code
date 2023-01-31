<?php
  $saga = $_POST['saga'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Votaciones</title>
  </head>
  <?php if (empty($saga)): ?>
  <script>
    function escogerSaga() {
      let boton = document.getElementById('votar');
      let checkbox = document.getElementById('leyo_todas');

      if (checkbox.checked) {
        boton.removeAttribute('disabled');
      } else {
        boton.setAttribute('disabled', true);
      }
    }

    function aplicarLeyoTodas() {
      let boton = document.getElementById('votar');
      let checkbox = document.getElementById('leyo_todas');
      let radios = document.getElementsByName('saga');
      let haySaga;

      for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
          haySaga = true;
          break;
        }
      }

      if (checkbox.checked && haySaga) {
        boton.removeAttribute('disabled');
      } else {
        boton.setAttribute('disabled', true);
      }
    }
  </script>
  <?php endif; ?>
  <body>
    <?php if (empty($saga)): ?>
    <form action="votaciones.php" method="post">
      <p>Ingresa tu voto:</p>
      <input id="hp" type="radio" name="saga" value="Harry Potter" onclick="escogerSaga();">
      <label for="hp">Harry Potter</label><br />
      <input id="pj" type="radio" name="saga" value="Percy Jackson" onclick="escogerSaga();">
      <label for="pj">Percy Jackson</label><br />
      <input id="ew" type="radio" name="saga" value="Ender Wigin" onclick="escogerSaga();">
      <label for="ew">Ender Wigin</label><br /><br />
      <input type="checkbox" id="leyo_todas" name="leyo_todas" value="leyo_todas" onchange="aplicarLeyoTodas();">
      <label for="leyo_todas"> Confirmo que lei todas las sagas</label><br /><br />
      <input id="votar" type="submit" value="Votar" disabled="true">
    </form>
    <?php else: ?>
    <h3>Gracias por tu voto.</h3>
    <p>Votaste por: <b><?php echo($saga) ?></b></p>
    <?php endif; ?>
  </body>
</html>
