<?php 
include("../../bd.php");

$conexion=new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);

if(isset($_GET["txtid"])){
  //recuperar los datos del id correspondiente
    $txtid=(isset($_GET["txtid"]))?$_GET["txtid"]:"";

    $sentencia=$conexion->prepare("SELECT * FROM servicios WHERE id=:id");
    $sentencia->bindParam(":id",$txtid);   
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $icono=$registro["icono"];
    $titulo=$registro["titulo"];
    $descripcion=$registro["descripcion"];


}

if($_POST){
    print_r($_POST);
// recepciona los valores del formulario
    $txtid=(isset($_POST["txtid"]))?$_POST["txtid"]:"";
    $icono=(isset($_POST["icono"]))?$_POST["icono"]:"";
    $titulo=(isset($_POST["titulo"]))?$_POST["titulo"]:"";
    $descripcion=(isset($_POST["descripcion"]))?$_POST["descripcion"]:"";
    
    $sentencia=$conexion->prepare("UPDATE servicios
    SET 
    icono=:icono,
    titulo=:titulo,
    descripcion=:descripcion
    WHERE id=:id");

    $sentencia->bindParam(":icono",$icono);
    $sentencia->bindParam(":titulo",$titulo);
    $sentencia->bindParam(":descripcion",$descripcion);
    $sentencia->bindParam(":id",$txtid);
    $sentencia->execute();

    $mensaje="registro modificado con exito.";
    header("location:index.php?mensaje=".$mensaje);

}

include("../../templates/header.php");?>


<div class="card">
    <div class="card-header">
        editar la informacion del servicios
    </div>
    <div class="card-body">

    <form action=""enctype="multipart/form-data" method="post">
     
    <div class="mb-3">
      <label for="" class="form-label">id:</label>
      <input readonly value="<?php echo $txtid;?>"
        class="form-control" name="txtid" id="txtid" aria-describedby="helpId" placeholder="id">
    </div>


    <div class="mb-3">
      <label for="" class="form-label">Icono</label>
      <input value="<?php echo $icono;?>"
        class="form-control" name="icono" id="Icono" aria-describedby="helpId" placeholder="icono">
      
    </div>

    <div class="mb-3">
      <label for="" class="form-label">titulo</label>
      <input value="<?php echo $titulo;?>"
        class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="titulo">
      
    </div>

    <div class="mb-3">
      <label for="" class="form-label">descripcion</label>
      <input value="<?php echo $descripcion;?>"
        class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="descripcion">
      
    </div>
    <button type="submit" class="btn btn-success">actualizar</button>
    <a name="" id="" class="btn btn-primary" href="index.php" role="button">cancelar</a>

    </form>


    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>

<?php include("../../templates/footer.php");?>

