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

class Mansion extends Casa {
  private $piscinas;
  private $jardines;

  function setPiscinas($piscinas) {
    $this->piscinas = $piscinas;
  }

  function setJardines($jardines) {
    $this->jardines = $jardines;
  }

  function getPiscinas() {
    return $this->piscinas;
  }

  function getJardines() {
    return $this->jardines;
  }

  function imprimir() {
    parent::imprimir();

    echo('No. Piscinas: ' . $this->piscinas . PHP_EOL);
    echo('No. Jardines: ' . $this->jardines . PHP_EOL);
  }
}

$mi_casa = new Casa();
$mi_casa->setDireccion('1era calle zona 1');
$mi_casa->setDormitorios(3);
$mi_casa->setParqueos(1);

$mi_casa->imprimirCasa();

$mi_mansion = new Mansion();
$mi_mansion->setDireccion('2da calle zona 10');
$mi_mansion->setDormitorios(3);
$mi_mansion->setParqueos(1);
$mi_mansion->setPiscinas(1);
$mi_mansion->setJardines(2);

$mi_mansion->imprimir();

?>
