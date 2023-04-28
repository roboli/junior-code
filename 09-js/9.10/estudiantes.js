class Persona {
  constructor(nombre, apellido, edad) {
    this.nombre = nombre;
    this.apellido = apellido;
    this.edad = edad;
  }

  obtenerNombreCompleto() {
    return this.nombre + ' ' + this.apellido;
  }

  obtenerEdad() {
    return this.edad;
  }
}

let karla = new Persona('Karla', 'Oliver', 20);

console.log('Nombre completo:', karla.obtenerNombreCompleto());
// Imprime
// Nombre completo: Karla Oliver

console.log('Edad:', karla.obtenerEdad());
// Imprime
// Edad: 20

class Estudiante extends Persona {
  constructor(nombre, apellido, edad, grado) {
    super(nombre, apellido, edad);
    this.grado = grado;
  }

  obtenerGrado() {
    return this.grado;
  }
}

let lucia = new Estudiante('Lucia', 'Gil', 12, '6to primaria');

console.log('Nombre completo:', lucia.obtenerNombreCompleto());
// Imprime
// Nombre completo: Lucia Gil

console.log('Edad:', lucia.obtenerEdad());
// Imprime
// Edad: 12

console.log('Grado:', lucia.obtenerGrado());
// Imprime
// Grado: 6to primaria
