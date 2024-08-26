<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desarrollo Web - </title>
    <link rel="stylesheet" href="estilos/styles.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body class="bg-primary-subtle">

    <div class="container">

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">GA Tech</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Inicio</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Servicios
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
                            <a class="nav-link" href="#">Portafolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Nosotros</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacto</a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>


        <section class="hero">
            <div class="container">
                <h1>Desarrollo Web de Alta Calidad</h1>
                <p>Potencia tu negocio con soluciones web innovadoras y personalizadas.</p>
                <a href="#contact-form" class="btn-primary">Contáctanos</a>
            </div>
        </section>

        <section class="features">
            <div class="container">
                <div class="feature">
                    <h2>Soluciones Personalizadas</h2>
                    <p>Adaptamos nuestras soluciones a las necesidades específicas de tu negocio.</p>
                </div>
                <div class="feature">
                    <h2>Diseño Responsivo</h2>
                    <p>Garantizamos una experiencia de usuario óptima en cualquier dispositivo.</p>
                </div>
                <div class="feature">
                    <h2>Soporte Continuo</h2>
                    <p>Brindamos soporte técnico y mantenimiento constante para asegurar el funcionamiento óptimo de tus aplicaciones.</p>
                </div>
            </div>
        </section>

        <section class="contact" id="contact-form">
            <div class="container">
                <h2>Solicita una Consulta Gratuita</h2>
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="myForm" method="POST" class="">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Mensaje</label>
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn-primary" name="action">Enviar</button>
                </form>
            </div>
        </section>

        <footer>
            <div class="container">
                <p>&copy; 2024 Empresa XYZ. Todos los derechos reservados.</p>
            </div>
        </footer>

    </div>



    <script src="js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>