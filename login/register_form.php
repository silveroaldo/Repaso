<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name =  $_POST['name'];
   $email =  $_POST['email'];
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register form</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Resgistrate</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="Ingrese su nombre">
      <input type="email" name="email" required placeholder="Ingrese su correo">
      <input type="password" name="password" required placeholder="Ingrese su contraseña">
      <input type="password" name="cpassword" required placeholder="Confirmar contraña">
      <select name="user_type" style="visibility: hidden">
         <option value="user">user</option>
         <option value="admin">admin</option>
      </select>
      <input type="submit" name="submit" value="Registrarse" class="form-btn">
      <p>¿Ya tienes una cuenta? <a href="login_form.php">Iniciar  sesion</a></p>
   </form>

</div>

</body>
</html>