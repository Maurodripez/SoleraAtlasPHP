<?php
session_start();
include "./FuncionesSQL.php";
$usuario = $_SESSION['usuario'];
$numSiniestro = $_POST['numSiniestro'];
$fechaSiniestro = $_POST['fechaSiniestro'];
$poliza = $_POST['poliza'];
$cobertura = $_POST['cobertura'];
$afectado = $_POST['afectado'];
$asegurado = $_POST['asegurado'];
$regimenFiscal = $_POST['regimen'];
$agente = $_POST['agente'];
$telefono = $_POST['telefono'];
$telefonoAlt = $_POST['telefonoAlt'];
$correo = $_POST['correo'];
$marca = $_POST['marca'];
$tipo = $_POST['tipo'];
$modelo = $_POST['modelo'];
$numSerie = $_POST['numSerie'];
$ciudad = $_POST['ciudad'];
$fechaDecreto = $_POST['fechaDecretacion'];
$ubicacionTaller = $_POST['ubicacion'];
$valComercial = $_POST['valComercial'];
$valIndemnizacion = $_POST['valIndemnizacion'];
$sql = "select nombreReal from usuarios where usuario = '$usuario'";
$nombreReal = ObtenerValorSql($sql);
$sql = "insert into infosiniestro"
    . "(usuarioCarga,numSiniestro,fechaSiniestro,poliza,cobertura,afectado,regimenFiscal,ciudad,ubicacionTaller,fechaDecreto,fechaCarga,agente)"
    . " values('$nombreReal','$numSiniestro','$fechaSiniestro','$poliza','$cobertura','$afectado','$regimenFiscal','$ciudad','$ubicacionTaller','$fechaDecreto',now(),'$agente')";
ActualizarSiniestro($sql);
$sql = "SELECT MAX(idRegistro) as ultimoId FROM infosiniestro";
$idRegistro = ObtenerValorSql($sql);
$sql = "insert into infocliente(asegurado,telefonoPrincipal,telefonosecundario,correo,fkIdRegistro)"
    . " values('$asegurado','$telefono','$telefonoAlt','$correo','$idRegistro')";
ActualizarSiniestro($sql);
$sql = "insert into infoauto(marca,tipo,modelo,numSerie,valorIndemnizacion,valorComercial,fkIdRegistro)"
    . " values('$marca','$tipo','$modelo','$numSerie','$valIndemnizacion','$valComercial',$idRegistro)";
ActualizarSiniestro($sql);
$sql = "insert into docsaprobadosatlas(fkDocsAtlas)values($idRegistro)";
ActualizarSiniestro($sql);
$sql = "insert into estadoproceso(fkIdRegistroEstadoProceso,estacionProceso,estatusOperativo)values($idRegistro,'Nuevo','Nuevo')";
ActualizarSiniestro($sql);
$sql = "insert into fechasseguimiento(fkidRegistro,fechaSeguimiento)values($idRegistro,now())";
ActualizarSiniestro($sql);
$sql = "insert into insertarregistros(fkIdRegistroInsertar)values($idRegistro)";
ActualizarSiniestro($sql);
$sql = "INSERT INTO datosvalidados (fkIdRegistroValidados) VALUES ($idRegistro)";
ActualizarSiniestro($sql);
echo "Guardado con exito";
