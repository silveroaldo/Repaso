<?php 
include("conex.php");
 //lo que hace la condicion es vericar si se le esta mandando un id que si exista
    if(isset($_GET['id'])){
        //pasa a ejcutar la consulta y elimina
        $id = $_GET['id'];
        $query= "SELECT * FROM mensajes WHERE id = $id";
        $resultado=mysqli_query($conn, $query);
        if(mysqli_num_rows($resultado)==1){
        	echo "tu puedes editat";
        	$row=mysqli_fetch_array($resultado);
        	$nombre=$row['nombre'];
        	$correo=$row['correo'];
        	$fecha=$row['fecha'];
        	$mensaje=$row['mensaje'];
        }
    }

    if(isset($_POST['actualizar'])){
        $id=$_GET['id'];/*se obtiene el id por el metodo get ya que asi se obtuvo al principio del codigo y es el unico que no se modifica los valores a actualizar se obtiene por el motodo post ya en en formulario de actualizacion se envian asi los datos */
        $nombre=$_POST['nombre'];
        $correo=$_POST['correo'];
        $fecha=$_POST['fecha'];
        $mensaje=$_POST['mensaje'];

        $sql= "UPDATE mensajes set nombre='$nombre', correo='$correo',fecha='$fecha', mensaje='$mensaje' WHERE id = $id";
        //la variable $conn de abajo viene de la conex.php ya que la incluimos al principio
        mysqli_query($conn, $sql); 
        header("Location: index.php");//una vez actualizado redirecciona inmediatamente a index.php

        $_SESSION['aviso']="Registro actualizado";//es el color y la descripcion del mensaje, es opcional :)
$_SESSION['tipo_aviso']="success";//color del mensaje
    }
?>



<?php include("includes/header.php")?>


<!-- formulario de actualizacion de los datos -->
<!--Se me olvidaba lo mas importante, es que todo lo de arriba se ejecuta recien cuando de das al boton de actualizar, lo unico que de ejecuta al principio son las primeras lineas 17 lineas de codigo el cual es el que trae los datos al formulario, de la line 19 al 34 se ejeuta recien al precionar el boton de actualizar-->

<div class="container p-4" >
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="editar.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" id="" value="<?php echo $nombre;?>" class="form-control" placeholder="Edita el nombre">
                    </div>
                    <div class="form-group">
                        <input type="text" name="correo" id="" value="<?php echo $correo;?>"class="form-control" placeholder="Edita el nombre">
                    </div>
                    <div class="form-group">
                        <input type="date" name="fecha" id="" value="<?php echo date('Y-m-d');?>" class="form-control" placeholder="Edita el nombre">
                    </div>
                    <div class="form-group">
                        <textarea name="mensaje" id="" rows="4" class="form-control"><?php echo $mensaje;?></textarea>
                    </div>
                    <button class="btn btn-success" name="actualizar">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php")?>