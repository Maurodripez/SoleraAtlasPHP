<?php
require_once "../../Modulos/db.php";

$id = $_POST['id'];
$sql = "DELETE from tbl_events WHERE id=" . $id;
$stmt = $DBcon->prepare($sql);
$stmt->execute();
