<?php 

    include('register.php');
    require_once "config.php";

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM user WHERE id = " .$id;
        $stmt = mysqli_query($db, $sql);

        if($result = mysqli_fetch_assoc($stmt)){
                $name = $result["name"];
                $email = $result["email"];
                $password = md5($result["password"]);
        } 
    }

    if (isset($_POST['update'])) {
        $id = $_POST['uid'];
    
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password =  $_POST['password'];
        $comfirmpwd =  $_POST['comfirmpwd'];
        $errors = array(); 

        if ($password != $comfirmpwd) {
            array_push($errors, "The two passwords do not match");
        }

        if (count((array)$errors) == 0) {
            $password =  md5($_POST['password']);
        
            mysqli_query($db,"UPDATE user SET name='$username', email='$email',password='$password',updated_at=NOW() WHERE id=$id");
            $_SESSION['message'] = "Data updated successful!"; 
            header('location: show.php');
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
        <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true): ?>
            <nav class="clearfix">
                <div class="ft-left">
                    <h1><?php if(isset($_SESSION['username'])){ 
                        echo $_SESSION['username'];
                    } ?></h1>
                </div>
                <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true): ?>
                <p class="menu"><a href="logout.php">Logout</a></p>
                <?php else: ?>
                <p class="menu"><a href="index.php">Login</a></p> 
                <?php endif; ?>
            </nav>
        <?php endif; ?>

        <form action="" method="post">
            <h2 class="form-ttl">
                <?php   if (isset($_GET['id'])) { 
                            echo "Update User"; 
                        } else { echo "Create User"; } 
                ?>
            </h2>
            <?php include('errors.php'); ?>

            <?php  if (isset($message)) { ?>
                <div class="success">
                    <p> <?php echo $message; ?></p>
                </div>
            <?php  } ?>

            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="input" value="<?php if(isset($_GET['id'])){ echo $name; }?>" required>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="input" value="<?php if(isset($_GET['id'])){ echo $email; } ?>" required>
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="input" required>
            </div>

            <div class="input-group">
                <label for="comfirmpwd">Confirm Password</label>
                <input type="password" name="comfirmpwd" class="input" required>
            </div>

            <input type="hidden" name="uid" value="<?php if(isset($_GET['id'])){ echo $id; } ?>">

            <div class="input-group already">
                <?php if(!isset($_SESSION['username'])){ ?>
                    Already have an account?<a href="index.php" class="btn-reset">Login</a>
                <?php } ?>
            </div>
            
            <div class="input-group">
                <?php if(isset($_GET['id'])) { ?>
                    <input type="submit" name="update" value="Update" class="btn btn-reg">
                <?php } else { ?> 
                    <input type="submit" name="add" value="Create" class="btn btn-reg">
                <?php } ?>
                <?php if(isset($_SESSION['username'])){ ?>
                    <a href="show.php" class="btn-secondary">Cancel</a>
                <?php } ?>
                
            </div>
        </form>
    </div>
    
</body>
</html>