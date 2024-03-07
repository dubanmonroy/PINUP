<?php 

include("../../bd.php");


if(isset($_GET["txtid"])){
  
    $txtid=(isset($_GET["txtid"]))?$_GET["txtid"]:"";
    $sentencia=$conexion->prepare("DELETE FROM servicios WHERE id=:id");
    $sentencia->bindParam(":id",$txtid);
    
    $sentencia->execute();

}

//seleccionar registros
$conexion=new PDO("mysql:host=$servidor;dbname=$basededatos", $usuario, $contraseña);

$sentencia=$conexion->prepare("SELECT * FROM`servicios` ");
$sentencia->execute();
$lista_servicios=$sentencia->fetchALL(PDO::FETCH_ASSOC);


include("../../templates/header.php");?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">agregar registro</a>
        
    </div>
    <div class="card-body">

    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Icono</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">accion</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista_servicios as $registros){?>
                <tr class="">
                    <td ><?php echo $registros['id'];?></td>
                    <td><?php echo $registros["icono"];?></td>
                    <td><?php echo $registros["titulo"];?></td>
                    <td><?php echo $registros["descripcion"];?></td>
                    <td>
                       <a name=""id="" class="btn btn-info" href="editar.php?txtid=<?php echo $registros["id"];?>" role="button">Editar</a>
                       |
                       <a name=""id="" class="btn btn-danger" href="index.php?txtid=<?php echo $registros["id"];?>" role="button">eliminar</a>
                        
                    </td>
                </tr>
                <?php }?>
                
            </tbody>
        </table>
    </div>
    
       
    </div>
    
</div>



<?php include("../../templates/footer.php");?>