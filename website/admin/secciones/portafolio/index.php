<?php 
include("../../bd.php");

$sentencia=$conexion->prepare("SELECT * FROM portafolio ");
$sentencia->execute();
$lista_portafolio=$sentencia->fetchALL(PDO::FETCH_ASSOC);

include("../../templates/header.php");?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">agregar registro</a>

    </div>
    <div class="card-body">

    <div class="table-responsive-sm">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">titulo</th>
                    
                    <th scope="col">imagen</th>
                    <th scope="col">descripcion</th>
                    <th scope="col">cliente&cliente</th>

                    
                    <th scope="col">acciones</th>
                    

                </tr>
            </thead>
            <tbody>
                
                <?php foreach($lista_portafolio as $registros){?>
                <tr class="">
                    <td scope="col"><?php echo $registros['id'];?></td>
                    <td scope="col">
                        <h6><?php echo $registros['titulo'];?></h6>
                        <?php echo $registros['subtitulo'];?>
                        <br>- <?php echo $registros['url'];?>
                        
                </td>
                    <td scope="col"><?php echo $registros['imagen'];?></td>
                    <td scope="col"><?php echo $registros['descripcion'];?></td>
                    <td scope="col">
                        - <?php echo $registros['categoria'];?>  
                        <br>- <?php echo $registros['cliente'];?>
                </td>
                    
                    <td scope="col"><a name=""id="" class="btn btn-info" href="editar.php?txtid=<?php echo $registros["id"];?>" role="button">Editar</a>
                       |
                       <a name=""id="" class="btn btn-danger" href="index.php?txtid=<?php echo $registros["id"];?>" role="button">eliminar</a>
                        
                </tr>
                <?php }?>
                
            </tbody>
        </table>
    </div>
    
       
    </div>
   
</div>




<?php include("../../templates/footer.php");?>