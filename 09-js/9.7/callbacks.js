function elevarAlCuadrado(num) {
  return num * num;
}

function imprimir(unaFuncion) {
  return function(numero) {
    let resultado = unaFuncion(numero);
    console.log(resultado);
  };
}

let numeros = [1, 2, 3, 4, 5, 6, 7, 8];

let elevarEImprimir = imprimir(elevarAlCuadrado);

numeros.forEach(elevarEImprimir);

function multiplicarPor10(num) {
  return num * 10;
}

let multiplicarEImprimir = imprimir(multiplicarPor10);

numeros.forEach(multiplicarEImprimir);
