<?php
session_start();

require 'config.php';

$errors = array(); 

if (isset($_POST['add'])) {
    
    $username = $_POST['username'];
    $email =  $_POST['email'];
    $password =  $_POST['password'];
    $comfirmpwd =  $_POST['comfirmpwd'];

    if ($password != $comfirmpwd) {
        array_push($errors, "The two passwords do not match");
    }

    $user_check_query = "SELECT * FROM user WHERE name='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { 
        if ($user['name'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    if (count((array)$errors) == 0) {
        $password = md5($password);
        
        $query = "INSERT INTO user (name, email, password) 
                   VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        if(isset($_SESSION['username'])) {
            $_SESSION['message'] = "User created successful!";
            header('location: show.php');
        } else {
            $message = "User created successful!";
        }

    }
}
