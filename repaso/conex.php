<?php
//este es mi manera de conectar con la base de datos, es casi lo mismo
//que el metodo que el profe usa solo que en poco mas resumido
session_start();//esto es unicamente para los colores de los mensajes 
$conn=mysqli_connect(
   'localhost',
   'root',
   '',
   'repaso'
);

?>