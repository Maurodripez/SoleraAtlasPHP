<?php
$archivo = $_FILES["archivo"];
$tipoArchivo = $_POST["tipoArchivo"];
$resultado = move_uploaded_file($archivo["tmp_name"], $archivo["name"]);
if ($resultado) {
    echo $tipoArchivo;
    echo "Subido con éxito";
} else {
    echo "Error al subir archivo";
}