<?php
include("conex.php");
?>

<?php include("includes/header.php"); ?>
    
<div class="container p-4">
    <div class="row">
        <div class="col-md-4">
            <?php if(isset($_SESSION['aviso'])) { ?>
                <div class="alert alert-<?= $_SESSION['tipo_aviso'];?> alert-dismissible fade show" role="alert">
                   <?=$_SESSION['aviso']?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                <?php session_unset(); }?>
            <div class="card card-body">
                <form action="guardar.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" id="" class="form-control" placeholder="Ingrese su nombre" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="text" name="correo" id="" class="form-control" placeholder="Ingrese su correo">
                    </div>
                    <div class="form-group">
                        <input type="date" name="fecha" id="" class="form-control" value="<?php echo date("Y-m-d")?>">
                    </div>
                    <div class="form-group">
                        <textarea name="mensaje"  rows="4" class="form-control" placeholder="Deje aqui su recomendacion"></textarea>
                    </div>
                    <input type="submit" value="Enviar" class="btn btn-success btn-block" name="guardar_mensaje">
                </form>
            </div>
        </div>
        <div class="col-md-8">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <!--CABEZERA DE LA TABLA-->
                            <th>Nombres</th>
                            <th>Correos</th>
                            <th>Fechas</th>
                            <th>Mensajes</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $query= "SELECT * FROM mensajes";
                            $resultados= mysqli_query($conn, $query);

                            while($row=mysqli_fetch_array($resultados)){?>
                                <tr>
                                    <!--Muestro la tabla-->
                                    <td><?php echo $row['nombre'] ?></td>
                                    <td><?php echo $row['correo'] ?></td>
                                    <td><?php echo $row['fecha'] ?></td>
                                    <td><?php echo $row['mensaje'] ?></td>

                                    <!--Botones esditar y eliminar -->
                                    <td ><a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-primary">Editar</a>
                                        <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
        </div>
    </div>
</div>
<!--SI TE FIJAS EN ALGUNAS PARTES VERAS QUE ABRO Y CIERRO LLAVES JUNTO CON LAS ETIQUETAS DE PHP, ESO ES PARA QUE PUEDA INSERTAR UN CODIGO DE PHP Y HTML EN EL MISMO BLOQUE SIN CREAR CONFLICTOS -->
<?php include("includes/footer.php"); ?>