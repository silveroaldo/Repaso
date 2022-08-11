<?php @include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>view users</title>
</head>
<body>
<div class="col-md-8 ">
    <table class="table table-bordered">
        <thead>
            <tr>
                <!--CABEZERA DE LA TABLA-->
                <th>Nombre</th>
                <th>Correo</th>
                <th>Tipo de Usuario</th>
                <th>Opciones</th>
            </tr>
         </thead>
        <tbody>
            <?php
                $query= "SELECT * FROM user_form order by id";
                $resultados= mysqli_query($conn, $query);

                while($row=mysqli_fetch_array($resultados)){?>
                    <tr>
                        <!--Muestro la tabla-->
                        <td><?php echo $row['name'] ?></td>
                        <td><?php echo $row['email'] ?></td>
                        <td><?php echo $row['user_type'] ?></td>

                        <!--Botones esditar y eliminar -->
                        <td ><a href="editar.php?id=<?php echo $row['id']?>" class="btn btn-primary">Editar</a>
                        <a href="eliminar.php?id=<?php echo $row['id']?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>