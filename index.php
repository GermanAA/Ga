<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$secretKey = $_ENV['CAP_PASSWORD'] ?? '';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombreCliente = $_POST['name'];
    //echo ($nombreCliente);
    $correo = $_POST['email'];
    //echo ($correo);
    $telefono = $_POST['phone'];
    $comentario = $_POST['message'];
    $recaptchaResponse = $_POST['g-recaptcha-response'];

    // Validar el CAPTCHA
    //$secretKey = 'your-secret-key';
    $verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $response = file_get_contents($verifyUrl . '?secret=' . $secretKey . '&response=' . $recaptchaResponse);
    $responseData = json_decode($response);

    if (!$responseData->success) {
        echo "<div class='alert alert-danger'>Error: CAPTCHA no válido.</div>";
        echo "<pre>" . print_r($responseData, true) . "</pre>";
        exit;
    }



    if ($comentario != "") {
        // Se declaran los tres parámetros que se usarán en el correo.
        $destinatario = "armendariz.german@gmail.com";
        $asunto = "GA Tech";
        $mensaje = "
        <!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <title>Servicio Paquetería</title>
        </head>
        <body>
            <h2>Detalles del cliente:</h2>
            <p><strong>Nombre del cliente:</strong> " . htmlspecialchars($nombreCliente, ENT_QUOTES, 'UTF-8') . "</p>
            <p><strong>Correo:</strong> " . htmlspecialchars($correo, ENT_QUOTES, 'UTF-8') . "</p>
            <p><strong>Teléfono:</strong> " . htmlspecialchars($telefono, ENT_QUOTES, 'UTF-8') . "</p>
            <p><strong>Comentario:</strong> " . nl2br(htmlspecialchars($comentario, ENT_QUOTES, 'UTF-8')) . "</p>
        </body>
        </html>";

        // Se intenta enviar el correo y se muestra un mensaje en la página con el resultado.
        if (mail($destinatario, $asunto, $mensaje)) {
            echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Mensaje Enviado</title>
        <!-- Bootstrap CSS -->
        <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH' crossorigin='anonymous'>
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
        <!-- Bootstrap JS and dependencies (optional) -->
        <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js'></script>
    </body>
    </html>";
        } else {
            echo  "<p>¡Mensaje No Enviado!</p>";
        }
    }
}

require 'views/index.view.php';
