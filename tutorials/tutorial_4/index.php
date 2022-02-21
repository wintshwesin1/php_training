<?php

    session_start();
    if (isset($_POST['submit'])) {
        $message="";
        $_SESSION["username"] = $_POST['username'];
        $_SESSION["pw"] = $_POST['password'];
        if ($_SESSION["username"] == 'admin' and $_SESSION["pw"] == 'admin123') {
            header("Location:login.php");
        } else {
            $message = "Invalid Username or Password!";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial 4</title>
    
    <style>
        .container{
            text-align: center;
            width: 404px;
            margin: 150px auto;
            color:#333;
        }

		.form{
			border: 2px solid #333333;
			text-align: center;
			width:400px;
			border-radius: 5px;
			padding:20px;
		}

		input{
			margin-bottom:20px;
            padding:5px 10px;
            border-radius:5px;
            border:1px solid #00000090;
		}

        label{
            margin-right:20px;
        }

        .message{
            margin-bottom:20px;
            color:red;
        }

        .btn{
            padding:8px 10px;
            background-color:#1CB6E0;
            border: 1px solid #33333390;
            width: 75px;
            border-radius:5px;
        }

    </style>
</head>
<body>
    <div class="container">
		<form action="." method="post" class="form" >
            <h3>Login</h3>

            <div class="message">
                <?php if(!empty($message)){ echo $message ; } ?>
            </div>

			<label for="username">Username:</label>
			<input name="username" type="text" ><br>
				
			<label for="password">Password:</label>
			<input name="password" type="password" ><br>
				
			<input type="submit" value="Login" name="submit" class="btn">     
		</form>
    </div>
  
</body>
</html>