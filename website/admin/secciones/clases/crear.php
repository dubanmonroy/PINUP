<?php
include("../../bd.php");

if ($_POST) {
    $conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);

    $ClaseID = (isset($_POST["ClaseID"])) ? $_POST["ClaseID"] : "";
    $NombreClase = (isset($_POST["NombreClase"])) ? $_POST["NombreClase"] : "";
    $ProfesorID = (isset($_POST["ProfesorID"])) ? $_POST["ProfesorID"] : "";
    $FechaHora = (isset($_POST["FechaHora"])) ? $_POST["FechaHora"] : "";
    $CupoMaximo = (isset($_POST["CupoMaximo"])) ? $_POST["CupoMaximo"] : "";
    $Descripcion = (isset($_POST["Descripcion"])) ? $_POST["Descripcion"] : "";
    $Precio = (isset($_POST["Precio"])) ? $_POST["Precio"] : "";
    $Nivel = (isset($_POST["Nivel"])) ? $_POST["Nivel"] : "";

    $sentencia = $conexion->prepare("INSERT INTO `clases` (`ClaseID`, `NombreClase`, `ProfesorID`, `FechaHora`, `CupoMaximo`, `Descripcion`, `Precio`, `Nivel`) 
    VALUES (:ClaseID, :NombreClase, :ProfesorID, :FechaHora, :CupoMaximo, :Descripcion, :Precio, :Nivel);");

    $sentencia->bindParam(":ClaseID", $ClaseID);
    $sentencia->bindParam(":NombreClase", $NombreClase);
    $sentencia->bindParam(":ProfesorID", $ProfesorID);
    $sentencia->bindParam(":FechaHora", $FechaHora);
    $sentencia->bindParam(":CupoMaximo", $CupoMaximo);
    $sentencia->bindParam(":Descripcion", $Descripcion);
    $sentencia->bindParam(":Precio", $Precio);
    $sentencia->bindParam(":Nivel", $Nivel);

    $sentencia->execute();
    $mensaje = "Registro de clase agregado con éxito.";
    header("location: index.php?mensaje=" . $mensaje);
}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        Crear Clase
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="ClaseID" class="form-label">ClaseID</label>
                <input type="text" class="form-control" name="ClaseID" id="ClaseID" placeholder="ClaseID">
            </div>

            <div class="mb-3">
                <label for="NombreClase" class="form-label">Nombre de la Clase</label>
                <input type="text" class ="form-control" name="NombreClase" id="NombreClase" placeholder="Nombre de la Clase">
            </div>

            <div class="mb-3">
                <label for="ProfesorID" class="form-label">ProfesorID</label>
                <input type="text" class="form-control" name="ProfesorID" id="ProfesorID" placeholder="ProfesorID">
            </div>

            <div class="mb-3">
                <label for="FechaHora" class="form-label">Fecha y Hora</label>
                <input type="text" class="form-control" name="FechaHora" id="FechaHora" placeholder="Fecha y Hora">
            </div>

            <div class="mb-3">
                <label for="CupoMaximo" class="form-label">Cupo Máximo</label>
                <input type="text" class="form-control" name="CupoMaximo" id="CupoMaximo" placeholder="Cupo Máximo">
            </div>

            <div class="mb-3">
                <label for="Descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" name="Descripcion" id="Descripcion" placeholder="Descripción">
            </div>

            <div class="mb-3">
                <label for="Precio" class="form-label">Precio</label>
                <input type="text" class="form-control" name="Precio" id="Precio" placeholder="Precio">
            </div>

            <div class="mb-3">
                <label for="Nivel" class="form-label">Nivel</label>
                <input type="text" class="form-control" name="Nivel" id="Nivel" placeholder="Nivel">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
        </form>
    </div>
    <div class="card-footer">
        <!-- Pie de página si es necesario -->
    </div>
</div>

<?php include("../../templates/footer.php"); ?>
