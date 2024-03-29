<?php
session_start();
include "./FuncionesSQL.php";
$idEditableActual = $_POST["idEditableActual"];
$accion = $_POST["accion"];
$usuario = $_SESSION['usuario'];
switch ($accion) {
    case "GuardarSeguimiento": {
            $infoSiniestro = [
                "fechaCarga" => $_POST["fechaCarga"],
                "numSiniestro" => $_POST["numSiniestro"],
                "poliza" => $_POST["poliza"],
                "afectado" => $_POST["afectado"],
                "tipoDeCaso" => $_POST["tipoDeCaso"],
                "cobertura" => $_POST["cobertura"],
                "fechaSiniestro" => $_POST["fechaSiniestro"],
                "estado" => $_POST["estado"],
                "ciudad" => $_POST["ciudad"],
                "region" => $_POST["region"],
                "ubicacionTaller" => $_POST["ubicacionTaller"],
                "financiado" => $_POST["financiado"],
                "regimenFiscal" => $_POST["regimenFiscal"],
                "estatusCliente" => $_POST["estatusCliente"],
                "comentariosCliente" => $_POST["comentariosCliente"],
                "datosAudatex" => $_POST["datosAudatex"],
                "passwordExterno" => $_POST["passwordExterno"],
            ];
            foreach ($infoSiniestro as $item => $infoSiniestro) {
                if ($infoSiniestro != "") {
                    $sql = "update infosiniestro set $item='$infoSiniestro' where idRegistro=$idEditableActual";
                    ActualizarSiniestro($sql);
                }
            }
            $infoAuto = [
                "marca" => $_POST["marca"],
                "tipo" => $_POST["tipo"],
                "modelo" => $_POST["modelo"],
                "placas" => $_POST["placas"],
                "numSerie" => $_POST["numSerie"],
                "valorIndemnizacion" => $_POST["valorIndemnizacion"],
                "valorComercial" => $_POST["valorComercial"],

            ];
            foreach ($infoAuto as $item => $infoAuto) {
                if ($infoAuto != "") {
                    $sql = "update infoauto set $item='$infoAuto' where fkIdRegistro=$idEditableActual";
                    ActualizarSiniestro($sql);
                }
            }
            $infoCliente = [
                "asegurado" => $_POST["asegurado"],
                "correo" => $_POST["correo"],
                "telefonoPrincipal" => $_POST["telefonoPrincipal"],
                "telefonosecundario" => $_POST["telefonosecundario"],
                "contacto" => $_POST["contacto"],
                "correoContacto" => $_POST["correoContacto"],
                "telContacto" => $_POST["telContacto"],

            ];
            foreach ($infoCliente as $item => $infoCliente) {
                if ($infoCliente != "") {
                    $sql = "update infocliente set $item='$infoCliente' where fkIdRegistro=$idEditableActual";
                    ActualizarSiniestro($sql);
                }
            }
            echo "Guardado con exito";
            break;
        }
    case "InsertarSeguimiento": {
            $estatusSeguimiento = $_POST["estatusSeguimiento"];
            $comentarios = $_POST["comentSeguimiento"];
            $estacion = $_POST["estacion"];
            $subEstatus = $_POST["subEstatus"];
            $respSolera = $_POST["respSolera"];
            $persContactada = $_POST["persContactada"];
            $tipoPersona = $_POST["tipoPersona"];
            $tipoContacto = $_POST["tipoContacto"];
            $fechaTermino = $_POST["fechaTermino"];
            $fechaFactServ = $_POST["fechaFactServ"];
            $tipoMensaje = $_POST["tipoMensaje"];
            $sql = "select nombreReal from usuarios where usuario = '$usuario'";
            $nombreReal = ObtenerValorSql($sql);
            $sql = "insert into seguimientoprincipal(comentarios,estacionPrincipal, estatusSeguimiento,subEstatus, respuestaSolera,"
                . " personaContactada, tipodePersona, contacto, facturaciondeservicio, termino, fechaseguimiento, usuario,fkIdRegistroSegPrincipal,msgInterno)"
                . " values('$comentarios','$estacion','$estatusSeguimiento','$subEstatus','$respSolera','$persContactada','$tipoPersona',"
                . " '$tipoContacto','$fechaFactServ','$fechaTermino',now(),'$nombreReal','$idEditableActual','$tipoMensaje')";
            ActualizarSiniestro($sql);
            if ($tipoMensaje == "Usuario") {
                $sql = "insert into mensajesseguimientos(mensajes,usuario,fechaMensaje,fkmensgSeguimientos,internoExterno)"
                    . " values('$comentarios','$nombreReal',now(),'$idEditableActual','Interno')";
                ActualizarSiniestro($sql);
                $sql = "update mensajesseguimientos set respondido='si' where fkmensgSeguimientos='$idEditableActual'";
                ActualizarSiniestro($sql);
            }
            $sql = "update fechasseguimiento set fechaSeguimiento=now() where fkidRegistro='$idEditableActual'";
            ActualizarSiniestro($sql);
            $sql = "update infosiniestro set estatusSeguimientoSin='$estatusSeguimiento' where idRegistro='$idEditableActual'";
            ActualizarSiniestro($sql);
            $sql = "update estadoproceso set estacionProceso='$estacion', estatusOperativo='$estatusSeguimiento',"
                . " subEstatusProceso='$subEstatus', usuarioSeguimiento='$nombreReal' where fkIdRegistroEstadoProceso='$idEditableActual'";
            ActualizarSiniestro($sql);
            if ($estatusSeguimiento == "CON CONTACTO SIN DOCUMENTOS") {
                $sql = "UPDATE docsaprobadosatlas SET porcentajeTotal = '10' WHERE fkDocsAtlas=$idEditableActual";
                ActualizarSiniestro($sql);
            } else if ($estatusSeguimiento == "DE 1 A 3 DOCUMENTOS") {
                $sql = "UPDATE docsaprobadosatlas SET porcentajeTotal = '25' WHERE fkDocsAtlas=$idEditableActual";
                ActualizarSiniestro($sql);
            } else if ($estatusSeguimiento == "DE 4 A 6 DOCUMENTOS") {
                $sql = "UPDATE docsaprobadosatlas SET porcentajeTotal = '50' WHERE fkDocsAtlas=$idEditableActual";
                ActualizarSiniestro($sql);
            } else if ($estatusSeguimiento == "DE 7 A 10 DOCUMENTOS") {
                $sql = "UPDATE docsaprobadosatlas SET porcentajeTotal = '100' WHERE fkDocsAtlas=$idEditableActual";
                ActualizarSiniestro($sql);
            } else if ($estatusSeguimiento == "DATOS INCORRECTOS" || $estatusSeguimiento == "SIN CONTACTO EN 30 DIAS") {
                $sql = "UPDATE docsaprobadosatlas SET porcentajeTotal = '0' WHERE fkDocsAtlas=$idEditableActual";
                ActualizarSiniestro($sql);
            }
            echo "Seguimiento guardado";
            break;
        }
    case "AsignarIntegrador": {
            $usuario = $_POST["usuario"];
            $integrador = $_POST["integrador"];
            $idRegistro = $_POST["idRegistro"];
            $sql = "select nombreReal from usuarios where usuario = '$usuario'";
            $nombreReal = ObtenerValorSql($sql);
            $sql = "insert into seguimientoprincipal(estatusSeguimiento,fechaseguimiento, fkIdRegistroSegPrincipal,usuario,msgInterno)"
                . " values('Asignado a integrador: $integrador',now(),'$idRegistro','$nombreReal','Interno')";
            ActualizarSiniestro($sql);
            break;
        }
    case "ValidarDocs": {
            $identificacion = "Identificacion oficial";
            $situacion = "Situacion fiscal";
            $docsAprobados = [
                "comprobante" => $_POST["checkboxComprobante"],
                "circulacion" => $_POST["checkboxTarjeta"],
                "identificacion" => $_POST["checkboxIdentificacion"],
                "situacion" => $_POST["checkboxSituacion"],
                "curp" => $_POST["checkboxCurp"],
                "estadocuenta" => $_POST["checkboxEstado"],
                "factura" => $_POST["checkboxFactura"],
                "facturaatlas" => $_POST["checkboxFacturaAtlas"],
                "secuencia" => $_POST["checkboxSecuencia"],
                "certificadopropiedad" => $_POST["checkboxPropiedad"],
                "copiacertificado" => $_POST["checkboxCopiaPropiedad"],
                "pedimento" => $_POST["checkboxPedimento"],
                "baja" => $_POST["checkboxBajadePermiso"],
                "rfv" => $_POST["checkboxRFV"],
                "verificacion" => $_POST["checkboxVerificacion"],
                "tenencias" => $_POST["checkboxTenencias"],
                "facturamotor" => $_POST["checkboxFacturaMotor"],
                "llaves" => $_POST["checkboxLlaves"],
                "consentimiento" => $_POST["checkboxLFPDPPP"],
                "averiguacionprevia" => $_POST["checkboxAveriguacion"],
                "acreditacion" => $_POST["checkboxAcreditacion"],
                "avisopfp" => $_POST["checkboxPFP"],
                "otros" => $_POST["checkboxOtros"],
                "oficioliberacion" => $_POST["checkboxLiberacion"],
                "oficiocancelacion" => $_POST["checkboxCancelacion"],
                "conoceatucliente" => $_POST["checkboxFormatoCliente"],
                "finiquito" => $_POST["checkboxFormatoFiniquito"],
                "refactura" => $_POST["checkboxRefactura"],
                "cedula" => $_POST["checkboxCedula"],
            ];
            $contadorDocs = 0;
            try {
                foreach ($docsAprobados as $item => $docsAprobados) {
                    if ($docsAprobados == "true") {
                        switch ($item) {
                            case "comprobante":
                                $docAMover = "Comprobante de domicilio";
                                break;
                            case "circulacion":
                                $docAMover = "Tarjeta de circulacion";
                                break;
                            case "identificacion":
                                $docAMover = "Identificacion oficial";
                                break;
                            case "situacion":
                                $docAMover = "Situacion fiscal";
                                break;
                            case "curp":
                                $docAMover = "Curp";
                                break;
                            case "estadocuenta":
                                $docAMover = "Estado de cuenta";
                                break;
                            case "factura":
                                $docAMover = "Factura";
                                break;
                            case "facturaatlas":
                                $docAMover = "Factura a favor de Seguros Atlas";
                                break;
                            case "secuencia":
                                $docAMover = "Secuencia de facturas";
                                break;
                            case "certificadopropiedad":
                                $docAMover = "Certificado Propiedad";
                                break;
                            case "copiacertificado":
                                $docAMover = "Copia certificado propiedad";
                                break;
                            case "pedimento":
                                $docAMover = "Pedimento de Importacion";
                                break;
                            case "baja":
                                $docAMover = "Baja de permiso de internacion";
                                break;
                            case "rfv":
                                $docAMover = "R.F.V.";
                                break;
                            case "verificacion":
                                $docAMover = "Verificacion";
                                break;
                            case "tenencias":
                                $docAMover = "Tenencias";
                                break;
                            case "facturamotor":
                                $docAMover = "Factura del motor";
                                break;
                            case "llaves":
                                $docAMover = "Llaves";
                                break;
                            case "consentimiento":
                                $docAMover = "Consentimiento LFPDPPP";
                                break;
                            case "averiguacionprevia":
                                $docAMover = "Averiguación previa";
                                break;
                            case "acreditacion":
                                $docAMover = "Acreditacion de propiedad";
                                break;
                            case "avisopfp":
                                $docAMover = "Aviso a PFP";
                                break;
                            case "otros":
                                $docAMover = "Otros";
                                break;
                            case "oficioliberacion":
                                $docAMover = "Oficio de liberacion";
                                break;
                            case "oficiocancelacion":
                                $docAMover = "Oficio de cancelacion del robo";
                                break;
                            case "conoceatucliente":
                                $docAMover = "Formato conoce a tu cliente";
                                break;
                            case "finiquito":
                                $docAMover = "Formato finiquito";
                                break;
                            case "refactura":
                                $docAMover = "Formato refactura";
                                break;
                            case "cedula":
                                $docAMover = "Cedula corta";
                                break;

                        }
                        $resultado = array();
                        $sql = "SELECT nombreImagen FROM imagenes WHERE nombreOriginal='$docAMover' AND fkImagen=$idEditableActual AND validada=0";
                        $resultado = ObtenerValoresCualquiera($sql, "./Conexion.php");
                        foreach ($resultado as $index => $resultado) {
                            $nombre = $resultado['nombreImagen'];
                            copy("../Documentos/Ids/$idEditableActual/$nombre", "../Documentos/Ids/$idEditableActual/Validados/$nombre");
                            $sql = "UPDATE imagenes SET validada = 1 WHERE fkImagen = $idEditableActual AND nombreOriginal='$docAMover'";
                            ActualizarCualquierSiniestro($sql, "./Conexion.php");
                        }
                        $contadorDocs += 4;
                    }
                    $sql = "UPDATE docsaprobadosatlas SET $item='$docsAprobados' WHERE fkDocsAtlas=$idEditableActual";
                    ActualizarSiniestro($sql);
                }
                $sql = "UPDATE docsaprobadosatlas SET porcentajeDocs = $contadorDocs WHERE fkDocsAtlas=$idEditableActual";
                ActualizarSiniestro($sql);
                echo "Exito al actualizar los documentos";
            } catch (\Throwable $th) {
                echo "Erro al actualizar los documentos";
            }
            break;
        }
}