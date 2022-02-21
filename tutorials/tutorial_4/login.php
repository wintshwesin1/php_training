<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Login</title>
</head>
<body>

<?php
    if($_SESSION["username"]) {
?>
    Welcome <?php echo $_SESSION["username"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.
<?php
    } else echo "<h1>Please login first .</h1>";
?>
</body>
</html>