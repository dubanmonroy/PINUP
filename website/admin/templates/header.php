
<?php $url_base="http://localhost/website/admin/"; ?>

<!doctype html>
<html lang="en">
<head>
  <title>administrador del sitio web</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <!-- Custom CSS -->
  <style>
    .custom-header {
      background: linear-gradient(135deg, #ff6ec4, #7873f5);
    }

    .navbar-light .navbar-nav .nav-item .nav-link {
      color: #fff;
    }
  </style>
</head>
<body>
  <header>
    <!-- place navbar here -->
    <nav class="navbar navbar-expand navbar-light custom-header">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#" aria-current="page">bienvenidos a "PIN UP"<span class="visually-hidden">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/alumnos/">alumnos</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/clases/">clases</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/pagos/">pagos</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/portafolio/">portafolio</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/profesores/">profesores</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/reservas/">reservas</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/servicios/">servicios</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>secciones/usuarios/">usuarios</a>
            <a class="nav-item nav-link" href="<?php echo $url_base;?>login.php">cerrar sesion</a>
        </div>
    </nav>
  </header>
<main class="container">
  <br/>
