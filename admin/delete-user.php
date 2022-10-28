<?php
 include "config.php";
session_start();
if( $_SESSION["user_role"]=='0'){
    header("Location:post.php");
} 
  
 echo $sut_id=$_GET['rd'];
 $sql="DELETE FROM `user` WHERE user_id = {$sut_id}";
$result=mysqli_query($conn,$sql) or die("Query Unsuccfull");


 header("Location:http:users.php");
  mysqli_close($conn);


?>