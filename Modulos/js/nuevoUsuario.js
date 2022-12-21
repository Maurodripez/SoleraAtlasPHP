function crearUsuario() {
  let longitudUser = document.getElementById("usuario").value;
  let longitudNom = document.getElementById("nombre").value;
  let longitudPass = document.getElementById("password").value;
  let longitudPriv = document.getElementById("privilegio").value;
  if (
    longitudNom.length == 0 ||
    longitudUser.length == 0 ||
    longitudPass.length == 0 ||
    longitudPriv == "Privilegios..."
  ) {
    alert("Por favor, llena todos los valores");
    return;
  }
  $.ajax({
    method: "POST",
    url: "../../php/CreacionUsuarios.php",
    data: {
      accion: "CrearUsuario",
      usuario: longitudUser,
      nombre: longitudNom,
      password: longitudPass,
      privilegio: longitudPriv,
    },
  }).done(function (result) {
    alert(result);
  });
}
function EliminarUsuario(getName) {
  let opcion = confirm("Confirma para eliminar siniestro");
  if (opcion == false) {
    mensaje = "Movimiento cancelado";
  }
  $.ajax({
    method: "POST",
    url: "../../php/CreacionUsuarios.php",
    data: {
      id: getName,
      accion: "EliminarUsuario",
    },
    success: function (result) {
      alert(result);
      $(".tablaActual").remove();
      cargarTabla();
    },
  });
}
function cargarTabla() {
  $.ajax({
    method: "POST",
    url: "../../php/CreacionUsuarios.php",
    dataType: "JSON",
    data: {
      accion: "TablaUsuarios",
    },
    success: function (result) {
      console.log(result);
      let tablaUsuarios = document.getElementById("TablaUsuarios");
      for (let i in result.Usuarios) {
        // Creando los 'td' que almacenará cada parte de la información del usuario actual
        let botonEditar = `<td class='tablaActual col'><button onclick='ActualizarUsuario(this.id)' type='button' id=${result.Usuarios[i].idUsuarios}
          class='btn btn-primary' value='Editar'><svg xmlns='http://www.w3.org/2000/svg'
          width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
          <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 
          1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
          <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 
          0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
          </svg></button></td>`;
        let botonEliminar = `<td class='tablaActual col'><button onclick='EliminarUsuario(this.name)' type='button' name=${result.Usuarios[i].idUsuarios}
          class='btn btn-danger' value='Editar'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" 
          class="bi bi-trash3" viewBox="0 0 16 16">
          <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 
          0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 
          0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 
          0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 
          .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg></button></td>`;
        let usuario = `<td class='tablaActual'>${result.Usuarios[i].usuario}</td>`;
        let nombre = `<td class='tablaActual'>${result.Usuarios[i].nombreReal}</td>`;
        let password = `<td class='tablaActual'>${result.Usuarios[i].contrasena}</td>`;
        let privilegio = `<td class='tablaActual'>${result.Usuarios[i].privilegios}</td>`;
        tablaUsuarios.innerHTML += `<tr>${
          botonEditar + botonEliminar + usuario + nombre + password + privilegio
        }</tr>`;
      }
    },
  });
}
function ActualizarUsuario(getId) {
  $.ajax({
    method: "post",
    url: "../../php/CreacionUsuarios.php",
    dataType: "json",
    data: {
      accion: "CargarDatos",
      id: getId,
    },
    success: function (result) {
      console.log(result);
      document.getElementById("idOculto").name = result.Usuario[0].idUsuarios;
      document.getElementById("nombre").value = result.Usuario[0].nombreReal;
      document.getElementById("usuario").value = result.Usuario[0].usuario;
      document.getElementById("password").value = result.Usuario[0].contrasena;
      document.getElementById("privilegio").value =
        result.Usuario[0].privilegios;
      alert("Ya puedes actualizar al usuario");
    },
  });
}
function EditarUsuario() {
  if (document.getElementById("idOculto").name === "sinId") {
    alert("No hay usuario que editar");
    return;
  }
  $.ajax({
    method: "post",
    url: "../../php/CreacionUsuarios.php",
    data: {
      accion: "EditarUsuario",
      id: document.getElementById("idOculto").name,
      usuario: document.getElementById("usuario").value,
      password: document.getElementById("password").value,
      privilegio: document.getElementById("privilegio").value,
      nombre: document.getElementById("nombre").value,
    },
    success: function (result) {
      console.log(result);
      if (result == 1) {
        alert("Actualizado con exito");
        $(".tablaActual").remove();
        document.getElementById("usuario").value = "";
        document.getElementById("password").value = "";
        $("#privilegio").val($("#privilegio option:first").val());
        document.getElementById("idOculto").name = "sinId";
        cargarTabla();
      }
    },
  });
}
window.addEventListener("load", function () {
  cargarTabla();
});
