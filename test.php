<?php
require 'vendor/autoload.php';

use Dotenv\Dotenv;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class MicrosoftGraphEmail {
    private $tenantId;
    private $clientId;
    private $clientSecret;
    private $userEmail;
    private $graphEndpoint = "https://graph.microsoft.com/v1.0";

    public function __construct() {
        // Cargar variables de entorno desde .env
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $this->tenantId = $_ENV['TENANT_ID'];
        $this->clientId = $_ENV['CLIENT_ID'];
        $this->clientSecret = $_ENV['CLIENT_SECRET'];
        $this->userEmail = $_ENV['USER_EMAIL'];
    }

    public function getAccessToken() {
        $url = "https://login.microsoftonline.com/{$this->tenantId}/oauth2/v2.0/token";
        $client = new Client();

        try {
            $response = $client->post($url, [
                'form_params' => [
                    'grant_type' => 'client_credentials',
                    'client_id' => $this->clientId,
                    'client_secret' => $this->clientSecret,
                    'scope' => 'https://graph.microsoft.com/.default'
                ]
            ]);
            $body = json_decode($response->getBody(), true);
            return $body['access_token'];
        } catch (RequestException $e) {
            echo "Error obteniendo token: " . $e->getMessage();
            return null;
        }
    }

    public function sendEmail($recipient, $subject, $bodyContent) {
        $accessToken = $this->getAccessToken();
        if (!$accessToken) {
            return "No se pudo obtener el token de acceso.";
        }

        $url = "{$this->graphEndpoint}/users/{$this->userEmail}/sendMail";
        $client = new Client();

        $emailData = [
            "message" => [
                "subject" => $subject,
                "body" => [
                    "contentType" => "HTML",
                    "content" => $bodyContent
                ],
                "toRecipients" => [
                    [
                        "emailAddress" => ["address" => $recipient]
                    ]
                ]
            ]
        ];

        try {
            $response = $client->post($url, [
                'headers' => [
                    'Authorization' => "Bearer $accessToken",
                    'Content-Type' => 'application/json'
                ],
                'json' => $emailData
            ]);

            return "Correo enviado con éxito.";
        } catch (RequestException $e) {
            echo "Error enviando correo: " . $e->getMessage();
            return null;
        }
    }
}

// Uso del script
$emailService = new MicrosoftGraphEmail();
$response = $emailService->sendEmail("destinatario@example.com", "Prueba con Dotenv", "Este es un correo enviado desde PHP usando Microsoft Graph API con Dotenv.");
echo $response;
?>
