<?php
include("./bd.php");
?>

<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Login</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body style="background-image: url('../assets/img/portfolio/Banners/bannerPinUp.jpg'); 
                  background-size: cover;
                  background-position: center center;
                  width: 100%;
                  height: 100vh">

      <div class=" container">
        <div class="row justify-content-center">
          <div class="col-4">
            <div class="card mt-5">
              <div class="card-header bg-primary text-black text-center" style="background-color: #4ACAEB !important;">
                Iniciar Sesión
              </div>
              <div class="card-body">
                <form action="login.php" method="post">
                  <div class="mb-3">
                    <label for="usuario" class="form-label">Correo Electrónico</label>
                    <input type="text" class="form-control" name="usuario" id="usuario"
                      placeholder="Ingrese su usuario">
                  </div>

                  <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="contrasena" id="contrasena"
                      placeholder="Ingrese su contraseña">
                  </div>

                  <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary" name="btnEntrar">Entrar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>
<?php
function validarUsuario()
{
  // Conexión a la base de datos (reemplaza con tus datos de conexión)
  $servidor = "localhost";
  $basededatos = "website";
  $usuario = "root";
  $contraseña = "";

  try {
    $pdo = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    die("Error en la conexión a la base de datos: " . $e->getMessage());
  }

  // Recuperar datos del formulario
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    // Consulta SQL para verificar si el usuario existe y la contraseña coincide
    $sql = "SELECT * FROM usuarios WHERE CorreoElectronico = :usuario";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":usuario" => $usuario));
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($row) {
      // Usuario encontrado, verifica la contraseña
      if ($row[0]['CorreoElectronico'] == $usuario && $row[0]['Contrasena'] == $contrasena) {
        // La contraseña coincide, puedes redirigir al usuario a la página de inicio
        header("Location: index.php");
        exit();
      } else {
        echo "La contraseña es incorrecta.";
      }
    } else {
      echo "El usuario no existe.";
    }
  }
}

// Llamar a la función cuando se presione el botón
if (isset($_POST["btnEntrar"])) {
  validarUsuario();
}
?>

</html>