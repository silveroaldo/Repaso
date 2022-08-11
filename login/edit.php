<?php 
@include 'config.php';

    if(isset($_GET['id'])){
      
        $id = $_GET['id'];
        $query= "SELECT * FROM user_form WHERE id = $id";
        $resultado=mysqli_query($conn, $query);
        if(mysqli_num_rows($resultado)==1){
        	
        	$row=mysqli_fetch_array($resultado);
        	$name=$row['name'];
        	$email=$row['email'];
        	$user_type=$row['user_type'];
        	$password=$row['password'];
        }
    }

    if(isset($_POST['actualizar'])){
        $id=$_GET['id'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $user_type=$_POST['user_type'];
        $password=$_POST['password'];

        $sql= "UPDATE user_form set name='$name', email='$email',user_type='$user_type', password='$password' WHERE id = $id";
        
        mysqli_query($conn, $sql); 
        header("Location: view_users.php");
    }
?>

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
<div class="container p-4" >
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id'];?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="name" id="" value="<?php echo $name;?>" class="form-control" placeholder="Edita el nombre">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" id="" value="<?php echo $email;?>"class="form-control" placeholder="Edita el nombre">
                    </div>
                    <div class="form-group">
                        <input type="text" name="user_type" id="" value="<?php echo $user_type;?>"class="form-control" placeholder="Edita el nombre">
                    </div>
                    <div class="form-group">
                        <input type="text" name="password" id="" value="<?php echo $password;?>"class="form-control" placeholder="Edita el nombre">
                    </div>
                    
                    <button class="btn btn-success" name="actualizar">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
