<?php

echo $c_at = $_POST['cat_name'];


include "config.php";
$sql = "UPDATE `category` SET category_name=' $c_at'";
$result = mysqli_query($conn, $sql) or die("Query Unsuccfull");

header("Location:category.php");
mysqli_close($conn);



?>