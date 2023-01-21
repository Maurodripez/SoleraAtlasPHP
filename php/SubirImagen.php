<?php
include './FuncionesSQL.php';
$archivo = $_FILES["file"];
$idRegistro = $_GET["idRegistro"];
$nombreArchivo = $_GET["nombreArchivo"];
$iFrame = $_GET["iFrame"];
$micarpeta = "../Documentos/Ids/$idRegistro/";
$micarpetaValidada = "../Documentos/Ids/$idRegistro/Validados";
//obtener fecha y hora para nombre unico
$fecha = date("YmdHis");
//extraer extension archivo
$nombreDelArchivo = $archivo["name"];
$extension = pathinfo($nombreDelArchivo, PATHINFO_EXTENSION);
if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);
    mkdir($micarpetaValidada, 0777, true);
}
$nombreFinal = $fecha . "." . $extension;
$resultado = move_uploaded_file($archivo["tmp_name"], "../Documentos/Ids/$idRegistro/$nombreFinal");
if ($resultado) {
    $sql = "INSERT INTO imagenes (nombreImagen, rutaImagen, fkImagen, fechaCarga,nombreOriginal,iframe) "
        . " VALUES ('$nombreFinal','../Documentos/Ids/$idRegistro/$nombreFinal', $idRegistro, now(), '$nombreArchivo','$iFrame')";
    ActualizarSiniestro($sql);
    echo "Subido con éxito";
} else {
    echo "Error al subir archivo";
}
