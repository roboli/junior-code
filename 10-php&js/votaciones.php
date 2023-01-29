<?php
  $candidato = $_POST['candidato'];
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Votaciones</title>
  </head>
  <?php if (empty($candidato)): ?>
  <script>
    function escogerCandidato() {
      let boton = document.getElementById('votar');
      let checkbox = document.getElementById('mayor_edad');

      if (checkbox.checked) {
        boton.removeAttribute('disabled');
      } else {
        boton.setAttribute('disabled', true);
      }
    }

    function aplicarMayorEdad() {
      let boton = document.getElementById('votar');
      let checkbox = document.getElementById('mayor_edad');
      let radios = document.getElementsByName('candidato');
      let hayCandidato;

      for (var i = 0; i < radios.length; i++) {
        if (radios[i].checked) {
          hayCandidato = true;
          break;
        }
      }

      if (checkbox.checked && hayCandidato) {
        boton.removeAttribute('disabled');
      } else {
        boton.setAttribute('disabled', true);
      }
    }
  </script>
  <?php endif; ?>
  <body>
    <?php if (empty($candidato)): ?>
    <form action="votaciones.php" method="post">
      <p>Ingresa tu voto:</p>
      <input id="dg" type="radio" name="candidato" value="Doroteo Gomez" onclick="escogerCandidato();">
      <label for="dg">Doroteo Gomez</label><br />
      <input id="sl" type="radio" name="candidato" value="Susana Lara" onclick="escogerCandidato();">
      <label for="sl">Susana Lara</label><br />
      <input id="ma" type="radio" name="candidato" value="Miguel Alonzo" onclick="escogerCandidato();">
      <label for="ma">Miguel Alonzo</label><br /><br />
      <input type="checkbox" id="mayor_edad" name="mayor_edad" value="18+" onchange="aplicarMayorEdad();">
      <label for="mayor_edad"> Confirmo que soy mayor de edad</label><br /><br />
      <input id="votar" type="submit" value="Votar" disabled="true">
    </form>
    <?php else: ?>
    <h3>Gracias por tu voto.</h3>
    <p>Tu voto fue recibido: <b><?php echo($candidato) ?></b></p>
    <?php endif; ?>
  </body>
</html>
