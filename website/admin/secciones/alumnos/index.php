<?php
include("../../bd.php");

if (isset($_GET["txtid"])) {
    // Eliminar registro
    $txtid = (isset($_GET["txtid"])) ? $_GET["txtid"] : "";
    $sentencia = $conexion->prepare("DELETE FROM alumnos WHERE AlumnoID=:id");
    $sentencia->bindParam(":id", $txtid);
    $sentencia->execute();
}

// Seleccionar registros
$conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);
$sentencia = $conexion->prepare("SELECT * FROM `alumnos`");
$sentencia->execute();
$lista_alumnos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Alumno</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">AlumnoID</th>
                        <th scope="col">UsuarioID</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_alumnos as $alumno) { ?>
                        <tr>
                            <td><?php echo $alumno['AlumnoID']; ?></td>
                            <td><?php echo $alumno['UsuarioID']; ?></td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtid=<?php echo $alumno["AlumnoID"]; ?>" role="button">Editar</a>
                                |
                                <a name="" id="" class="btn btn-danger" href="index.php?txtid=<?php echo $alumno["AlumnoID"]; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>
