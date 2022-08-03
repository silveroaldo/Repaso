<?php

include("conex.php");

/*Si te fijas en el formulario de que esta en el index.php veras que el boton de enviar tiene un nombre que es guardar_mensaje, y lo que hace la condicion de abajo es vetificar si se apreto o no el boton, si de apreto trae los valores del formulario y los guarda en las variables de mas abajo y despues pasa a ejecutar la consulta en insertar los datos en la base de datos*/
if(isset($_POST['guardar_mensaje']))
$nombre= $_POST['nombre'];
$correo= $_POST['correo'];
$fecha= $_POST['fecha'];
$mensaje= $_POST['mensaje'];

 
$sql= "INSERT INTO mensajes(nombre, correo, fecha, mensaje) VALUES('$nombre','$correo', '$fecha', '$mensaje')";
$resultado=mysqli_query($conn, $sql);
if(!$resultado){
    die("Consulata fallida");
}
$_SESSION['aviso']="Registro guardado exitosamente";
$_SESSION['tipo_aviso']="success";
header("Location: index.php");
?>