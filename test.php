<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// Cargar variables del archivo .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Obtener claves del archivo .env
$secretKey = $_ENV['CAP_PASSWORD'] ?? '';
$smtpHost = 'smtp.office365.com'; // Servidor SMTP de Office 365
$smtpUser = $_ENV['SMTP_USER'] ?? ''; // Correo empresarial de Office 365
$smtpPass = $_ENV['SMTP_PASS'] ?? ''; // Contraseña o Contraseña de Aplicación
$smtpPort = 587; // Puerto de salida para Office 365

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP de Office 365
    $mail->isSMTP();
    $mail->Host       = 'smtp.office365.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtpUser; // Cambia por tu correo empresarial
    $mail->Password   = $smtpPass; // Usa una App Password si es necesario
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // TLS es requerido por Office 365
    $mail->Port       = 587;

    // Configurar el remitente y el destinatario
    $mail->setFrom('tu_correo@tudominio.com', 'Tu Nombre');
    $mail->addAddress('armendariz.german@gmail.com', 'Destinatario de Prueba');

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Prueba de Envío desde PHP con Office 365';
    $mail->Body    = '<p>Este es un correo de prueba enviado desde PHP con Office 365.</p>';
    $mail->AltBody = 'Este es un correo de prueba enviado desde PHP con Office 365.';

    // Intentar enviar el correo
    if ($mail->send()) {
        echo '✅ El correo se ha enviado correctamente.';
    }
} catch (Exception $e) {
    echo "❌ Error al enviar el correo: {$mail->ErrorInfo}";
}
?>
