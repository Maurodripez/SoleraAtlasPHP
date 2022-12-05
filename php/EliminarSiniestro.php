<?php
include "./FuncionesSQL.php";
$id = $_POST["idEliminar"];
try {
    $sql = "DELETE FROM datosvalidados WHERE fkIdRegistroValidados =$id";
    EliminarSiniestro($sql);
    $sql = "delete from docsaprobadosatlas where fkDocsAtlas =$id";
    EliminarSiniestro($sql);

    $sql = "delete from estadoproceso where fkIdRegistroEstadoProceso =$id";
    EliminarSiniestro($sql);

    $sql = "delete from fechasseguimiento where fkidRegistro =$id";
    EliminarSiniestro($sql);

    $sql = "delete from imagenes where fkImagen=$id";
    EliminarSiniestro($sql);

    $sql = "delete from infoauto where fkIdRegistro=$id";
    EliminarSiniestro($sql);

    $sql = "delete from infocarga where fkIdRegistro=$id";
    EliminarSiniestro($sql);

    $sql = "delete from infocliente where fkIdRegistro=$id";
    EliminarSiniestro($sql);

    $sql = "delete from insertarregistros where fkIdRegistroInsertar=$id";
    EliminarSiniestro($sql);

    $sql = "delete from mensajesseguimientos where fkmensgSeguimientos=$id";
    EliminarSiniestro($sql);

    $sql = "delete from seguimiento where fkIdRegistroSeguimiento=$id";
    EliminarSiniestro($sql);
    $sql = "delete from seguimientoprincipal where fkIdRegistroSegPrincipal=$id";
    EliminarSiniestro($sql);
    $sql = "delete from infosiniestro where idRegistro=$id";
    EliminarSiniestro($sql);
    echo "Eliminado con exito";
} catch (PDOException $e) {
    echo "Error al eliminar";
}
