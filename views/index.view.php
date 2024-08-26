<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desarrollo Web</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/styles.css">
</head>

<body>

    <div class="container text-center">
      

        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">GA Tech</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>


        <div class="row card text-center box">
            <div class="card-body">
                <h1>Desarrollo Web de Alta Calidad</h1>
                <p>Potencia tu negocio con soluciones web innovadoras y personalizadas.</p>

                <a href="#myForm" type="button" class="btn btn-primary btn-lg">Contáctanos</a>

            </div>

        </div>


        <div class="row box">
            <div class="col card">
                <h2>Soluciones Personalizadas</h2>
                <p>Adaptamos nuestras soluciones a las necesidades específicas de tu negocio.</p>
            </div>
            <div class="col card">
                <h2>Diseño Responsivo</h2>
                <p>Garantizamos una experiencia de usuario óptima en cualquier dispositivo.</p>
            </div>
            <div class="col card">
                <h2>Soporte Continuo</h2>
                <p>Brindamos soporte técnico y mantenimiento constante para asegurar el funcionamiento óptimo de tus aplicaciones.</p>
            </div>
        </div>





        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="myForm" method="POST" class="">
            <div class="row justify-content-md-center box">

                <div class="col-sm-12">

                    <h2>Solicita una Consulta Gratuita</h2>
                </div>

                <div class="col-sm-12 col-md-10">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                </div>



                <div class="col-sm-12 col-md-10">
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>

                <div class="col-sm-12 col-md-10">
                    <div class="mb-3">
                        <label for="phone" class="form-label">Teléfono:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                </div>

                <div class="col-sm-12 col-md-10">
                    <div class="mb-3">
                        <label for="message" class="form-label">Mensaje:</label>
                        <textarea id="message" class="form-control" name="message" required></textarea>
                    </div>
                </div>
                <div class="col-sm-12 col-md-10"><button type="submit" class="btn btn-primary" name="action">Enviar</button>
                </div>
            </div>
        </form>


        <div class="row box">
            <footer>
                <p>&copy; GA Tech. Todos los derechos reservados.</p>
            </footer>
        </div>


    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>