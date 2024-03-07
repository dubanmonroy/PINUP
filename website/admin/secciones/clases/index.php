<?php
include("../../bd.php");

if (isset($_GET["txtid"])) {
    // Eliminar registro
    $txtid = (isset($_GET["txtid"])) ? $_GET["txtid"] : "";
    $sentencia = $conexion->prepare("DELETE FROM clases WHERE ClaseID=:id");
    $sentencia->bindParam(":id", $txtid);
    $sentencia->execute();
}

// Seleccionar registros
$conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);
$sentencia = $conexion->prepare("SELECT * FROM `clases`");
$sentencia->execute();
$lista_clases = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Clase</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ClaseID</th>
                        <th scope="col">Nombre de la Clase</th>
                        <th scope="col">ProfesorID</th>
                        <th scope="col">Fecha y Hora</th>
                        <th scope="col">Cupo Máximo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Nivel</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_clases as $clase) { ?>
                        <tr>
                            <td><?php echo $clase['ClaseID']; ?></td>
                            <td><?php echo $clase['NombreClase']; ?></td>
                            <td><?php echo $clase['ProfesorID']; ?></td>
                            <td><?php echo $clase['FechaHora']; ?></td>
                            <td><?php echo $clase['CupoMaximo']; ?></td>
                            <td><?php echo $clase['Descripcion']; ?></td>
                            <td><?php echo $clase['Precio']; ?></td>
                            <td><?php echo $clase['Nivel']; ?></td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtid=<?php echo $clase["ClaseID"]; ?>" role="button">Editar</a>
                                |
                                <a name="" id="" class="btn btn-danger" href="index.php?txtid=<?php echo $clase["ClaseID"]; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>
