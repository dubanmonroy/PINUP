<?php
include("../../bd.php");

if (isset($_GET["txtid"])) {
    // Eliminar registro
    $txtid = (isset($_GET["txtid"])) ? $_GET["txtid"] : "";
    $sentencia = $conexion->prepare("DELETE FROM reservas WHERE ReservaID=:id");
    $sentencia->bindParam(":id", $txtid);
    $sentencia->execute();
}

// Seleccionar registros
$conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);
$sentencia = $conexion->prepare("SELECT * FROM `reservas`");
$sentencia->execute();
$lista_reservas = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Reserva</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ReservaID</th>
                        <th scope="col">AlumnoID</th>
                        <th scope="col">ClaseID</th>
                        <th scope="col">FechaReserva</th>
                        <th scope="col">Estado</th>
                        <th scope="col">PagoRealizado</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_reservas as $reserva) { ?>
                        <tr>
                            <td><?php echo $reserva['ReservaID']; ?></td>
                            <td><?php echo $reserva['AlumnoID']; ?></td>
                            <td><?php echo $reserva['ClaseID']; ?></td>
                            <td><?php echo $reserva['FechaReserva']; ?></td>
                            <td><?php echo $reserva['Estado']; ?></td>
                            <td><?php echo $reserva['PagoRealizado']; ?></td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtid=<?php echo $reserva["ReservaID"]; ?>" role="button">Editar</a>
                                |
                                <a name="" id="" class="btn btn-danger" href="index.php?txtid=<?php echo $reserva["ReservaID"]; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>
