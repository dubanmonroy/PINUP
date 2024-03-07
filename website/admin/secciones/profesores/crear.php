<?php
include("../../bd.php");

if ($_POST) {
    $conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);

    $ProfesorID = (isset($_POST["ProfesorID"])) ? $_POST["ProfesorID"] : "";
    $UsuarioID = (isset($_POST["UsuarioID"])) ? $_POST["UsuarioID"] : "";
    $Experiencia = (isset($_POST["Experiencia"])) ? $_POST["Experiencia"] : "";

    $sentencia = $conexion->prepare("INSERT INTO `profesores` (`ProfesorID`, `UsuarioID`, `Experiencia`) 
    VALUES (:ProfesorID, :UsuarioID, :Experiencia);");

    $sentencia->bindParam(":ProfesorID", $ProfesorID);
    $sentencia->bindParam(":UsuarioID", $UsuarioID);
    $sentencia->bindParam(":Experiencia", $Experiencia);

    $sentencia->execute();
    $mensaje = "Registro de profesor agregado con éxito.";
    header("location: index.php?mensaje=" . $mensaje);
}

include("../../templates/header.php");
?>

<div class="card">
    <div class "card-header">
        Crear Profesor
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="ProfesorID" class="form-label">ProfesorID</label>
                <input type="text" class="form-control" name="ProfesorID" id="ProfesorID" placeholder="ProfesorID">
            </div>

            <div class="mb-3">
                <label for="UsuarioID" class="form-label">UsuarioID</label>
                <input type="text" class="form-control" name="UsuarioID" id="UsuarioID" placeholder="UsuarioID">
            </div>

            <div class="mb-3">
                <label for="Experiencia" class="form-label">Experiencia</label>
                <input type="text" class="form-control" name="Experiencia" id="Experiencia" placeholder="Experiencia">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
        </form>
    </div>
    <div class="card-footer">
        <!-- Pie de página si es necesario -->
    </div>
</div>

<?php include("../../templates/footer.php"); ?>
