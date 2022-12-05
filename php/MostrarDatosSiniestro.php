<?php
include "./FuncionesSQL.php ";
$id = $_POST["idGuardado"];
$sql = "select * from infosiniestro, infocliente, infoauto "
    . " where idRegistro=$id and infocliente.fkIdRegistro =$id and infoauto.fkIdRegistro=$id";
ConsultasSelect($sql);
