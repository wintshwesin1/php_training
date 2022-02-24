<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
     
    require 'vendor/autoload.php';

    require_once "config.php";

    if ($_POST) {
    
        $email = $_POST['email'];
        $errors = array(); 

        $sql = "Select * from user where email = '$email'";  
        $result = mysqli_query($db, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result); 

        if($count == 1){  
            $email = $row['email'];
            $pwd = $row['password'];
           
            $mail = new PHPMailer(true);
 
            try {
                $mail->SMTPDebug = 0;                                       
                $mail->isSMTP();                                            
                $mail->Host       = 'smtp.gmail.com;'; 
                $mail->SMTPAuth   = true;                                   
                $mail->Username   = 'alibaba2252022@gmail.com';                    
                $mail->Password   = 'Alibaba@225';                              
                $mail->SMTPSecure = 'tls';                                  
                $mail->Port       = 587;                                    
            
                $mail->setFrom('alibaba2252022@gmail.com', 'Alibaba Alibaba');
                $mail->addAddress($email);

                $message = "<p>Please click the link below to reset your password</p>";
                $message .= "<a href='http://localhost:8080/BIB%20PHP%20Tutorials/tutorials/tutorial_8/forgot-password.php?email=$email'>";
                $message .= "Reset password";
                $message .= "</a>";
            
                
                $mail->isHTML(true);                                  
                $mail->Subject = "Forgot Password";
                $mail->Body    =  $message;
            
                $mail->send();
                $message = 'Your Password Reset link has been sent on your Email.';
            } catch (Exception $e) {
               array_push($errors, "Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
            }
        }  
        else{  
            array_push($errors, "Email not found!");  
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
                <label for="email">Enter Email Address To Send Password Link:</label>
                <input type="email" name="email" class="input" value="<?php if(isset($_GET['id'])){ echo $name; }?>" required>
            </div>

            <div class="input-group">
                <input type="submit" name="login" value="Reset Password" class="btn btn-reg">
            </div>
        </form>
  </div>
</body>
</html>