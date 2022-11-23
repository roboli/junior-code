<?php

class Casa {
  var $direccion;
  var $dormitorios;
  var $parqueos;

  function setDireccion($direccion) {
    $this->direccion = $direccion;
  }

  function setDormitorios($dormitorios) {
    $this->dormitorios = $dormitorios;
  }

  function setParqueos($parqueos) {
    $this->parqueos = $parqueos;
  }

  function getDireccion() {
    return $this->direccion;
  }

  function getDormitorios() {
    return $this->dormitorios;
  }

  function getParqueos() {
    return $this->parqueos;
  }

  function imprimirCasa() {
    echo('Direccion: ' . $this->direccion . PHP_EOL);
    echo('No. Dormitorios: ' . $this->dormitorios . PHP_EOL);
    echo('No. Parqueos: ' . $this->parqueos . PHP_EOL);
  }
}

$mi_casa = new Casa();
$mi_casa->setDireccion('1era calle zona 1');
$mi_casa->setDormitorios(3);
$mi_casa->setParqueos(1);

$mi_casa->imprimirCasa();
?>
