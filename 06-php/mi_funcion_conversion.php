?php

  function fahrenheit_a_celsius($grados) {
    $celsius = ($grados - 32) * (5 / 9);
    return round($celsius);
  }

  $lunes = 40;
  $martes = 45;
  $miercoles = 42;
  $jueves = 44;
  $viernes = 47;
  $sabado = 45;
  $domingo = 46;
?>

<!DOCTYPE html>
<html>
  <head>
    <title>El clima</title>
  </head>
  <body>
    <h1>Temperaturas para la siguiente semana:</h1>

    <p>
      Temperatura para el lunes:
      <?php echo(fahrenheit_a_celsius($lunes)); ?>
    </p>

    <p>
      Temperatura para el martes:
      <?php echo(fahrenheit_a_celsius($martes)); ?>
    </p>

    <p>
      Temperatura para el miercoles:
      <?php echo(fahrenheit_a_celsius($miercoles)); ?>
    </p>

    <p>
      Temperatura para el jueves:
      <?php echo(fahrenheit_a_celsius($jueves)); ?>
    </p>

    <p>
      Temperatura para el viernes:
      <?php echo(fahrenheit_a_celsius($viernes)); ?>
    </p>

    <p>
      Temperatura para el sabado:
      <?php echo(fahrenheit_a_celsius($sabado)); ?>
    </p>

    <p>
      Temperatura para el domingo:
      <?php echo(fahrenheit_a_celsius($domingo)); ?>
    </p>
  </body>
</html>
