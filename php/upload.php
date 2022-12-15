<?php
include './FuncionesSQL.php';
$conteo = count($_FILES["archivos"]["name"]);
for ($i = 0; $i < $conteo; $i++) {
    $idRegistro = $_GET["idRegistro"];
    $nombreArchivoFinal = $_GET["nombreArchivo"];
    $iFrame = $_GET["iFrame"];
    $micarpeta = "../Documentos/Ids/$idRegistro/";
    if (!file_exists($micarpeta)) {
        mkdir($micarpeta, 0777, true);
    }
    $ubicacionTemporal = $_FILES["archivos"]["tmp_name"][$i];
    $nombreArchivo = $_FILES["archivos"]["name"][$i];
    $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
    // Renombrar archivo
    $nuevoNombre = sprintf("%s_%d.%s", uniqid(), $i, $extension);
    // Mover del temporal al directorio actual
    $resultado = move_uploaded_file($ubicacionTemporal, "../Documentos/Ids/$idRegistro/$nuevoNombre");
    if ($resultado) {
        $sql = "INSERT INTO imagenes (nombreImagen, rutaImagen, fkImagen, fechaCarga,nombreOriginal,iframe) "
            . " VALUES ('$nuevoNombre','../Documentos/Ids/$idRegistro/$nuevoNombre', $idRegistro, now(), '$nombreArchivoFinal','$iFrame')";
        ActualizarSiniestro($sql);
    }
}
echo json_encode(true);
/*
$archivo = $_FILES["file"];
$idRegistro = $_GET["idRegistro"];
$nombreArchivo = $_GET["nombreArchivo"];
$iFrame = $_GET["iFrame"];
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
if ($resultado) {
    $sql = "INSERT INTO imagenes (nombreImagen, rutaImagen, fkImagen, fechaCarga,nombreOriginal,iframe) "
        . " VALUES ('$nombreFinal','../Documentos/Ids/$idRegistro/$nombreFinal', $idRegistro, now(), '$nombreArchivo','$iFrame')";
    ActualizarSiniestro($sql);
    echo "Subido con éxito";
} else {
    echo "Error al subir archivo";
}

*/
