<?php

include "config.php"; 


$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$user = mysqli_real_escape_string($conn, $_POST['user']);
$password = mysqli_real_escape_string($conn, md5($_POST['password']));
$role = mysqli_real_escape_string($conn, $_POST['role']);
$sql = "SELECT username FROM  user WHERE username = '{$user}'";
$result = mysqli_query($conn, $sql) or die("Quary faild.");

if (mysqli_num_rows($result) > 0) {
    echo "<p style='color:red;text-aling:cenetr;margin: 10px 0;'> User name already Exists.</p>";
} else {
    $sqli1 = "INSERT INTO user (first_name,last_name,username,password,role)
      VALUES ('{$fname}','{$lname}','{$user}','{$password}','{$role}')";
    if (mysqli_query($conn, $sqli1)) {
        header("Location:users.php");
    }
}
