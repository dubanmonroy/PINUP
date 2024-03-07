<?php 
include("../../bd.php");

if($_POST){
    // Recibimos los valores del formulario
    $conexion = new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);

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
    $Pais = (isset($_POST["Pais"])) ? $_POST["Pais"] : "";
    $Codigopostal = (isset($_POST["Codigopostal"])) ? $_POST["Codigopostal"] : "";

    $sentencia = $conexion->prepare("INSERT INTO `usuarios` (`UsuarioID`, `Nombre`, `Apellido`, `CorreoElectronico`, `Contrasena`, `Rol`, `FechaNacimiento`, `Telefono`, `Direccion`, `Ciudad`, `Pais`, `Codigopostal`) 
    VALUES (:UsuarioID, :Nombre, :Apellido, :CorreoElectronico, :Contrasena, :Rol, :FechaNacimiento, :Telefono, :Direccion, :Ciudad, :Pais, :Codigopostal);");

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
    $sentencia->bindParam(":Pais", $Pais);
    $sentencia->bindParam(":Codigopostal", $Codigopostal);

    $sentencia->execute();
    $mensaje = "Registro agregado con éxito.";
    header("location: index.php?mensaje=" . $mensaje);
}

include("../../templates/header.php");
?>

<div class="card">
    <div class="card-header">
        Crear Usuario
    </div>
    <div class="card-body">
        <form action="" enctype="multipart/form-data" method="post">
            <div class="mb-3">
                <label for="UsuarioID" class="form-label">UsuarioID</label>
                <input type="text" class="form-control" name="UsuarioID" id="UsuarioID" placeholder="UsuarioID">
            </div>

            <div class="mb-3">
                <label for="Nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="Nombre" id="Nombre" placeholder="Nombre">
            </div>

            <div class="mb-3">
                <label for="Apellido" class="form-label">Apellido</label>
                <input type="text" class="form-control" name="Apellido" id="Apellido" placeholder="Apellido">
            </div>

            <div class="mb-3">
                <label for="CorreoElectronico" class="form-label">Correo Electrónico</label>
                <input type="email" class="form-control" name="CorreoElectronico" id="CorreoElectronico" placeholder="Correo Electrónico">
            </div>

            <div class="mb-3">
                <label for="Contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="Contrasena" id="Contrasena" placeholder="Contraseña">
            </div>

            <div class="mb-3">
                <label for="Rol" class="form-label">Rol</label>
                <input type="text" class="form-control" name="Rol" id="Rol" placeholder="Rol">
            </div>

            <div class="mb-3">
                <label for="FechaNacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" name="FechaNacimiento" id="FechaNacimiento">
            </div>

            <div class="mb-3">
                <label for="Telefono" class="form-label">Teléfono</label>
                <input type="tel" class="form-control" name="Telefono" id="Telefono" placeholder="Teléfono">
            </div>

            <div class="mb-3">
                <label for="Direccion" class="form-label">Dirección</label>
                <input type="text" class="form-control" name="Direccion" id="Direccion" placeholder="Dirección">
            </div>

            <div class="mb-3">
                <label for="Ciudad" class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="Ciudad" id="Ciudad" placeholder="Ciudad">
            </div>

            <div class="mb-3">
                <label for="Pais" class="form-label">País</label>
                <input type="text" class="form-control" name="Pais" id="Pais" placeholder="País">
            </div>

            <div class="mb-3">
                <label for="Codigopostal" class="form-label">Código Postal</label>
                <input type="text" class="form-control" name="CódigoPostal" id="CódigoPostal" placeholder="CódigoPostal">
            

            </div>
    <button type="submit" class="btn btn-success">Agregar</button>
    <a name="" id="" class="btn btn-primary" href="index.php" role="button">cancelar</a>

    </form>


    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>

<?php include("../../templates/footer.php");?>
