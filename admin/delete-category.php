<?php
 include "config.php";

 echo $sut_id=$_GET['rd'];
 $sql="DELETE FROM `category` WHERE category_id = {$sut_id}";
$result=mysqli_query($conn,$sql) or die("Query Unsuccfull");


 header("Location:http:category.php");
  mysqli_close($conn);


?>