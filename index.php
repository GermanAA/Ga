<?php
require 'vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Dotenv\Dotenv;

// Cargar variables de entorno
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Configuración de credenciales desde .env
$tenantId = $_ENV['TENANT_ID'] ?? '';
$clientId = $_ENV['CLIENT_ID'] ?? '';
$clientSecret = $_ENV['CLIENT_SECRET'] ?? '';
$userEmail = $_ENV['USER_EMAIL'] ?? '';
$secretKey = $_ENV['CAP_PASSWORD'] ?? '';

// Validar que todas las variables están configuradas
if (empty($tenantId) || empty($clientId) || empty($clientSecret) || empty($userEmail) || empty($secretKey)) {
    die("Error: Faltan configuraciones en el archivo .env.");
}

// Función para obtener el token de acceso desde Microsoft Graph
function getAccessToken($tenantId, $clientId, $clientSecret) {
    $url = "https://login.microsoftonline.com/{$tenantId}/oauth2/v2.0/token";
    $client = new Client();

    try {
        $response = $client->post($url, [
            'form_params' => [
                'grant_type' => 'client_credentials',
                'client_id' => $clientId,
                'client_secret' => $clientSecret,
                'scope' => 'https://graph.microsoft.com/.default'
            ]
        ]);

        $body = json_decode($response->getBody(), true);
        return $body['access_token'];
    } catch (RequestException $e) {
        die("Error obteniendo token: " . $e->getMessage());
    }
}

// Función para limpiar y validar entrada de datos
function limpiarEntrada($dato) {
    return htmlspecialchars(trim($dato), ENT_QUOTES, 'UTF-8');
}

// Función para validar Google reCAPTCHA
function validarCaptcha($recaptchaResponse, $secretKey) {
    $verifyUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $response = file_get_contents($verifyUrl . '?secret=' . $secretKey . '&response=' . $recaptchaResponse);
    $responseData = json_decode($response);
    return $responseData->success;
}

// Procesar el formulario si se recibe una solicitud POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombreCliente = limpiarEntrada($_POST['name'] ?? '');
    $correo = filter_var($_POST['email'] ?? '', FILTER_VALIDATE_EMAIL);
    $telefono = limpiarEntrada($_POST['phone'] ?? '');
    $comentario = limpiarEntrada($_POST['message'] ?? '');
    $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';

    // Validar CAPTCHA
    if (!validarCaptcha($recaptchaResponse, $secretKey)) {
        die("<div class='alert alert-danger'>Error: CAPTCHA no válido.</div>");
    }

    // Validar que los campos requeridos no estén vacíos
    if (empty($nombreCliente) || empty($correo) || empty($comentario)) {
        die("<div class='alert alert-danger'>Error: Todos los campos son obligatorios.</div>");
    }

    // Construcción del mensaje HTML
    $asunto = "GA Tech - Nuevo Mensaje de Contacto";
    $mensaje = "
    <!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <title>Nuevo Mensaje de Contacto</title>
    </head>
    <body>
        <h2>Detalles del Cliente:</h2>
        <p><strong>Nombre:</strong> $nombreCliente</p>
        <p><strong>Correo:</strong> $correo</p>
        <p><strong>Teléfono:</strong> $telefono</p>
        <p><strong>Comentario:</strong> " . nl2br($comentario) . "</p>
    </body>
    </html>";

    // Enviar el correo con Microsoft Graph API
    $accessToken = getAccessToken($tenantId, $clientId, $clientSecret);
    $graphUrl = "https://graph.microsoft.com/v1.0/users/{$userEmail}/sendMail";
    $client = new Client();

    $emailData = [
        "message" => [
            "subject" => $asunto,
            "body" => [
                "contentType" => "HTML",
                "content" => $mensaje
            ],
            "toRecipients" => [
                [
                    "emailAddress" => ["address" => $correo]
                ]
            ]
        ]
    ];

    try {
        $client->post($graphUrl, [
            'headers' => [
                'Authorization' => "Bearer $accessToken",
                'Content-Type' => 'application/json'
            ],
            'json' => $emailData
        ]);

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

    } catch (RequestException $e) {
        die("<div class='alert alert-danger'>Error enviando correo: " . $e->getMessage() . "</div>");
    }
}

require 'views/index.view.php';

?>
