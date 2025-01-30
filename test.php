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
    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUser;
    $mail->Password = $smtpPass;
    $mail->SetFrom($smtpUser, 'DEPARTAMENTO DE SISTEMAS - mi empresa');
    $mail->addAddress($correo_destinatario, $name);
    $mail->isHTML(true);
    $mail->Subject = 'INSTRUCTIVO ADMISIONES, mi empresa';
    $mail->Body = $correoready;
    $mail->AltBody = $correo_plano;
    $mail->CharSet = 'UTF-8';

    if (!$mail->send()) {
        echo 'El mensaje no se envió.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Mensaje enviado';
    }
}

require 'views/index.view.php';
