<?php 
 include "config.php";
  $id = $_GET['rd'];
 $stu = $_GET['sut'];
 $sul="UPDATE post SET status=$stu WHERE post_id=$id"; 
 mysqli_query($conn,$sul);
 header("Location:post.php");
mysqli_close($conn);


?>