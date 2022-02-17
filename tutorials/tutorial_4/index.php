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
		}

    </style>
</head>
<body>
    <div class="container">
			<form action="login.php" method="post" class="form" >
				<label for="username">Username:</label>
				<input name="username" type="text" value="<?php if(isset($_COOKIE["username"])) { echo $_COOKIE["username"]; } ?>"><br>
				
				<label for="password">Password:</label>
				<input name="password" type="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>"><br>
				
				<input type="checkbox" name="remember" /> Remember me <br>
				
				<input type="submit" value="Login">      
			</form>
    </div>
  
</body>
</html>