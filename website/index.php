<?php
include("admin/bd.php");

$sentencia = $conexion->prepare("SELECT * FROM `usuarios`");
$sentencia->execute();
$lista_servicios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Pin Up</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/YOUR_KIT_ID.js" crossorigin="anonymous"></script>
</head>

<body id="page-top">
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="#page-top"><img src="assets\img\logos\LogoPinUp.png" alt="Pin Up" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menú
                <i class="fas fa-bars align-middle"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Inicio</a></li>
                </ul>
            </div>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="admin/login.php"><button
                                class="btn btn-warning">Registrate</button></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="masthead">
        <div class="container">
            <div class="masthead-subheading">INSCRÍBETE AHORA</div>
            <div class="masthead-heading text-uppercase" style="color: #7C00EE; ">A LA MEJOR <span
                    style="color: #4ACAEB">ACADEMIA DE BAILE</span></div>
            <a class="btn btn-primary btn-xl text-uppercase" href="#services">VER PLANES</a>
        </div>
    </header>
    <!-- Info -->
    <section class="page-section" id="info">
        <div class="d-flex justify-content-center align-items-center gap-4 placeholder-wave">
            <div style="width: 40%;" class="d-flex flex-column justify-content-center">
                <a class="navbar-brand" href="#page-top">
                    <img src="assets\img\portfolio\Banners\bannerPinUp2.jpg" alt="Pin Up" class="img-fluid rounded-3">
                </a>
                <span class="text-center" style="color: gray;"><i>Los mejores instructores</i></span>
            </div>
            <div class="d-flex flex-column justify-content-center" style="width: 35%;">
                <div class="text-left">
                    <hr style="color: #FC5A21; border-width: 3px;">
                    <h2 class="section-heading text-uppercase">PLANES POPULARES</h2>
                    <h3 class="section-subheading text-muted">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        In molestiae omnis, tempora aut voluptates labore earum suscipit. Sunt sequi tempora, magnam,
                        dolor ullam assumenda saepe, voluptates maxime voluptate illo commodi.</h3>
                    <span class="nav-item"><a class="nav-link" href="#portfolio"><button class="btn btn-info">Ver
                                Planes</button></a></span>
                </div>
            </div>
        </div>
    </section>
    <!-- Portfolio Grid-->
    <section class="page-section bg-light" id="portfolio">
        <div class="container">
            <div>
                <i class="section-heading text-left fa-3x" style="color: #FC5A21;">Beneficios</i>
                <hr style="color: #FC5A21; border-width: 2px; width: 30%;">
                <h2 class="section-heading text-uppercase text-left">¿Cómo funcionamos?</h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 1-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/1.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Ejercicio</div>
                            <div class="portfolio-caption-subheading text-muted"><a>Ver detalles</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 2-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/2.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Salud Física</div>
                            <div class="portfolio-caption-subheading text-muted"><a>Ver detalles</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4">
                    <!-- Portfolio item 3-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/3.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Dotación completa</div>
                            <div class="portfolio-caption-subheading text-muted"><a>Ver detalles</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                    <!-- Portfolio item 4-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/4.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Serás el mejor</div>
                            <div class="portfolio-caption-subheading text-muted"><a>Ver detalles</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                    <!-- Portfolio item 5-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/5.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">El cuerpo de tus sueños</div>
                            <div class="portfolio-caption-subheading text-muted"><a>Ver detalles</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <!-- Portfolio item 6-->
                    <div class="portfolio-item">
                        <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                            <div class="portfolio-hover">
                                <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                            </div>
                            <img class="img-fluid" src="assets/img/portfolio/6.jpg" alt="..." />
                        </a>
                        <div class="portfolio-caption">
                            <div class="portfolio-caption-heading">Información alimenticia</div>
                            <div class="portfolio-caption-subheading text-muted"><a>Ver detalles</a></div>
                        </div>
                    </div>
                </div>
    </section>
    <!-- About-->
    <section class="page-section" id="about">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">¿Quienes somos?</h2>
                <h3 class="section-subheading text-muted">Universidad San Buenaventura</h3>
            </div>
            <ul class="timeline">
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid"
                            src="assets/img/portfolio/Integrantes/Sergio.jpg" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading" style="color: white;">
                            <h4>2021 - 2023</h4>
                            <h4 class="subheading">Sergio Jáuregui</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Estudiante 4to semestre Tecnología en Desarrollo de Sofware</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid"
                            src="assets/img/portfolio/Integrantes/Andres.jpg" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading" style="color: white;" style="color: white;">
                            <h4>2021 - 2023</h4>
                            <h4 class="subheading">Andres Jimenez</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Estudiante 4to semestre Tecnología en Desarrollo de Sofware</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid"
                            src="assets/img/portfolio/Integrantes/Alejandro.jpg" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading" style="color: white;">
                            <h4>Enero 2023</h4>
                            <h4 class="subheading">Alejandro Sanchez</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Estudiante 4to semestre Tecnología en Desarrollo de Sofware</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg"
                            alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading" style="color: white;">
                            <h4>2021 - 2023</h4>
                            <h4 class="subheading">Duban Monroy</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Estudiante 4to semestre Tecnología en Desarrollo de Sofware</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="timeline-image"><img class="rounded-circle img-fluid"
                            src="assets/img/portfolio/Integrantes/Alejandro.jpg" alt="..." /></div>
                    <div class="timeline-panel">
                        <div class="timeline-heading" style="color: white;">
                            <h4>2021 - 2023</h4>
                            <h4 class="subheading">Andres Castro</h4>
                        </div>
                        <div class="timeline-body">
                            <p class="text-muted">Estudiante 4to semestre Tecnología en Desarrollo de Sofware</p>
                        </div>
                    </div>
                </li>
                <li class="timeline-inverted">
                    <div class="timeline-image">
                        <h4>
                            Eso es
                            <br />
                            todo!
                        </h4>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <!-- Contact-->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">Contáctanos</h2>
                <h3 class="section-subheading text-muted">¡Déjanos un mensaje! Lo responderemos lo más pronto posible.
                </h3>
            </div>
            <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control" id="name" type="text" placeholder="Tu nombre *"
                                data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">El nombre es requerido.</div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" id="email" type="email" placeholder="Tu email *"
                                data-sb-validations="required,email" />
                            <div class="invalid-feedback" data-sb-feedback="email:required">El correo electrónico es
                                requerido.</div>
                            <div class="invalid-feedback" data-sb-feedback="email:email">Por favor ingresa un correo
                                electrónico válido.</div>
                        </div>
                        <div class="form-group mb-md-0">
                            <input class="form-control" id="phone" type="tel" placeholder="Número de telefono"
                                data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="phone:required">El número de teléfono es
                                requerido.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control" id="message" placeholder="Tu mensaje *"
                                data-sb-validations="required"></textarea>
                            <div class="invalid-feedback" data-sb-feedback="message:required">El mensaje es requerido.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-none" id="submitSuccessMessage">
                    <div class="text-center text-white mb-3">
                        <div class="fw-bolder">¡El mensaje ha sido enviado correctamente!</div>
                        Nos contactaremos contigo lo más pronto posible
                        <br />
                    </div>
                </div>
                <div class="d-none" id="submitErrorMessage">
                    <div class="text-center text-danger mb-3">Ha ocurrido un error mientras se enviaba el mensaje!</div>
                </div>
                <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled"
                        id="submitButton" type="submit">Enviar mensaje</button></div>
            </form>
        </div>
    </section>
    <!-- Footer-->
    <footer class="footer py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 text-lg-start">Copyright &copy; Pin Up 2023</div>
                <div class="col-lg-4 my-3 my-lg-0">
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Twitter"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a class="link-dark text-decoration-none me-3" href="#!">Políticas de privacidad</a>
                    <a class="link-dark text-decoration-none" href="#!">Terminos y condiciones</a>
                </div>
            </div>
        </div>
    </footer>
</body>