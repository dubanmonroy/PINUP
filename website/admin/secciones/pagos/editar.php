<?php
include("../../bd.php");

$conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);

if (isset($_GET["txtid"])) {
    // Recuperar los datos del ID correspondiente
    $txtid = (isset($_GET["txtid"])) ? $_GET["txtid"] : "";

    $sentencia = $conexion->prepare("SELECT * FROM pagos WHERE PagoID=:id");
    $sentencia->bindParam(":id", $txtid);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $pagoID = $registro["PagoID"];
    $alumnoID = $registro["AlumnoID"];
    $monto = $registro["Monto"];
    $fechaPago = $registro["FechaPago"];
    $metodoPago = $registro["MetodoPago"];
    $comprobantePago = $registro["ComprobantePago"];
}

if ($_POST) {
    // Recepcionar los valores del formulario
    $txtid = (isset($_POST["txtid"])) ? $_POST["txtid"] : "";
    $pagoID = (isset($_POST["pagoID"])) ? $_POST["pagoID"] : "";
    $alumnoID = (isset($_POST["alumnoID"])) ? $_POST["alumnoID"] : "";
    $monto = (isset($_POST["monto"])) ? $_POST["monto"] : "";
    $fechaPago = (isset($_POST["fechaPago"])) ? $_POST["fechaPago"] : "";
    $metodoPago = (isset($_POST["metodoPago"])) ? $_POST["metodoPago"] : "";
    $comprobantePago = (isset($_POST["comprobantePago"])) ? $_POST["comprobantePago"] : "";

    $sentencia = $conexion->prepare("UPDATE pagos
    SET 
    PagoID=:pagoID,
    AlumnoID=:alumnoID,
    Monto=:monto,
    FechaPago=:fechaPago,
    MetodoPago=:metodoPago,
    ComprobantePago=:comprobantePago
    WHERE PagoID=:id");

    $sentencia->bindParam(":pagoID", $pagoID);
    $sentencia->bindParam(":alumnoID", $alumnoID);
    $sentencia->bindParam(":monto", $monto);
    $sentencia->bindParam(":fechaPago", $fechaPago);
    $sentencia->bindParam(":metodoPago", $metodoPago);
    $sentencia->bindParam(":comprobantePago", $comprobantePago);
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
                <label for="txtid" class="form-label">PagoID:</label>
                <input readonly value="<?php echo $txtid; ?>"
                       class="form-control" name="txtid" id="txtid" aria-describedby="helpId" placeholder="PagoID">
            </div>

            <div class="mb-3">
                <label for="pagoID" class="form-label">PagoID</label>
                <input value="<?php echo $pagoID; ?>"
                       class="form-control" name="pagoID" id="pagoID" aria-describedby="helpId" placeholder="PagoID">
            </div>

            <div class="mb-3">
                <label for="alumnoID" class="form-label">AlumnoID</label>
                <input value="<?php echo $alumnoID; ?>"
                       class="form-control" name="alumnoID" id="alumnoID" aria-describedby="helpId" placeholder="AlumnoID">
            </div>

            <div class="mb-3">
                <label for="monto" class="form-label">Monto</label>
                <input value="<?php echo $monto; ?>"
                       class="form-control" name="monto" id="monto" aria-describedby="helpId" placeholder="Monto">
            </div>

            <div class="mb-3">
                <label for="fechaPago" class="form-label">Fecha de Pago</label>
                <input value="<?php echo $fechaPago; ?>"
                       class="form-control" name="fechaPago" id="fechaPago" aria-describedby="helpId" placeholder="Fecha de Pago">
            </div>

            <div class="mb-3">
                <label for="metodoPago" class="form-label">Método de Pago</label>
                <input value="<?php echo $metodoPago; ?>"
                       class="form-control" name="metodoPago" id="metodoPago" aria-describedby="helpId" placeholder="Método de Pago">
            </div>

            <div class="mb-3">
                <label for="comprobantePago" class="form-label">Comprobante de Pago</label>
                <input value="<?php echo $comprobantePago; ?>"
                       class="form-control" name="comprobantePago" id="comprobantePago" aria-describedby="helpId" placeholder="Comprobante de Pago">
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
