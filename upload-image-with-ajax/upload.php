<?php
$archivo = $_FILES["file"];
$variable = $_GET["foo"];
$resultado = move_uploaded_file($archivo["tmp_name"], "images/" . $archivo["name"]);
if ($resultado) {
    echo $variable;
    echo "Subido con éxito";
} else {
    echo "Error al subir archivo";
}
