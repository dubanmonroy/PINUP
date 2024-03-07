<?php
include("../../bd.php");

if ($_POST) {
    $conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);

    $PagoID = (isset($_POST["PagoID"])) ? $_POST["PagoID"] : "";
    $AlumnoID = (isset($_POST["AlumnoID"])) ? $_POST["AlumnoID"] : "";
    $Monto = (isset($_POST["Monto"])) ? $_POST["Monto"] : "";
    $FechaPago = (isset($_POST["FechaPago"])) ? $_POST["FechaPago"] : "";
    $MetodoPago = (isset($_POST["MetodoPago"])) ? $_POST["MetodoPago"] : "";
    $ComprobantePago = (isset($_POST["ComprobantePago"])) ? $_POST["ComprobantePago"] : "";

    $sentencia = $conexion->prepare("INSERT INTO `pagos` (`PagoID`, `AlumnoID`, `Monto`, `FechaPago`, `MetodoPago`, `ComprobantePago`) 
    VALUES (:PagoID, :AlumnoID, :Monto, :FechaPago, :MetodoPago, :ComprobantePago);");

    $sentencia->bindParam(":PagoID", $PagoID);
    $sentencia->bindParam(":AlumnoID", $AlumnoID);
    $sentencia->bindParam(":Monto", $Monto);
    $sentencia->bindParam(":FechaPago", $FechaPago);
    $sentencia->bindParam(":MetodoPago", $MetodoPago);
    $sentencia->bindParam(":ComprobantePago", $ComprobantePago);

    $sentencia->execute();
    $mensaje = "Registro de pago agregado con éxito.";
    header("location: index.php?mensaje=" . $mensaje);
}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        Crear Pago
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="PagoID" class="form-label">PagoID</label>
                <input type="text" class="form-control" name="PagoID" id="PagoID" placeholder="PagoID">
            </div>

            <div class="mb-3">
                <label for="AlumnoID" class="form-label">AlumnoID</label>
                <input type="text" class="form-control" name="AlumnoID" id="AlumnoID" placeholder="AlumnoID">
            </div>

            <div class="mb-3">
                <label for="Monto" class="form-label">Monto</label>
                <input type="text" class="form-control" name="Monto" id="Monto" placeholder="Monto">
            </div>

            <div class="mb-3">
                <label for="FechaPago" class="form-label">Fecha de Pago</label>
                <input type="date" class="form-control" name="FechaPago" id="FechaPago">
            </div>

            <div class="mb-3">
                <label for="MetodoPago" class="form-label">Método de Pago</label>
                <input type="text" class="form-control" name="MetodoPago" id="MetodoPago" placeholder="Método de Pago">
            </div>

            <div class="mb-3">
                <label for="ComprobantePago" class="form-label">Comprobante de Pago</label>
                <input type="text" class="form-control" name="ComprobantePago" id="ComprobantePago" placeholder="Comprobante de Pago">
            </div>

            <button type="submit" class="btn btn-success">Agregar</button>
        </form>
    </div>
    <div class="card-footer">
        <!-- Pie de página si es necesario -->
    </div>
</div>

<?php include("../../templates/footer.php"); ?>
