<?php
    session_start();
    require 'config.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        mysqli_query($db, "DELETE FROM user WHERE id=$id");
        $_SESSION['message'] = "Data deleted!"; 
        header('location: index.php');
    }
?>