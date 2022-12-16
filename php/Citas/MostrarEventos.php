<?php
    require_once "../FuncionesSQL.php";
    $json = array();
    $sql = "SELECT * FROM citas ORDER BY id";
    SelectSinNombreJson($sql,"../Conexion.php");