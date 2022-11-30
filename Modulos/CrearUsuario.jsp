<!DOCTYPE html>
<html lang="en">

<head>
    <%@ page contentType="text/html; charset=UTF-8" %>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crear Usuario</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <script src="../js/jquery-3.6.1.js"></script>
</head>

<body class="p-4">
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../Iconos/person-plus.svg" alt="Logo" width="30" height="24"
                    class="d-inline-block align-text-top" />
                Crear usuario
            </a>
        </div>
    </nav>
    <div class="row justify-content-center">
        <div class="card col-6">
            <div class="card-header">Nuevo usuario</div>
            <div class="card-body">
                <input type="hidden" name="sinId" id="idOculto" />
                <input type="hidden" name="" id="crearUsuario" />
                <div class="mb-3 row justify-content-center">
                    <label for="nombre" class="col-sm-2 col-form-label">Nombre real</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" required id="nombre" />
                    </div>
                </div>
                <div class="mb-3 row justify-content-center">
                    <label for="usuario" class="col-sm-2 col-form-label">Usuario</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" required id="usuario" />
                    </div>
                </div>
                <div class="mb-3 row justify-content-center">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" required id="password" />
                    </div>
                </div>
                <div class="mb-3 row justify-content-center">
                    <label for="privilegios" class="col-sm-2 col-form-label">Privilegios</label>
                    <div class="col-sm-6">
                        <select id="privilegio" required class="form-select">
                            <option selected>Privilegios...</option>
                            <option value="root">Root</option>
                            <option value="supervisor">Supervisor</option>
                            <option value="teamlider">Teamlider</option>
                            <option value="integrador">Integrador</option>
                            <option value="operador">Operador</option>
                            <option value="consulta">Consulta</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="d-grid col-sm-6 mx-auto">
                        <button onclick="crearUsuario()" class="btn btn-primary">
                            Crear usuario
                        </button>
                    </div>
                    <div class="d-grid col-sm-6 mx-auto">
                        <button onclick="EditarUsuario()" class="btn btn-primary">
                            Editar usuario
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card col-5">
            <div class="card-header">Editar Usuario</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="TablaPrincipal" class="table table-hover col float-end">
                        <thead>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Contraseña</th>
                            <th>Privilegios</th>
                        </thead>
                        <tbody id="TablaUsuarios"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="./js/nuevoUsuario.js"></script>
</body>

</html>