function obtenerNota() {
  return new Promise(function(resolve) {
    setTimeout(function () {
      const nota = Math.round(Math.random() * 10);
      resolve(nota);
    }, 5000);
  });
}

function obtenerMensaje(nota) {
  return new Promise(function(resolve, reject) {
    setTimeout(function () {
      if (nota < 0 || nota > 10) {
        const error = new Error('Nota fuera de rango!');
        return reject(error);
      }

      let mensaje;

      if (nota >= 8) {
        mensaje = 'Excelente:';
      } else if (nota > 5) {
        mensaje = 'Bueno:';
      } else {
        mensaje = 'Decepcionante:';
      }

      resolve(mensaje);
    }, 3000);
  });
}

function obtenerNumeroLetras(nota) {
  return new Promise(function(resolve, reject) {
    setTimeout(function () {
      if (nota < 0 || nota > 10) {
        const error = new Error('Nota fuera de rango!');
        return reject(error);
      }

      let numero;

      switch (nota) {
        case 0:
          numero = 'cero';
          break;
        case 1:
          numero = 'uno';
          break;
        case 2:
          numero = 'dos';
          break;
        case 3:
          numero = 'tres';
          break;
        case 4:
          numero = 'cuatro';
          break;
        case 5:
          numero = 'cinco';
          break;
        case 6:
          numero = 'seis';
          break;
        case 7:
          numero = 'siete';
          break;
        case 8:
          numero = 'ocho';
          break;
        case 9:
          numero = 'nueve';
          break;
        case 10:
          numero = 'diez';
          break;
      }

      resolve(numero);
    }, 2000);
  });
}

async function imprimirNota() {
  try {
    const nota    = await obtenerNota();
    const mensaje = await obtenerMensaje(nota);
    const numero  = await obtenerNumeroLetras(nota);

    console.log(mensaje, numero);
  } catch(error) {
    console.error('Ocurrio algo malo:', error);
  }
}
