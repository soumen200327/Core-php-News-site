<?php
include "config.php";

 $sut_id=$_GET['rd'];
$cat_id=$_GET['catid'];
$sql1="SELECT * FROM post WHERE post_id='{$sut_id}'";
$result1=mysqli_query($conn,$sql1) or die("Query is failde in sql1");
$row=mysqli_fetch_assoc($result1);
// echo "<pre>";
// print_r($row);
// echo "</pre>";
// die();
  unlink("upload/".$row['post_img']);

 $sql="DELETE FROM `post` WHERE post_id = {$sut_id};";
 $sql .="UPDATE `category` SET post=post - 1 WHERE category_id='{$cat_id}'";

$result=mysqli_multi_query($conn,$sql) or die("Query Unsuccfull");


header("Location:http:post.php");
 mysqli_close($conn);


?>