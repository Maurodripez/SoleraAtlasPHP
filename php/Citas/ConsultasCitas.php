<?php
include "../FuncionesSQL.php";
$accion = $_POST['accion'];
switch ($accion) {
    case "MostrarInfoCita":
        $id = $_POST['id'];
        $sql = "select fkCitas from citas where id=$id";
        ConsultasSelectCualquiera($sql, "../Conexion.php", "Cita");
}
