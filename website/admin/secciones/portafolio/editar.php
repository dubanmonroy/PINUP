<?php 

include("../../bd.php");

if(isset($_GET["txtid"])){

    $txtid=(isset($_GET["txtid"]))?$_GET["txtid"]:""; 
    
    $sentencia=$conexion->prepare("SELECT * FROM portafolio WHERE id=:id");
    $sentencia->bindParam(":id",$txtid);
    $sentencia->execute();
    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $titulo=$registro["titulo"];
    $subtitulo=$registro["subtitulo"];
    $imagen=$registro["imagen"];
    $descripcion=$registro["descripcion"];
    $cliente=$registro["cliente"];
    $categoria=$registro["categoria"];
    $url=$registro["url"];

    
     
    
}
if($_POST){
    print_r($_POST);

    $txtid=(isset($_POST["txtid"]))?$_POST["txtid"]:"";
    $titulo=(isset($_POST["titulo"]))?$_POST["titulo"]:"";
    $subtitulo=(isset($_POST["subtitulo"]))?$_POST["subtitulo"]:"";
    $imagen=(isset($_FILES["imagen"]["name"]))?$_FILES["imagen"]["name"]:"";
    $descripcion=(isset($_POST["descripcion"]))?$_POST["descripcion"]:"";
    $cliente=(isset($_POST["cliente"]))?$_POST["cliente"]:"";
    $categoria=(isset($_POST["categoria"]))?$_POST["categoria"]:"";
    $url=(isset($_POST["url"]))?$_POST["url"]:"";

    $sentencia=$conexion->prepare("UPDATE portafolio
    SET 
    
    titulo=:titulo,
    subtitulo=:subtitulo,
    descripcion=:descripcion,
    cliente=:cliente,
    categoria=:categoria,
    url=:url
    WHERE id=:id");

    $sentencia->bindParam(":titulo",$titulo);
    $sentencia->bindParam(":subtitulo",$subtitulo);
    $sentencia->bindParam(":descripcion",$descripcion);

    $sentencia->bindParam(":cliente",$cliente);
    $sentencia->bindParam(":categoria",$categoria);
    $sentencia->bindParam(":url",$url);

    $sentencia->bindParam(":id",$txtid);
    $sentencia->execute();

}

include("../../templates/header.php");?>

<div class="card">
    <div class="card-header">
        producto del portafolio
    </div>
    <div class="card-body">

    <form action="" enctype="multipar/form-data" method="post">

<div class="mb-3">
  <label for="" class="form-label">titulo:</label>
  <input type="text"
    class="form-control" value="<?php echo $titulo;?>" name="titulo" id="titulo" aria-describedby="helpId" placeholder="titulo">
</div>

<div class="mb-3">
  <label for="subtitulo"  class="form-label">subtitulo:</label>
  <input type="text"
    class="form-control" value="<?php echo $subtitulo;?>" name="subtitulo" id="subtitulo" aria-describedby="helpId" placeholder="subtitulo">
</div>

<div class="mb-3">
  <label for="imagen" class="form-label">imagen:</label>
  <?php echo $imagen;?>
  <input type="file" class="form-control" name="imagen" id="imagen" placeholder="imagen" aria-describedby="fileHelpId">
</div>

<div class="mb-3">
  <label for="descripcion" class="form-label">descripcion:</label>
  <input type="text"
    class="form-control" value="<?php echo $descripcion;?>" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="descripcion">
</div>

<div class="mb-3">
  <label for="cliente" class="form-label">cliente</label>
  <input type="text"
    class="form-control" value="<?php echo $cliente;?>" name="cliente" id="cliente" aria-describedby="helpId" placeholder="cliente">
</div>

<div class="mb-3">
  <label for="categoria" class="form-label">categoria</label>
  <input type="text"
    class="form-control" value="<?php echo $categoria;?>" name="categoria" id="categoria" aria-describedby="helpId" placeholder="categoria">
</div>

<div class="mb-3">
  <label for="url" class="form-label">url:</label>
  <input type="text"
    class="form-control" value="<?php echo $url;?>" name="url" id="url" aria-describedby="helpId" placeholder="url del proyecto ">
</div>

<button type="submit" class="btn btn-success">Actualizar</button>
    <a name="" id="" class="btn btn-primary" href="index.php" role="button">cancelar</a>


</form>
        
    </div>
    <div class="card-footer text-muted">
        
    </div>
</div>



<?php include("../../templates/footer.php");?>