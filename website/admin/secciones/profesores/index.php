<?php
include("../../bd.php");

if (isset($_GET["txtid"])) {
    // Eliminar registro
    $txtid = (isset($_GET["txtid"])) ? $_GET["txtid"] : "";
    $sentencia = $conexion->prepare("DELETE FROM profesores WHERE ProfesorID=:id");
    $sentencia->bindParam(":id", $txtid);
    $sentencia->execute();
}

// Seleccionar registros
$conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);
$sentencia = $conexion->prepare("SELECT * FROM `profesores`");
$sentencia->execute();
$lista_profesores = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Profesor</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">ProfesorID</th>
                        <th scope="col">UsuarioID</th>
                        <th scope="col">Experiencia</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_profesores as $profesor) { ?>
                        <tr>
                            <td><?php echo $profesor['ProfesorID']; ?></td>
                            <td><?php echo $profesor['UsuarioID']; ?></td>
                            <td><?php echo $profesor['Experiencia']; ?></td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtid=<?php echo $profesor["ProfesorID"]; ?>" role="button">Editar</a>
                                |
                                <a name="" id="" class="btn btn-danger" href="index.php?txtid=<?php echo $profesor["ProfesorID"]; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>
