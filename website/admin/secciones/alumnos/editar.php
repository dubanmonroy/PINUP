<?php
include("../../bd.php");

$conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);

if (isset($_GET["txtid"])) {
    // Recuperar los datos del ID correspondiente
    $txtid = (isset($_GET["txtid"])) ? $_GET["txtid"] : "";

    $sentencia = $conexion->prepare("SELECT * FROM alumnos WHERE AlumnoID=:id");
    $sentencia->bindParam(":id", $txtid);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $alumnoID = $registro["AlumnoID"];
    $usuarioID = $registro["UsuarioID"];
}

if ($_POST) {
    // Recepcionar los valores del formulario
    $txtid = (isset($_POST["txtid"])) ? $_POST["txtid"] : "";
    $alumnoID = (isset($_POST["alumnoID"])) ? $_POST["alumnoID"] : "";
    $usuarioID = (isset($_POST["usuarioID"])) ? $_POST["usuarioID"] : "";

    $sentencia = $conexion->prepare("UPDATE alumnos
    SET 
    AlumnoID=:alumnoID,
    UsuarioID=:usuarioID
    WHERE AlumnoID=:id");

    $sentencia->bindParam(":alumnoID", $alumnoID);
    $sentencia->bindParam(":usuarioID", $usuarioID);
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
                <label for="txtid" class="form-label">AlumnoID:</label>
                <input readonly value="<?php echo $txtid; ?>"
                       class="form-control" name="txtid" id="txtid" aria-describedby="helpId" placeholder="AlumnoID">
            </div>

            <div class="mb-3">
                <label for="alumnoID" class="form-label">AlumnoID</label>
                <input value="<?php echo $alumnoID; ?>"
                       class="form-control" name="alumnoID" id="alumnoID" aria-describedby="helpId" placeholder="AlumnoID">
            </div>

            <div class="mb-3">
                <label for="usuarioID" class="form-label">UsuarioID</label>
                <input value="<?php echo $usuarioID; ?>"
                       class="form-control" name="usuarioID" id="usuarioID" aria-describedby="helpId" placeholder="UsuarioID">
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
