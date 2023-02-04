<?php
$imagen = $_POST['imagen'];
$fp = fopen("miarchivo.txt", "w");
fwrite($fp, $imagen);
fclose($fp);
//echo $imagen;
