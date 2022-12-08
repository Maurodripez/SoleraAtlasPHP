<?php
include "./FuncionesSQL.php";
$idRegistro = $_POST['idRegistro'];
$accion = $_POST['accion'];
switch ($accion) {
    case "TablaImagenes": {
            $sql = "SELECT * FROM imagenes where fkImagen=$idRegistro";
            ConsultasSelect($sql);
            break;
        }
    case "EliminarImagenes": {
            $nombreArchivo = $_POST['nombreArchivo'];
            if (unlink('../Documentos/Ids/' . $idRegistro . '/' . $nombreArchivo)) {
                $sql = "DELETE FROM imagenes WHERE nombreImagen ='$nombreArchivo'";
                ConsultasSelect($sql);
                echo "Eliminado con exito";
            } else {
                echo "No se pudo eliminar el archivo";
            }
            break;
        }
}
