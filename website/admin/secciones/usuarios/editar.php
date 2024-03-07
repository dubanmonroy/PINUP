<?php 
include("../../bd.php");

$conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);

if(isset($_GET["txtid"])) {
    // Recuperar los datos del ID correspondiente
    $txtid = (isset($_GET["txtid"])) ? $_GET["txtid"] : "";

    $sentencia = $conexion->prepare("SELECT * FROM usuarios WHERE UsuarioID = :UsuarioID");
    $sentencia->bindParam(":UsuarioID", $txtid);
    $sentencia->execute();
    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $UsuarioID = $registro["UsuarioID"];
    $Nombre = $registro["Nombre"];
    $Apellido = $registro["Apellido"];
    $CorreoElectronico = $registro["CorreoElectronico"];
    $Contrasena = $registro["Contrasena"];
    $Rol = $registro["Rol"];
    $FechaNacimiento = $registro["FechaNacimiento"];
    $Telefono = $registro["Telefono"];
    $Direccion = $registro["Direccion"];
    $Ciudad = $registro["Ciudad"];
    $CodigoPostal = $registro["CodigoPostal"];
    $Pais = $registro["Pais"];
    $FotoPerfil = $registro["FotoPerfil"];
}

if ($_POST) {
    // Recepciona los valores del formulario
    $UsuarioID = (isset($_POST["UsuarioID"])) ? $_POST["UsuarioID"] : "";
    $Nombre = (isset($_POST["Nombre"])) ? $_POST["Nombre"] : "";
    $Apellido = (isset($_POST["Apellido"])) ? $_POST["Apellido"] : "";
    $CorreoElectronico = (isset($_POST["CorreoElectronico"])) ? $_POST["CorreoElectronico"] : "";
    $Contrasena = (isset($_POST["Contrasena"])) ? $_POST["Contrasena"] : "";
    $Rol = (isset($_POST["Rol"])) ? $_POST["Rol"] : "";
    $FechaNacimiento = (isset($_POST["FechaNacimiento"])) ? $_POST["FechaNacimiento"] : "";
    $Telefono = (isset($_POST["Telefono"])) ? $_POST["Telefono"] : "";
    $Direccion = (isset($_POST["Direccion"])) ? $_POST["Direccion"] : "";
    $Ciudad = (isset($_POST["Ciudad"])) ? $_POST["Ciudad"] : "";
    $CodigoPostal = (isset($_POST["CodigoPostal"])) ? $_POST["CodigoPostal"] : "";
    $Pais = (isset($_POST["Pais"])) ? $_POST["Pais"] : "";
    $FotoPerfil = (isset($_POST["FotoPerfil"])) ? $_POST["FotoPerfil"] : "";
    
    $sentencia = $conexion->prepare("UPDATE usuarios
    SET 
    Nombre = :Nombre,
    Apellido = :Apellido,
    CorreoElectronico = :CorreoElectronico,
    Contrasena = :Contrasena,
    Rol = :Rol,
    FechaNacimiento = :FechaNacimiento,
    Telefono = :Telefono,
    Direccion = :Direccion,
    Ciudad = :Ciudad,
    CodigoPostal = :CodigoPostal,
    Pais = :Pais,
    FotoPerfil = :FotoPerfil
    WHERE UsuarioID = :UsuarioID");

    $sentencia->bindParam(":UsuarioID", $UsuarioID);
    $sentencia->bindParam(":Nombre", $Nombre);
    $sentencia->bindParam(":Apellido", $Apellido);
    $sentencia->bindParam(":CorreoElectronico", $CorreoElectronico);
    $sentencia->bindParam(":Contrasena", $Contrasena);
    $sentencia->bindParam(":Rol", $Rol);
    $sentencia->bindParam(":FechaNacimiento", $FechaNacimiento);
    $sentencia->bindParam(":Telefono", $Telefono);
    $sentencia->bindParam(":Direccion", $Direccion);
    $sentencia->bindParam(":Ciudad", $Ciudad);
    $sentencia->bindParam(":CodigoPostal", $CodigoPostal);
    $sentencia->bindParam(":Pais", $Pais);
    $sentencia->bindParam(":FotoPerfil", $FotoPerfil);
    $sentencia->execute();

    $mensaje = "Registro modificado con éxito.";
    header("location: index.php?mensaje=" . $mensaje);
}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        Editar la información del usuario
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <input type="hidden" name="UsuarioID" value="<?php echo $UsuarioID; ?>">
            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input value="<?php echo $Nombre; ?>" class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="Nombre">
            </div>
            <div class="mb-3">
                <label for="Apellido" class="form-label">Apellido</label>
                <input value="<?php echo $Apellido; ?>" class="form-control" name="Apellido" id="Apellido" aria-describedby="helpId" placeholder="Apellido">
            </div>
            <div class="mb-3">
                <label for="CorreoElectronico" class="form-label">Correo Electrónico</label>
                <input value="<?php echo $CorreoElectronico; ?>" class="form-control" name="CorreoElectronico" id="CorreoElectronico" aria-describedby="helpId" placeholder="Correo Electrónico">
            </div>
            <div class="mb-3">
                <label for="Contrasena" class="form-label">Contraseña</label>
                <input value="<?php echo $Contrasena; ?>" class="form-control" name="Contrasena" id="Contrasena" aria-describedby="helpId" placeholder="Contraseña">
            </div>
            <div class="mb-3">
                <label for="Rol" class="form-label">Rol</label>
                <input value="<?php echo $Rol; ?>" class="form-control" name="Rol" id="Rol" aria-describedby="helpId" placeholder="Rol">
            </div>
            <div class="mb-3">
                <label for="FechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                <input value="<?php echo $FechaNacimiento; ?>" class="form-control" name="FechaNacimiento" id="FechaNacimiento">
            </div>
            <div class="mb-3">
                <label for="Telefono" class="form-label">Teléfono</label>
                <input value="<?php echo $Telefono; ?>" class="form-control" name="Telefono" id="Telefono" aria-describedby=>

            </div>
            
            <button type="submit" class="btn btn-success">actualizar</button>
    <a name="" id="" class="btn btn-primary" href="index.php" role="button">cancelar</a>

    </form>


    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>

<?php include("../../templates/footer.php");?>

