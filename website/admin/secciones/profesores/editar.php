<?php
include("../../bd.php");

$conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);

if (isset($_GET["txtid"])) {
    // Recuperar los datos del ID correspondiente
    $txtid = (isset($_GET["txtid"])) ? $_GET["txtid"] : "";

    $sentencia = $conexion->prepare("SELECT * FROM profesores WHERE ProfesorID=:id");
    $sentencia->bindParam(":id", $txtid);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $profesorID = $registro["ProfesorID"];
    $usuarioID = $registro["UsuarioID"];
    $experiencia = $registro["Experiencia"];
}

if ($_POST) {
    // Recepcionar los valores del formulario
    $txtid = (isset($_POST["txtid"])) ? $_POST["txtid"] : "";
    $profesorID = (isset($_POST["profesorID"])) ? $_POST["profesorID"] : "";
    $usuarioID = (isset($_POST["usuarioID"])) ? $_POST["usuarioID"] : "";
    $experiencia = (isset($_POST["experiencia"])) ? $_POST["experiencia"] : "";

    $sentencia = $conexion->prepare("UPDATE profesores
    SET 
    ProfesorID=:profesorID,
    UsuarioID=:usuarioID,
    Experiencia=:experiencia
    WHERE ProfesorID=:id");

    $sentencia->bindParam(":profesorID", $profesorID);
    $sentencia->bindParam(":usuarioID", $usuarioID);
    $sentencia->bindParam(":experiencia", $experiencia);
    $sentencia->bindParam(":id", $txtid);
    $sentencia->execute();

    $mensaje = "Registro modificado con éxito.";
    header("location: index.php?mensaje=" . $mensaje);
}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        Editar la información del registro
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="txtid" class="form-label">ProfesorID:</label>
                <input readonly value="<?php echo $txtid; ?>"
                       class="form-control" name="txtid" id="txtid" aria-describedby="helpId" placeholder="ProfesorID">
            </div>

            <div class="mb-3">
                <label for="profesorID" class "form-label">ProfesorID</label>
                <input value="<?php echo $profesorID; ?>"
                       class="form-control" name="profesorID" id="profesorID" aria-describedby="helpId" placeholder="ProfesorID">
            </div>

            <div class="mb-3">
                <label for="usuarioID" class="form-label">UsuarioID</label>
                <input value="<?php echo $usuarioID; ?>"
                       class="form-control" name="usuarioID" id="usuarioID" aria-describedby="helpId" placeholder="UsuarioID">
            </div>

            <div class="mb-3">
                <label for="experiencia" class="form-label">Experiencia</label>
                <input value="<?php echo $experiencia; ?>"
                       class="form-control" name="experiencia" id="experiencia" aria-describedby="helpId" placeholder="Experiencia">
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>
        </form>
    </div>
    <div class="card-footer">
        <!-- Pie de página si es necesario -->
    </div>
</div>

<?php include("../../templates/footer.php"); ?>
