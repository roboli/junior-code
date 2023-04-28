function obtenerNota(cb) {
  setTimeout(function () {
    const nota = Math.round(Math.random() * 10);
    cb(null, nota);
  }, 5000);
}

function obtenerMensaje(nota, cb) {
  setTimeout(function () {
    if (nota < 0 || nota > 10) {
      const error = new Error('Nota fuera de rango!');
      return cb(error);
    }

    let mensaje;

    if (nota >= 8) {
      mensaje = 'Excelente:';
    } else if (nota > 5) {
      mensaje = 'Bueno:';
    } else {
      mensaje = 'Decepcionante:';
    }

    cb(null, mensaje);
  }, 3000);
}

function obtenerNumeroLetras(nota, cb) {
  setTimeout(function () {
    if (nota < 0 || nota > 10) {
      const error = new Error('Nota fuera de rango!');
      return cb(error);
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

    cb(null, numero);
  }, 2000);
}

function imprimirNota() {
  obtenerNota(function (errorNota, nota) {
    if (errorNota) {
      console.error('Ha ocurrido un problema al obtener la nota:', errorNota);
    } else {
      obtenerMensaje(nota, function (errorMensaje, mensaje) {
        if (errorMensaje) {
          console.error('Ha ocurrido un problema al obtener el mensaje:', errorMensaje);
        } else {
          obtenerNumeroLetras(nota, function (errorNumero, numero) {
            if(errorNumero) {
              console.error('Ha ocurrido un problema al obtener el numero:', errorNumero);
            } else {
              console.log(mensaje, numero);
            }
          });
        }
      });
    }
  });
}
