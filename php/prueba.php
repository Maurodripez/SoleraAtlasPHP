<?php
// Conectar a la base de datos
include "./Conexion.php";
// Crear una variable para almacenar los datos
// SQL para obtener los datos
$sql = "select * from pruebadatatables";
$stmt = $DBcon->prepare($sql);
$stmt->execute();

$userData = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

	$userData[] = $row;
}

echo json_encode($userData);
