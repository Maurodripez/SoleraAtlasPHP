<?php
// Mostrar errores PHP (Desactivar en producción)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Incluir la libreria PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

// Inicio
$mail = new PHPMailer(true);
$email = $_POST['email'];
$asegurado = $_POST['asegurado'];
$sAsunto = "correo de prueba";
try {
    // Configuracion SMTP
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                         // Mostrar salida (Desactivar en producción)
    $mail->isSMTP();                                               // Activar envio SMTP
    $mail->Host  = 'smtp.ionos.mx';                     // Servidor SMTP
    $mail->SMTPAuth  = true;                                       // Identificacion SMTP
    $mail->Username  = 'prueba@bestcontact.mx';                  // Usuario SMTP
    $mail->Password  = 'Seas.Soprte.2022';              // Contraseña SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port  = 587;
    $mail->setFrom('prueba@bestcontact.mx', 'Usuario y password para plataforma');                // Remitente del correo
    // Destinatarios
    $mail->addAddress($email, $asegurado);  // Email y nombre del destinatario

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = $sAsunto;
    $mail->Body  = cuerpoCorreo();
    $mail->AltBody = 'Contenido del correo en texto plano para los clientes de correo que no soporten HTML';
    $mail->send();
    echo 'El correo se ha enviado';
} catch (Exception $e) {
    echo "El mensaje no se ha enviado. Mailer Error: {$mail->ErrorInfo}";
}
function cuerpoCorreo()
{
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    return "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Document</title>
    </head>
    <body>
        <img width='50%' height='250px'
            src='http://bestcontact.mx/Solera/Atlas/Imagenes Solera/Logo-seguros-Atlas.jpg' /><img width='50%'
            height='250px'
            src='http://bestcontact.mx/Solera/Atlas/Imagenes Solera/solera-holdings-llc-vector-logo-2022.png' />
        <h1 align='center' style='color: #524daa;'>Bienvenido</h1>
        <div style='background-color:rgb(255, 255, 255); height: 100vh; border: none;'>
            <h2 style='color: #605ca8;'>Hola, buen dia, por este medio le hacemos llegar su usuario y password, para el
                acceso a la plataforma y
                poder
                brindarle un mejor servicio.
                En este correo encontrara la informacion necesaria.
                Si tiene alguna duda, no dude en contactarse con nosotros.
            </h2>
            <div>
                <div style='padding-bottom: 1%; padding-top: 1%;'>
                    <font size=4>Usuario:</font>
                    <font size=4 style='border: 0ch; background-color: rgb(255, 255, 255)'>$usuario</font><br />
                </div>
                <div style='padding-bottom: 1%; padding-top: 1%; '>
                    <font size=4>Password:</font>
                    <font size=4 style='border: 0ch; background-color: rgb(255, 255, 255)'>$password</font><br />
                </div>
                <div style='padding-bottom: 1%; padding-top: 1%; '>
                    <font size=4>Link:</font>
                    <font size=4 style='border: 0ch; background-color: rgb(255, 255, 255)'>www.bestcontact.mx/Solera/Atlas/LoginUsuarios.html</font><br />
                </div>
            </div>
        </div>
        <footer>
            <h2>Su usuario y password solo tendran 14 dias de vigencia.</h2>
            <h2>Usted podra solicitar un nuevo password en cualquier momento.</h2>
        </footer>
    </body>
    
    </html>";
}
