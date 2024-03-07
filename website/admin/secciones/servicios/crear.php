<?php 
include("../../bd.php");

if($_POST){
// recesionamos los valores del formulario 
    $conexion=new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);


    $Icono=(isset($_POST["Icono"]))?$_POST["Icono"]:"";
    $Titulo=(isset($_POST["Titulo"]))?$_POST["Titulo"]:"";
    $descripcion=(isset($_POST["descripcion"]))?$_POST["descripcion"]:"";

    $sentencia=$conexion->prepare("INSERT INTO `servicios` (`id`, `icono`, `titulo`, `descripcion`) 
    VALUES (NULL, :icono, :titulo, :descripcion);");

    $sentencia->bindParam(":icono",$Icono);
    $sentencia->bindParam(":titulo",$Titulo);
    $sentencia->bindParam(":descripcion",$descripcion);

    $sentencia->execute();
    $mensaje="registro agregado con exito.";
    header("location:index.php?mensaje=".$mensaje);



    
}

include("../../templates/header.php");?>

<div class="card">
    <div class="card-header">
        crear servicios
    </div>
    <div class="card-body">

    <form action=""enctype="multipart/form-data" method="post">
     
    <div class="mb-3">
      <label for="" class="form-label">Icono</label>
      <input type="text"
        class="form-control" name="Icono" id="Icono" aria-describedby="helpId" placeholder="Icono">
      
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Titulo</label>
      <input type="text"
        class="form-control" name="Titulo" id="Titulo" aria-describedby="helpId" placeholder="Titulo">
      
    </div>

    <div class="mb-3">
      <label for="" class="form-label">descripcion</label>
      <input type="text"
        class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="descripcion">
      
    </div>
    <button type="submit" class="btn btn-success">Agregar</button>
    <a name="" id="" class="btn btn-primary" href="index.php" role="button">cancelar</a>

    </form>


    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>

<?php include("../../templates/footer.php");?>