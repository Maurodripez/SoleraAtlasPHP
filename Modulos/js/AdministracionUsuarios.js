function crearUsuario() {
  let longitudUser = document.getElementById("usuario").value;
  alert(longitudUser);
  let longitudPass = document.getElementById("password").value;
  alert(longitudPass);
  let longitudPriv = document.getElementById("privilegio").value;
  alert(longitudPriv);
  if (
    longitudUser.length > 0 &&
    longitudPass.length > 0 &&
    longitudPriv != "Privilegios..."
  ) {
    $.ajax({
      method: "POST",
      url: "../CreacionUsuario",
      data: {
        accion: "ValidarUsuario",
        usuario: document.getElementById("usuario").value,
      },
      success: function (result) {
        if (parseInt(result) === 0) {
          document.getElementById("crearUsuario").id = "crearUsuario";
          $.ajax({
            type: "POST",
            url: "../CreacionUsuario",
            data: {
              usuario: document.getElementById("usuario").value,
              password: document.getElementById("password").value,
              privilegio: document.getElementById("privilegio").value,
              accion: document.getElementById("crearUsuario").id,
            },
            success: function (result) {
              alert(result);
              $(".tablaActual").remove();
              document.getElementById("usuario").value = "";
              document.getElementById("password").value = "";
              $("#privilegio").val($("#privilegio option:first").val());
              document.getElementById("idOculto").name = "sinId";
              cargarTabla();
            },
          });
        } else {
          alert("Erorr, el usuario ya existe");
        }
      },
    });
  } else {
    alert("Por favor, llena todos los valores");
  }
}
function EliminarUsuario(getName) {
  alert(getName);
  let opcion = confirm("Confirma para eliminar siniestro");
  alert("entra");
  if (opcion == true) {
    $.ajax({
      method: "POST",
      url: "../CreacionUsuario",
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
  } else {
    mensaje = "Movimiento cancelado";
  }
}
function cargarTabla() {
  $.ajax({
    method: "POST",
    url: "../CreacionUsuario",
    data: {
      accion: "TablaUsuarios",
    },
    success: function (result) {
      let tablaUsuarios = document.getElementById("TablaUsuarios");
      let sinDiagonal = result.split("//");
      for (let i = 0; i < sinDiagonal.length - 1; i++) {
        let sinComas = sinDiagonal[i].split(",");
        // Creando los 'td' que almacenará cada parte de la información del usuario actual
        let botonEditar = `<td class='tablaActual col'><button onclick='ActualizarUsuario(this.id)' type='button' id=${sinComas[0]}
        class='btn btn-primary' value='Editar'><svg xmlns='http://www.w3.org/2000/svg'
        width='16' height='16' fill='currentColor' class='bi bi-pencil-square' viewBox='0 0 16 16'>
        <path d='M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 
        1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z'/>
        <path fill-rule='evenodd' d='M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 
        0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z'/>
        </svg></button></td>`;
        let botonEliminar = `<td class='tablaActual col'><button onclick='EliminarUsuario(this.name)' type='button' name=${sinComas[0]}
        class='btn btn-danger' value='Editar'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" 
        class="bi bi-trash3" viewBox="0 0 16 16">
        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 
        0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 
        0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 
        0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 
        .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/></svg></button></td>`;
        let usuario = `<td class='tablaActual'>${sinComas[1]}</td>`;
        let password = `<td class='tablaActual'>${sinComas[2]}</td>`;
        let privilegio = `<td class='tablaActual'>${sinComas[3]}</td>`;

        tablaUsuarios.innerHTML += `<tr>${
          botonEditar + botonEliminar + usuario + password + privilegio
        }</tr>`;
      }
    },
  });
}
function ActualizarUsuario(getId) {
  $.ajax({
    method: "post",
    url: "../CreacionUsuario",
    data: {
      accion: "CargarDatos",
      id: getId,
    },
    success: function (result) {
      // console.log(result);
      let sinComas = result.split(",");
      document.getElementById("idOculto").name = sinComas[0];
      document.getElementById("usuario").value = sinComas[1];
      document.getElementById("password").value = sinComas[2];
      document.getElementById("privilegio").value = sinComas[3];
    },
  });
}
function EditarUsuario() {
  if (document.getElementById("idOculto").name != "sinId") {
    $.ajax({
      method: "post",
      url: "../CreacionUsuario",
      data: {
        accion: "EditarUsuario",
        id: document.getElementById("idOculto").name,
        usuario: document.getElementById("usuario").value,
        password: document.getElementById("password").value,
        privilegio: document.getElementById("privilegio").value,
      },
      success: function (result) {
        alert(result);
        $(".tablaActual").remove();
        document.getElementById("usuario").value = "";
        document.getElementById("password").value = "";
        $("#privilegio").val($("#privilegio option:first").val());
        document.getElementById("idOculto").name = "sinId";
        cargarTabla();
      },
    });
  } else {
    alert("No hay usuario que editar");
  }
}
window.addEventListener("load", function () {
  cargarTabla();
});