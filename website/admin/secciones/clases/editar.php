<?php
include("../../bd.php");

$conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);

if (isset($_GET["txtid"])) {
    // Recuperar los datos del ID correspondiente
    $txtid = (isset($_GET["txtid"])) ? $_GET["txtid"] : "";

    $sentencia = $conexion->prepare("SELECT * FROM clases WHERE ClaseID=:id");
    $sentencia->bindParam(":id", $txtid);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $claseID = $registro["ClaseID"];
    $nombreClase = $registro["NombreClase"];
    $profesorID = $registro["ProfesorID"];
    $fechaHora = $registro["FechaHora"];
    $cupoMaximo = $registro["CupoMaximo"];
    $descripcion = $registro["Descripcion"];
    $precio = $registro["Precio"];
    $nivel = $registro["Nivel"];
}

if ($_POST) {
    // Recepcionar los valores del formulario
    $txtid = (isset($_POST["txtid"])) ? $_POST["txtid"] : "";
    $claseID = (isset($_POST["claseID"])) ? $_POST["claseID"] : "";
    $nombreClase = (isset($_POST["nombreClase"])) ? $_POST["nombreClase"] : "";
    $profesorID = (isset($_POST["profesorID"])) ? $_POST["profesorID"] : "";
    $fechaHora = (isset($_POST["fechaHora"])) ? $_POST["fechaHora"] : "";
    $cupoMaximo = (isset($_POST["cupoMaximo"])) ? $_POST["cupoMaximo"] : "";
    $descripcion = (isset($_POST["descripcion"])) ? $_POST["descripcion"] : "";
    $precio = (isset($_POST["precio"])) ? $_POST["precio"] : "";
    $nivel = (isset($_POST["nivel"])) ? $_POST["nivel"] : "";

    $sentencia = $conexion->prepare("UPDATE clases
    SET 
    ClaseID=:claseID,
    NombreClase=:nombreClase,
    ProfesorID=:profesorID,
    FechaHora=:fechaHora,
    CupoMaximo=:cupoMaximo,
    Descripcion=:descripcion,
    Precio=:precio,
    Nivel=:nivel
    WHERE ClaseID=:id");

    $sentencia->bindParam(":claseID", $claseID);
    $sentencia->bindParam(":nombreClase", $nombreClase);
    $sentencia->bindParam(":profesorID", $profesorID);
    $sentencia->bindParam(":fechaHora", $fechaHora);
    $sentencia->bindParam(":cupoMaximo", $cupoMaximo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":precio", $precio);
    $sentencia->bindParam(":nivel", $nivel);
    $sentencia->bindParam(":id", $txtid);
    $sentencia->execute();

    $mensaje = "Registro modificado con éxito.";
    header("location: index.php?mensaje=" . $mensaje);
}

include("../../templates/header.php");
?>

<div class="card">
    <div class "card-header">
        Editar la información del registro
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="txtid" class="form-label">ClaseID:</label>
                <input readonly value="<?php echo $txtid; ?>"
                       class="form-control" name="txtid" id="txtid" aria-describedby="helpId" placeholder="ClaseID">
            </div>

            <div class="mb-3">
                <label for="claseID" class="form-label">ClaseID</label>
                <input value="<?php echo $claseID; ?>"
                       class="form-control" name="claseID" id="claseID" aria-describedby="helpId" placeholder="ClaseID">
            </div>

            <div class="mb-3">
                <label for="nombreClase" class="form-label">Nombre de la Clase</label>
                <input value="<?php echo $nombreClase; ?>"
                       class="form-control" name="nombreClase" id="nombreClase" aria-describedby="helpId" placeholder="Nombre de la Clase">
            </div>

            <div class="mb-3">
                <label for="profesorID" class="form-label">ProfesorID</label>
                <input value="<?php echo $profesorID; ?>"
                       class="form-control" name="profesorID" id="profesorID" aria-describedby="helpId" placeholder="ProfesorID">
            </div>

            <div class="mb-3">
                <label for="fechaHora" class="form-label">Fecha y Hora</label>
                <input value="<?php echo $fechaHora; ?>"
                       class="form-control" name="fechaHora" id="fechaHora" aria-describedby="helpId" placeholder="Fecha y Hora">
            </div>

            <div class="mb-3">
                <label for="cupoMaximo" class="form-label">Cupo Máximo</label>
                <input value="<?php echo $cupoMaximo; ?>"
                       class="form-control" name="cupoMaximo" id="cupoMaximo" aria-describedby="helpId" placeholder="Cupo Máximo">
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input value="<?php echo $descripcion; ?>"
                       class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Descripción">
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input value="<?php echo $precio; ?>"
                       class="form-control" name="precio" id="precio" aria-describedby="helpId" placeholder="Precio">
            </div>

            <div class="mb-3">
                <label for="nivel" class="form-label">Nivel</label>
                <input value="<?php echo $nivel; ?>"
                       class="form-control" name="nivel" id="nivel" aria-describedby="helpId" placeholder="Nivel">
            </div>

            <button type="submit" class="btn btn-success">Actualizar</button>
            <
