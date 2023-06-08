function agregarElementoArticulo(id, nombre, precio) {
  const divArticulo = document.createElement('div');
  divArticulo.setAttribute('id', `articulo_${id}`);

  const divCambiar = document.createElement('div');
  divCambiar.setAttribute('style', 'display:inline;');

  const inputNombre = document.createElement('input');
  inputNombre.setAttribute('type', 'text');
  inputNombre.setAttribute('id', `nombre_${id}`);
  inputNombre.setAttribute('placeholder', 'Nombre');
  inputNombre.setAttribute('value', nombre);

  const inputPrecio = document.createElement('input');
  inputPrecio.setAttribute('type', 'text');
  inputPrecio.setAttribute('id', `precio_${id}`);
  inputPrecio.setAttribute('placeholder', 'Precio');
  inputPrecio.setAttribute('value', precio);

  const inputCambiar = document.createElement('input');
  inputCambiar.setAttribute('type', 'button');
  inputCambiar.setAttribute('name', 'cambiar');
  inputCambiar.setAttribute('value', 'Cambiar');
  inputCambiar.setAttribute('onclick', `cambiar('${id}');`);

  divCambiar.appendChild(inputNombre);
  divCambiar.appendChild(inputPrecio);
  divCambiar.appendChild(inputCambiar);

  const divBorrar = document.createElement('div');
  divBorrar.setAttribute('style', 'display:inline;');

  const inputBorrar = document.createElement('input');
  inputBorrar.setAttribute('type', 'button');
  inputBorrar.setAttribute('name', 'borrar');
  inputBorrar.setAttribute('value', 'Borrar');
  inputBorrar.setAttribute('onclick', `borrar('${id}');`);

  divBorrar.appendChild(inputBorrar);

  divArticulo.appendChild(divCambiar);
  divArticulo.appendChild(divBorrar);

  const divArticulos = document.getElementById('articulos');
  divArticulos.appendChild(divArticulo);
}

async function agregar() {
  const nombre = document.getElementById('nuevo_nombre');
  const precio = document.getElementById('nuevo_precio');

  const formData = new FormData();
  formData.append('nombre', nombre.value);
  formData.append('precio', precio.value);

  const resultado = await fetch('insertar.php', {
    method: 'POST',
    body: formData
  });

  const obj = await resultado.json();
  agregarElementoArticulo(obj.id, nombre.value, precio.value);

  nombre.value = '';
  precio.value = '';
}

async function cambiar(id) {
  const nombre = document.getElementById(`nombre_${id}`);
  const precio = document.getElementById(`precio_${id}`);

  const formData = new FormData();
  formData.append('id', id);
  formData.append('nombre', nombre.value);
  formData.append('precio', precio.value);

  const resultado = await fetch('modificar.php', {
    method: 'POST',
    body: formData
  });  
}

async function borrar(id) {
  const formData = new FormData();
  formData.append('id', id);

  const resultado = await fetch('eliminar.php', {
    method: 'POST',
    body: formData
  });

  document.getElementById(`articulo_${id}`).remove();
}

async function limpiar() {
  const resultado = await fetch('limpiar.php', {
    method: 'POST'
  });

  const divArticulos = document.getElementById('articulos');
  divArticulos.innerHTML = '';
}
