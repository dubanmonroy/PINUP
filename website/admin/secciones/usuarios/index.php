<?php
include("../../bd.php");

if (isset($_GET["txtid"])) {
    $txtid = (isset($_GET["txtid"])) ? $_GET["txtid"] : "";
    $sentencia = $conexion->prepare("DELETE FROM usuarios WHERE UsuarioID = :UsuarioID");
    $sentencia->bindParam(":UsuarioID", $txtid);
    $sentencia->execute();
}

// Seleccionar registros
$conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);

$sentencia = $conexion->prepare("SELECT * FROM `usuarios`");
$sentencia->execute();
$lista_usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Registro</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">UsuarioID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Correo Electrónico</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_usuarios as $registro) { ?>
                        <tr class="">
                            <td><?php echo $registro['UsuarioID']; ?></td>
                            <td><?php echo $registro["Nombre"]; ?></td>
                            <td><?php echo $registro["Apellido"]; ?></td>
                            <td><?php echo $registro["CorreoElectronico"]; ?></td>
                            <td><?php echo $registro["Rol"]; ?></td>
                            <td>
                                <a name="" id="" class="btn btn-info" href="editar.php?txtid=<?php echo $registro["UsuarioID"]; ?>" role="button">Editar</a>
                                |
                                <a name="" id="" class="btn btn-danger" href="index.php?txtid=<?php echo $registro["UsuarioID"]; ?>" role="button">Eliminar</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../../templates/footer.php"); ?>