<?php

include("../../bd.php");

if ($_POST) {
    $conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);

    $AlumnoID = (isset($_POST["AlumnoID"])) ? $_POST["AlumnoID"] : "";
    $UsuarioID = (isset($_POST["UsuarioID"])) ? $_POST["UsuarioID"] : "";

    $sentencia = $conexion->prepare("INSERT INTO `alumnos` (`AlumnoID`, `UsuarioID`) 
    VALUES (:AlumnoID, :UsuarioID);");

    $sentencia->bindParam(":AlumnoID", $AlumnoID);
    $sentencia->bindParam(":UsuarioID", $UsuarioID);

    $sentencia->execute();
    $mensaje = "Registro de alumno agregado con éxito.";
    header("location: index.php?mensaje=" . $mensaje);
}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        Crear Alumno
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="AlumnoID" class="form-label">AlumnoID</label>
                <input type="text" class="form-control" name="AlumnoID" id="AlumnoID" placeholder="AlumnoID">
            </div>

            <div class="mb-3">
                <label for="UsuarioID" class="form-label">UsuarioID</label>
                <input type="text" class="form-control" name="UsuarioID" id="UsuarioID" placeholder="UsuarioID">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
        </form>
    </div>
    <div class="card-footer">
        <!-- Pie de página si es necesario -->
    </div>
</div>

<?php include("../../templates/footer.php"); ?>
