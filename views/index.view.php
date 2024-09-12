<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desarrollo Web</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/styles.css">
    <link rel="stylesheet" type="text/css" href="fontello-a540fdbf\css\fontello.css">
</head>

<body>

    <div class="container">


        <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
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
                        <li class="nav-item">
                            <a class="nav-link" href="#Pricing">Pricing</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-disabled="true" href="#Contacto">Contacto</a>
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
            <canvas id="particleCanvas">

            </canvas>
            <div class="card-body">
                <h1>Desarrollo Web de Alta Calidad</h1>
                <p>Potencia tu negocio con soluciones web innovadoras y personalizadas.</p>
                <a href="#myForm" type="button" class="btn btn-primary btn-lg">Contáctanos</a>

            </div>

        </div>






        <div class="row box">
            <div class="col-sm-4 card">
                <h2>Soluciones Personalizadas</h2>
                <p>Adaptamos nuestras soluciones a las necesidades específicas de tu negocio.</p>
            </div>
            <div class="col-sm-4 card">
                <h2>Diseño Responsivo</h2>
                <p>Garantizamos una experiencia de usuario óptima en cualquier dispositivo.</p>
            </div>
            <div class="col-sm-4 card">
                <h2>Soporte Continuo</h2>
                <p>Brindamos soporte técnico y mantenimiento constante para asegurar el funcionamiento óptimo de tus aplicaciones.</p>
            </div>
        </div>

        <div class="row box" id="Pricing">
            <div class="col-sm-6 col-md-6 col-lg-3 card-pricing">
                <h2 class="text-center">MicroStart</h2>

                <p class="text-center">Ideal para microempresas o startups que están comenzando y necesitan una presencia web básica pero efectiva</p>
                <h3 class="text-center"><span>5,840</span><span class="Currency"> MXN</span> </h3>
                <ul>
                    <li>SSL</li>
                    <li>Nombre de Dominio</li>
                    <li>Hosting</li>
                    <li>Correo Electrónico Profesional</li>
                    <li>Usuarios de 1 a 10</li>
                    <li>Gestión de una Cuenta
                    <ul>
                        <li>Microsoft 365 Business Basic o Google Workspace Business Starter </li>
                        <ul>
                            <li>por un año</li>
                        </ul>
                        
                    </ul>
                    </li>
                    
                </ul>

            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 card-pricing">
                <h2 class="text-center">GrowthSite</h2>
                <p class="text-center">Enfocado en pequeñas empresas que buscan crecer y requieren una página web con funcionalidades adicionales</p>
                <h3 class="text-center"><span class="text-center">8,120</span><span class="Currency"> MXN</span></h3>
                <ul>
                    <li>SSL</li>
                    <li>Nombre de Dominio</li>
                    <li>Hosting</li>
                    <li>Correo Electrónico Profesional</li>
                    <li>Usuarios de 11 a 30</li>
                    <li>Gestión de 2 Cuentas
                    <ul>
                        <li>Microsoft 365 Business Basic o Google Workspace Business Starter </li>
                        <ul>
                            <li>por un año</li>
                        </ul>
                        
                    </ul>
                    </li>
                </ul>

            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 card-pricing">
                <h2 class="text-center">ProWeb</h2>
                <p class="text-center">Dirigido a medianas empresas que necesitan una solución web robusta, con características avanzadas y personalización a medida.</p>
                <h3 class="text-center"><span class="text-center">13,920</span><span class="Currency"> MXN</span></h3>
                <ul>
                    <li>SSL</li>
                    <li>Nombre de Dominio</li>
                    <li>Hosting</li>
                    <li>Correo Electrónico Profesional</li>
                    <li>Desde 30 Usuarios</li>
                    <li>Gestión de 3 Cuentas
                    <ul>
                        <li>Microsoft 365 Business Basic o Google Workspace Business Starter </li>
                        <ul>
                            <li>por un año</li>
                        </ul>
                        
                    </ul>
                    </li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3 card-pricing">
                <h2 class="text-center">EnterpriseHub</h2>
                <p class="text-center">Diseñado para grandes empresas que requieren una plataforma web escalable y altamente segura, con integraciones complejas y soporte continuo.</p>
                <ul>
                    <li>SSL</li>
                    <li>Nombre de Dominio</li>
                    <li>Hosting</li>
                    <li>Correo Electrónico Profesional</li>
                    <li>Personaliza el número de Usuarios</li>
                    <li>Gestión de Cuentas
                    <ul>
                        <li>Microsoft 365 Business Basic o Google Workspace Business Starter </li>
                        <ul>
                            <li>por un año</li>
                        </ul>
                        
                    </ul>
                    </li>
                </ul>
            </div>
        </div>



        <a class="btn-wsp" target="_blank" href="https://wa.me/525522619648?text=Buen%20día...">
            <i class="icon-whatsapp"></i>
        </a>



        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="myForm" method="POST" class="">
            <div class="row justify-content-md-center box" id="Contacto">

                <div class="col-sm-12 Contacto">

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


        <div class="row">
            <footer>
                <p class="card">&copy; GA Tech. Todos los derechos reservados.</p>
            </footer>
        </div>


    </div>




    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>