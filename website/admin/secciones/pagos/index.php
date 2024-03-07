<?php
include("../../bd.php");

if (isset($_GET["txtid"])) {
    // Eliminar registro
    $txtid = (isset($_GET["txtid"])) ? $_GET["txtid"] : "";
    $sentencia = $conexion->prepare("DELETE FROM pagos WHERE PagoID=:id");
    $sentencia->bindParam(":id", $txtid);
    $sentencia->execute();
}

// Seleccionar registros
$conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);
$sentencia = $conexion->prepare("SELECT * FROM `pagos`");
$sentencia->execute();
$lista_pagos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Pago</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">PagoID</th>
                        <th scope="col">AlumnoID</th>
                        <th scope="col">Monto</th>
                        <th scope="col">Fecha de Pago</th>
                        <th scope="col">Método de Pago</th>
                        <th scope="col">Comprobante de Pago</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_pagos as $pago) { ?>
                        <tr>
                            <td><?php echo $pago['PagoID']; ?></td>
                            <td><?php echo $pago['AlumnoID']; ?></td>
                            <td><?php echo $pago['Monto']; ?></td>
                            <td><?php echo $pago['FechaPago']; ?></td>
                            <td><?php echo $pago['MetodoPago']; ?></td>
                            <td><?php echo $pago['ComprobantePago']; ?></td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtid=<?php echo $pago["PagoID"]; ?>" role="button">Editar</a>
                                |
                                <a name="" id="" class="btn btn-danger" href="index.php?txtid=<?php echo $pago["PagoID"]; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>
