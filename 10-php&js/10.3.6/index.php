<?php
require('db.php');

  function seleccionar_articulos($conexion) {
    $sql = 'SELECT id, nombre, precio FROM lista';
    $resultado = mysqli_query($conexion, $sql);
    return $resultado;
  }

  function imprimir_articulos($resultado) {
    while($articulo = $resultado->fetch_assoc()) {
      $form = '';

      $form .= '<div id="articulo_' . $articulo['id'] . '">';
      $form .= '<div style="display:inline;">';
      $form .= '<input type="text" id="nombre_' . $articulo['id'] . '" placeholder="Nombre" value="' . $articulo['nombre'] . '" />';
      $form .= '<input type="text" id="precio_' . $articulo['id'] . '" placeholder="Precio" value="' . $articulo['precio'] . '" />';
      $form .= '<input type="button" name="cambiar" value="Cambiar" onclick="cambiar(\'' . $articulo['id'] . '\');" />';
      $form .= '</div>';
      $form .= '<div style="display:inline;">';
      $form .= '<input type="button" name="borrar" value="Borrar" onclick="borrar(\'' . $articulo['id'] . '\');" />';
      $form .= '</div>';
      $form .= '</div>';

      echo($form);
    }
  }

  $conn = conectar_db();

  $articulos = seleccionar_articulos($conn);

  mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
  <head>
    <title>Mis Articulos</title>
    <script src="mis_articulos.js"></script>
  </head>
  <body>
    <div id="error">
    </div>

    <div id="articulos">
      <?php imprimir_articulos($articulos); ?>
    </div>

    <div>
      <label for="nombre">Ingresa un articulo:</label>
      <input type="text" id="nuevo_nombre" placeholder="Nombre" />
      <input type="text" id="nuevo_precio" placeholder="Precio" />
      <input type="button" name="agregar" value="Agregar" onclick="agregar();" />
    </div>

    <div>
      <input type="button" name="limpiar" value="Limpiar" onclick="limpiar();" />
    </div>
  </body>
</html>
