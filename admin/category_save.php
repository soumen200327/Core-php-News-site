<?php
  include "config.php";
 
 $c_at=mysqli_real_escape_string($conn, $_POST['cat']);
 $sqli="INSERT INTO category (category_name)  VALUES ('{$c_at}')"; 
 mysqli_query($conn,$sqli) or die("Query Unsuccfull");


 header("Location:http:category.php");
  mysqli_close($conn);

?>