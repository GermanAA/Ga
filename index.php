<?php

require 'views/index.view.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombreCliente = $_POST['name'];
    //echo ($nombreCliente);
    $correo = $_POST['email'];
    //echo ($correo);
    $telefono = $_POST['phone'];
    $comentario = $_POST['message'];



    if ($comentario != "") {
        // Se declaran los tres parámetros que se usarán en el correo.
        $destinatario = "armendariz.german@gmail.com";
        $asunto = "GA Tech";
        $mensaje = "Nombre del cliente:" . $nombreCliente . "\nCorreo:" . $correo .  "\nTeléfono:" . $telefono . "\nComentario:" . $comentario;

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
                <p class='mb-0'><a href='index.view.php' class='btn btn-primary'>Volver al formulario</a></p>
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
