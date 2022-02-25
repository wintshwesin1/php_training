<?php 

    session_start();
    require_once "config.php";

    if (isset($_POST['login'])) {
    
        $username = $_POST['username'];
        $password =  md5($_POST['password']);
        $errors = array(); 

        $sql = "Select * from user where name = '$username' and password = '$password'";  
        $result = mysqli_query($db, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result); 

        if($count == 1){  
            $_SESSION['login'] = true;
            $_SESSION['username']=$row['name'];
            header("location: show.php");  
        }  
        else{  
            array_push($errors, "Login failed. Invalid username or password.");  
        }     
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 8</title>
 
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="container">
        <form action="" method="post">
            <h1 class="form-ttl">Login Form</h1>
            <?php include('errors.php'); ?>
            
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="input" value="<?php if(isset($_GET['id'])){ echo $name; }?>" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="input" required>
            </div>

            <div class="input-group">
                <a href="reset-password.php" class="btn-reset">Reset Password?</a>
                <a href="create.php" class="btn-reset ft-right">Create Account</a>
            </div>

            <div class="input-group">
                <input type="submit" name="login" value="Login" class="btn btn-log">
            </div>
        </form>
    </div>
    
</body>
</html>