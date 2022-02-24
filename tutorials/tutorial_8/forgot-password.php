<?php 
  
    require_once "config.php";
    $email = $_GET['email'];

    if ($_POST) {

        $password =  $_POST['password'];
        $comfirmpwd =  $_POST['comfirmpwd'];
        $errors = array(); 

        if ($password != $comfirmpwd) {
            array_push($errors, "The two passwords do not match");
        }

        if (count((array)$errors) == 0) {
            $password =  md5($_POST['password']);
        
            mysqli_query($db,"UPDATE user SET password='$password',updated_at=NOW() WHERE email='$email'");
            $message = "Password updated successful!"; 
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="css/style.css">
   
</head>
<body>
  <div class="container">
        <form action="" method="post">
            <h1 class="form-ttl">Forgot Password</h1>
            <?php include('errors.php'); ?>
            <?php  if (isset($message)) { ?>
                <div class="success">
                    <p> <?php echo $message; ?></p>
                </div>
            <?php  } ?>
            <div class="input-group">
                <label for="password">Enter New Password:</label>
                <input type="password" name="password" class="input" required>
            </div>

            <div class="input-group">
                <label for="comfirmpwd">Re-Enter New Password:</label>
                <input type="password" name="comfirmpwd" class="input" required>
            </div>

            <div class="input-group">
                <input type="submit" name="reset" value="Reset Password" class="btn btn-reg">
            </div>
        </form>
  </div>
</body>
</html>