<?php
include "./FuncionesSQL.php";
$accion = $_POST["accion"];
switch ($accion) {
    case "ProgresoTotal":
        $id = $_POST["id"];
        $sql = "SELECT porcentajeTotal from docsaprobadosatlas WHERE fkDocsAtlas=$id";
        ConsultasSelectCualquiera($sql, "./Conexion.php", "Total");
        break;
}
