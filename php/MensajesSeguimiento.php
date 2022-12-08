<?php
include "./FuncionesSQL.php";
$accion = $_POST['accion'];
$idRegistro = $_POST['idRegistro'];
switch ($accion) {
    case "tablaSeguimiento": {
            $sql = "select usuario,fechaseguimiento,estatusSeguimiento,comentarios,msgInterno from seguimientoprincipal"
                . " where fkIdRegistroSegPrincipal=$idRegistro order by fechaseguimiento desc";
            ConsultasSelect($sql);
            break;
        }
    case "DocsAprobados": {
            $sql = "select * from docsaprobadosatlas where fkDocsAtlas=$idRegistro";
            ConsultasSelect($sql);
            break;
        }
}
