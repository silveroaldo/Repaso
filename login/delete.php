<?php @include 'config.php';

    //lo que hace la condicion es verificar si se le esta mandando un id que si exista
    if(isset($_GET['id'])){
        //pasa a ejcutar la consulta y elimina
        $id = $_GET['id'];
        $query= "DELETE FROM user_form WHERE id = $id";
        $resultado=mysqli_query($conn, $query);
        if(!$resultado){
            die("Consulata fallida");
        }

        header("Location: view_users.php");
    }
    
    ?>
    