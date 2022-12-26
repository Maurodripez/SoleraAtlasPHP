<?php
include "./FuncionesSQL.php";
$accion = $_POST['accion'];
switch ($accion) {
    case "consultaUsuarios": {
            $sql = "select nombreReal from usuarios where privilegios = 'operadorSolera'";
            ConsultasSelect($sql);
            break;
        }
}
