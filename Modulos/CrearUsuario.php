<?php
session_start();    
if (!isset($_SESSION['usuario'])) {
header('Location: ../index.html');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Crear Usuario</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="../js/jquery-3.6.1.js"></script>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
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
        <div class="card col-4">
            <div class="card-header">Nuevo usuario</div>
            <div class="card-body">
                <input type="hidden" name="sinId" id="idOculto" />
                <div class="mb-3 row justify-content-center">
                    <label for="nombre" class="col col-form-label">Nombre real</label>
                    <div class="col">
                        <input type="text" class="form-control" required id="nombre" />
                    </div>
                </div>
                <div class="mb-3 row justify-content-center">
                    <label for="usuario" class="col col-form-label">Usuario</label>
                    <div class="col">
                        <input type="text" class="form-control" required id="usuario" />
                    </div>
                </div>
                <div class="mb-3 row justify-content-center">
                    <label for="password" class="col col-form-label">Password</label>
                    <div class="col">
                        <input type="password" class="form-control" required id="password" />
                    </div>
                </div>
                <div class="mb-3 row justify-content-center">
                    <label for="privilegios" class="col col-form-label">Privilegios</label>
                    <div class="col">
                        <select id="privilegio" required class="form-select">
                            <option selected>Privilegios...</option>
                            <option value="root">Root</option>
                            <option value="supervisor">Supervisor</option>
                            <option value="teamlider">Teamlider</option>
                            <option value="integrador">Integrador</option>
                            <option value="operadorSolera">Operador Solera</option>
                            <option value="operadorAtlas">Operador Atlas</option>
                            <option value="consulta">Consulta</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="d-grid col-sm-4 mx-auto">
                        <button onclick="crearUsuario()" class="btn btn-primary">
                            Crear usuario
                        </button>
                    </div>
                    <div class="d-grid col-sm-4 mx-auto">
                        <button onclick="EditarUsuario()" class="btn btn-primary">
                            Editar usuario
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card col-8">
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
                    </table>
                </div>
                <nav>
                    <ul class="pagination">
                        <li class="page-item"><a id="btnAnterior" class="page-link" href="#">Anterior</a></li>
                        <li class="page-item"><a id="btnSiguiente" class="page-link" href="#">Siguiente</a></li>
                    </ul>
                </nav>
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