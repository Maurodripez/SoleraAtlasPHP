<?php
$file = "./php/miarchivo.txt";
$fp = fopen($file, "r");
$contents = fread($fp, filesize($file));
echo $contents;