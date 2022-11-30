<!DOCTYPE html>
<html lang="en">

<head>
  <%@ page contentType="text/html; charset=UTF-8" %>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Asignacion</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="../js/jquery-3.6.1.js"></script>
</head>

<body class="p-2">
  <b style="display: none" id="UsuarioActivo"><%= (String) session.getAttribute("sesionUsuario") %></b>
  <div class="card" style="width: 40rem;">
    <div class="card-body">
      <h5 class="card-title">Asignacion de Siniestros</h5>
      <p class="card-text">Por favor, carga el Archivo Excel</p>
      <input type="file" class="form-control" id="LeerExcel">
    </div>
  </div>
  <div class="card" style="width: 40rem;">
    <div class="card-body">
      <h5 class="card-title">Asignacion de Siniestros</h5>
      <p class="card-text">Por favor, carga el Archivo JSON</p>
      <input type="file" class="form-control" onread id="file-input" />
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
  <script src="https://unpkg.com/read-excel-file@5.x/bundle/read-excel-file.min.js"></script>
</body>
<script src="./js/Asignacion.js"></script>

</html>