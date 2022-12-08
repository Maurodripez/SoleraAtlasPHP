<?php
include './FuncionesSQL.php';
$archivo = $_FILES["file"];
$idRegistro = $_GET["idRegistro"];
$nombreArchivo = $_GET["nombreArchivo"];
$micarpeta = "../Documentos/Ids/$idRegistro/";
//obtener fecha y hora para nombre unico
$fecha = date("YmdHis");
//extraer extension archivo
$nombreDelArchivo = $archivo["name"];
$extension = pathinfo($nombreDelArchivo, PATHINFO_EXTENSION);
if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);
}
$nombreFinal = $fecha . "." . $extension;
$resultado = move_uploaded_file($archivo["tmp_name"], "../Documentos/Ids/$idRegistro/$nombreFinal");
$sql = "INSERT INTO imagenes (nombreImagen, rutaImagen, fkImagen, fechaCarga,nombreOriginal) "
    . " VALUES ('$nombreFinal','../Documentos/Ids/$idRegistro/$nombreFinal', $idRegistro, now(), '$nombreArchivo')";
ActualizarSiniestro($sql);
if ($resultado) {
    echo "Subido con éxito";
} else {
    echo "Error al subir archivo";
}
