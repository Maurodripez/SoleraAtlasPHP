<?php
require_once "../../Modulos/db.php";

$id = $_POST['id'];
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];

$sql = "UPDATE tbl_events SET title='" . $title . "',start='" . $start . "',end='" . $end . "' WHERE id=" . $id;
$stmt = $DBcon->prepare($sql);
$stmt->execute();
