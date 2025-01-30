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

if (empty($secretKey) || empty($smtpUser) || empty($smtpPass)) {
    die("Error: No se encontraron las variables necesarias en el archivo .env.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreCliente = $_POST['name'] ?? '';
    $correo = $_POST['email'] ?? '';
    $telefono = $_POST['phone'] ?? '';
    $comentario = $_POST['message'] ?? '';
    $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';

    // Validar el CAPTCHA con Google
    $verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $response = file_get_contents($verifyUrl . '?secret=' . $secretKey . '&response=' . $recaptchaResponse);
    $responseData = json_decode($response);

    if (!$responseData->success) {
        echo "<div class='alert alert-danger'>Error: CAPTCHA no válido.</div>";
        exit;
    }

    if (!empty($comentario)) {
        $destinatario = "armendariz.german@gmail.com";
        $asunto = "GA Tech - Contacto";
        $mensaje = "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <title>Mensaje de Contacto</title>
            <style>
                body { font-family: Arial, sans-serif; }
                h2 { color: #2c3e50; }
                p { font-size: 14px; }
            </style>
        </head>
        <body>
            <h2>Detalles del Cliente:</h2>
            <p><strong>Nombre:</strong> " . htmlspecialchars($nombreCliente, ENT_QUOTES, 'UTF-8') . "</p>
            <p><strong>Correo:</strong> " . htmlspecialchars($correo, ENT_QUOTES, 'UTF-8') . "</p>
            <p><strong>Teléfono:</strong> " . htmlspecialchars($telefono, ENT_QUOTES, 'UTF-8') . "</p>
            <p><strong>Mensaje:</strong> " . nl2br(htmlspecialchars($comentario, ENT_QUOTES, 'UTF-8')) . "</p>
        </body>
        </html>";

        // Configurar PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Configuración del servidor SMTP de Office 365
            $mail->isSMTP();
            $mail->Host       = $smtpHost;
            $mail->SMTPAuth   = true;
            $mail->Username   = $smtpUser;
            $mail->Password   = $smtpPass;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Office 365 requiere TLS
            $mail->Port       = $smtpPort;

            // Remitente y destinatario
            $mail->setFrom($smtpUser, 'GA Tech');
            $mail->addAddress($destinatario);
            $mail->addReplyTo($correo, $nombreCliente);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = $asunto;
            $mail->Body    = $mensaje;
            $mail->AltBody = strip_tags($mensaje);

            // Enviar el correo
            if ($mail->send()) {
                echo "<!DOCTYPE html>
                <html lang='es'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Mensaje Enviado</title>
                    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet'>
                    <link rel='stylesheet' href='estilos/styles.css'>
                </head>
                <body>
                    <div class='container mt-5'>
                        <div class='alert alert-success'>
                            <h4 class='alert-heading'>Gracias, $nombreCliente</h4>
                            <p>Tu mensaje ha sido enviado con éxito. Nos pondremos en contacto contigo a la brevedad posible.</p>
                            <hr>
                            <p class='mb-0'><a href='index.php' class='btn btn-primary'>Volver al formulario</a></p>
                        </div>
                    </div>
                    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>
                </body>
                </html>";
            }
        } catch (Exception $e) {
            echo "<div class='alert alert-danger'>Error al enviar el correo: {$mail->ErrorInfo}</div>";
        }
    }
}

require 'views/index.view.php';
?>
