<?php

function agregar_zip($dir, $zip) {
  //verificamos si $dir es un directorio
  if (is_dir($dir)) {
    //abrimos el directorio y lo asignamos a $da
    if ($da = opendir($dir)) {
      //leemos del directorio hasta que termine
      while (($archivo = readdir($da)) !== false) {
        /*Si es un directorio imprimimos la ruta
         * y llamamos recursivamente esta función
         * para que verifique dentro del nuevo directorio
         * por mas directorios o archivos
         */
        if (is_dir($dir . $archivo) && $archivo != "." && $archivo != "..") {
          echo "<strong>Creando directorio: $dir$archivo</strong><br/>";
          agregar_zip($dir . $archivo . "/", $zip);

          /*si encuentra un archivo imprimimos la ruta donde se encuentra
           * y agregamos el archivo al zip junto con su ruta 
           */
        } elseif (is_file($dir . $archivo) && $archivo != "." && $archivo != "..") {
          echo "Agregando archivo: $dir$archivo <br/>";
          $zip->addFile($dir . $archivo, $dir . $archivo);
        }
      }
      //cerramos el directorio abierto en el momento
      closedir($da);
    }
  }
}

//fin de la función
//creamos una instancia de ZipArchive
$zip = new ZipArchive();

/*directorio a comprimir
 * la barra inclinada al final es importante
 * la ruta debe ser relativa no absoluta
 */
$dir = 'fuente/';

//ruta donde guardar los archivos zip, ya debe existir
$rutaFinal = "archivos";

if(!file_exists($rutaFinal)){
  mkdir($rutaFinal);
}

$archivoZip = "mis_archivos.zip";

if ($zip->open($archivoZip, ZIPARCHIVE::CREATE) === true) {
  agregar_zip($dir, $zip);
  $zip->close();

  //Muevo el archivo a una ruta
  //donde no se mezcle los zip con los demas archivos
  rename($archivoZip, "$rutaFinal/$archivoZip");

  //Hasta aqui el archivo zip ya esta creado
  //Verifico y descargo el archivo creado
	
if (file_exists($rutaFinal. "/" . $archivoZip)) {
	//Definimos el primer header como un archivo binario generico
    header("Content-type: application/octet-stream");
	
	//Este header indica un archivo adjunto el cual tendra un nombre
	header("Content-Disposition: attachment; filename=\"".$archivoZip."\"");
	
	//leemos el archivo de la ruta para enviarlo al navegador
	readfile("$rutaFinal/$archivoZip");
  } else {
    echo "Error, archivo zip no ha sido creado!!";
  }
}
?>