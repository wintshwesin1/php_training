<?php 
  
    require_once "config.php";

    if ($_POST) {
        $email = $_POST['email'];
        $token = $_POST['reset_link_token'];
        $password = $_POST['password'];
        $comfirmpwd = $_POST['comfirmpwd'];

        $query    = mysqli_query($db, "SELECT * FROM user WHERE reset_link_token='$token' and email='$email'");
        $row      = mysqli_num_rows($query);
        $errors = array(); 

        if ($password != $comfirmpwd) {
            array_push($errors, "The two passwords do not match");
        }

        if (count((array)$errors) == 0 && $row) {
            $password =  md5($_POST['password']);
        
            mysqli_query($db,"UPDATE user SET password='$password',reset_link_token=NULL ,exp_date=NULL,updated_at=NOW() WHERE email='$email'");
            $message = "Password updated successful!"; 
            header('location: index.php');
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
<?php
    if($_GET['email'] && $_GET['token'])
    {
        $email = $_GET['email'];
        $token = $_GET['token'];
        $query = mysqli_query($db,"SELECT * FROM user WHERE reset_link_token='$token' and email='$email'");
        $curDate = date("Y-m-d H:i:s");
        if (mysqli_num_rows($query) > 0) {
            $row= mysqli_fetch_array($query);
            if ($row['exp_date'] >= $curDate) { ?>

            <form action="" method="post">
                <h1 class="form-ttl">Forgot Password</h1>
                <?php include('errors.php'); ?>
                <?php  if (isset($message)) { ?>
                    <div class="success">
                        <p> <?php echo $message; ?></p>
                    </div>
                <?php  } ?>

                <input type="hidden" name="email" value="<?php echo $email;?>">
                <input type="hidden" name="reset_link_token" value="<?php echo $token;?>">

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
    <?php   } else { ?>
            <div class="error">
                <p>This forget password link has been expired</p>
            </div>

    <?php } } else { ?>
                    <div class="error">
                        <p>This forget password link has been expired</p>
                    </div>
    <?php   } } ?>
</div>
</body>
</html>