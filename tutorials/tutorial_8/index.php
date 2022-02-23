<?php
    session_start();
    require_once "config.php";
    $sql = "SELECT * FROM user";
    $result = mysqli_query($db, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./font/fontawesome/css/all.min.css">
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <?php  if (isset($_SESSION['message'])) { ?>
                <div class="success">
                    <p> <?php echo $_SESSION['message'];
                            unset($_SESSION['message']); ?></p>
                </div>
            <?php  } ?>

            <div class="clearfix">
                <h1 class="ft-left">User Details</h1>
                <a href="create.php" class="btn ft-right"><i class="fa fa-plus"></i> Add New User</a>
            </div>

            <?php 
                if(mysqli_num_rows($result) > 0){
                    echo '<table class="table table-bordered table-striped">';
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th>#</th>";
                    echo "<th>Name</th>";
                    echo "<th>Email</th>";
                    echo "<th>Action</th>";
                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>";
                        echo '<a href="create.php?id='. $row['id'] .'" class="actionbtn" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil-alt"></span></a>';
                        echo '<a href="delete.php?id='. $row['id'] .'" class="actionbtn" title="Delete Record" name="del" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";                            
                    echo "</table>";
                    mysqli_free_result($result);
                } else {
                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                }
            ?>
         </div>
    </div> 
</body>
</html>