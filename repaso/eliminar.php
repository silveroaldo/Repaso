<?php include("conex.php");

    //lo que hace la condicion es verificar si se le esta mandando un id que si exista
    if(isset($_GET['id'])){
        //pasa a ejcutar la consulta y elimina
        $id = $_GET['id'];
        $query= "DELETE FROM mensajes WHERE id = $id";
        $resultado=mysqli_query($conn, $query);
        if(!$resultado){
            die("Consulata fallida");
        }
        $_SESSION['aviso']="Registro eliminado";
        $_SESSION['tipo_aviso']="danger";
        header("Location: index.php");
    }
    
    ?>
    
    