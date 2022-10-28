<?php
echo $sut_id = $_POST['user_id'];
echo $fname = $_POST['f_name'];
echo $lname = $_POST['l_name'];
echo $username = $_POST['username'];
echo $role = $_POST['role'];

include "config.php";
$sql = "UPDATE `user` SET first_name='{$fname}', last_name='{$lname}',username='{$username}',role='{$role}'WHERE `user_id`={$sut_id}";
$result = mysqli_query($conn, $sql) or die("Query Unsuccfull");

header("Location:users.php");
mysqli_close($conn);
