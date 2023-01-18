<?php

  function conectar_db($nombre_servidor, $usuario, $password, $nombre_db) {
    $conx = mysqli_connect($nombre_servidor, $usuario, $password, $nombre_db);

    if (!$conx) {
      die('Conexion fallida: ' . mysqli_connect_error());
    }

    return $conx;
  }

  function seleccionar_articulos($conexion) {
    $sql = 'SELECT id, nombre, precio FROM lista';
    $resultado = mysqli_query($conexion, $sql);
    return $resultado;
  }

  function limpiar_articulos($conexion) {
    $sql = 'DELETE FROM lista';

    if (!mysqli_query($conexion, $sql)) {
      echo('Error: ' . $sql . '<br>' . mysqli_error($conexion));
    }
  }

  function insertar_articulo($conexion, $nombre) {
    $sql = "INSERT INTO lista (nombre) VALUES ('$nombre')";

    if (!mysqli_query($conexion, $sql)) {
      echo('Error: ' . $sql . '<br>' . mysqli_error($conexion));
    }
  }

  function modificar_articulo($conexion, $id, $nombre) {
    $sql = "UPDATE lista SET nombre = '$nombre' WHERE id = $id";

    if (!mysqli_query($conexion, $sql)) {
      echo('Error: ' . $sql . '<br>' . mysqli_error($conexion));
    }
  }

  function imprimir_articulos($resultado) {
    while($articulo = $resultado->fetch_assoc()) {
      $form = '';

      $form .= '<form action="mis_articulos_db.php" method="post">';
      $form .= '<input type="hidden" name="id" value="' . $articulo['id'] . '" />';
      $form .= '<input type="text" name="nombre" value="' . $articulo['nombre'] . '" />';
      $form .= '<input type="submit" value="Cambiar">';
      $form .= '</form><br />';

      echo($form);
    }
  }

  $conn = conectar_db('localhost', 'root', '', 'articulos');
  $articulos = seleccionar_articulos($conn);

  if($_POST['limpiar']) {
    limpiar_articulos($conn);
    header('Location: mis_articulos_db.php');

  } else if($_POST['articulo']) {
    $nombre = $_POST['articulo'];
    insertar_articulo($conn, $nombre);
    header('Location: mis_articulos_db.php');

  } else if(isset($_POST['indice'])) {
    $id = $_POST['id'];
    $nuevo_nombre = $_POST['nombre'];
    modificar_articulo($conn, $id, $nuevo_nombre);
    header('Location: mis_articulos_db.php');

  }

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Mis Articulos</title>
  </head>
  <body>
  <?php imprimir_articulos($articulos); ?>

    <form action="mis_articulos_db.php" method="post">
      <label for="articulo">Ingresa un articulo:</label>
      <input type="text" id="articulo" name="articulo" />
      <input type="submit" value="Agregar">
    </form>

    <form action="mis_articulos_db.php" method="post">
      <input type="submit" name="limpiar" value="Limpiar" />
    </form>
  </body>
</html>
