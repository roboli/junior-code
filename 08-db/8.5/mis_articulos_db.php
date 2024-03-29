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

  function insertar_articulo($conexion, $nombre, $precio) {
    $sql = "INSERT INTO lista (nombre, precio) VALUES (?, ?)";

    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 'sd', $nombre, $precio);

    if (!mysqli_stmt_execute($stmt)) {
      echo('Error: ' . $sql . '<br>' . mysqli_error($conexion));
    }
  }

  function modificar_articulo($conexion, $id, $nombre, $precio) {
    $sql = "UPDATE lista SET nombre = ?, precio = ? WHERE id = ?";

    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 'sdi', $nombre, $precio, $id);

    if (!mysqli_stmt_execute($stmt)) {
      echo('Error: ' . $sql . '<br>' . mysqli_error($conexion));
    }
  }

  function eliminar_articulo($conexion, $id) {
    $sql = "DELETE FROM lista WHERE id = ?";

    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (!mysqli_stmt_execute($stmt)) {
      echo('Error: ' . $sql . '<br>' . mysqli_error($conexion));
    }
  }

  function imprimir_articulos($resultado) {
    while($articulo = $resultado->fetch_assoc()) {
      $form = '';

      $form .= '<form style="display:inline;" action="mis_articulos_db.php" method="post">';
      $form .= '<input type="hidden" name="id" value="' . $articulo['id'] . '" />';
      $form .= '<input type="text" name="nombre" placeholder="Nombre" value="' . $articulo['nombre'] . '" />';
      $form .= '<input type="text" name="precio" placeholder="Precio" value="' . $articulo['precio'] . '" />';
      $form .= '<input type="submit" name="cambiar" value="Cambiar" />';
      $form .= '</form>';
      $form .= '<form style="display:inline;" action="mis_articulos_db.php" method="post">';
      $form .= '<input type="hidden" name="id" value="' . $articulo['id'] . '" />';
      $form .= '<input type="submit" name="borrar" value="Borrar" />';
      $form .= '</form><br /><br />';

      echo($form);
    }
  }

  $conn = conectar_db('localhost', 'root', '', 'articulos');

  if($_POST['limpiar']) {
    limpiar_articulos($conn);

  } else if($_POST['agregar']) {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];

    if(is_numeric($precio)) {
      insertar_articulo($conn, $nombre, $precio);
    } else {
      echo('<p style="color: red"><b>Precio debe ser un valor numerico</b></p>');
    }

  } else if(isset($_POST['cambiar'])) {
    $id = $_POST['id'];
    $nuevo_nombre = $_POST['nombre'];
    $nuevo_precio = $_POST['precio'];

    if(is_numeric($nuevo_precio)) {
      modificar_articulo($conn, $id, $nuevo_nombre, $nuevo_precio);
    } else {
      echo('<p style="color: red"><b>Precio debe ser un valor numerico</b></p>');
    }

  } else if(isset($_POST['borrar'])) {
    $id = $_POST['id'];
    eliminar_articulo($conn, $id);

  }

  $articulos = seleccionar_articulos($conn);
  mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Mis Articulos</title>
  </head>
  <body>
    <?php imprimir_articulos($articulos); ?>

    <form action="mis_articulos_db.php" method="post">
      <label for="nombre">Ingresa un articulo:</label>
      <input type="text" id="nombre" name="nombre" placeholder="Nombre" />
      <input type="text" id="precio" name="precio" placeholder="Precio" />
      <input type="submit" name="agregar" value="Agregar" />
    </form>

    <form action="mis_articulos_db.php" method="post">
      <input type="submit" name="limpiar" value="Limpiar" />
    </form>
  </body>
</html>
