<?php
  include "config.php";
  if(empty($_FILES['new-image']['name'])){
    $file_name = $_POST['old_image'];
  }else{
    $file_name = $_POST['old_image'];
    $errors = array();
    $file_name= $_FILES['new-image']['name'];
    $file_size= $_FILES['new-image']['size'];
    $file_tmp= $_FILES['new-image']['tmp_name'];
    $file_type= $_FILES['new-image']['type'];
     $file_ext = end(explode('.',$file_name));

    $extensions = array("jpeg","jpg","png");
    if(in_array($file_ext,$extensions)==false){
        $errors[] = "This extension file ont allowed";
    }
    if( $file_size > 2097152){
        $errors[] = "file size must 2MB or lower.";

    }
    if(empty($errors)== true){
        move_uploaded_file($file_tmp,"upload/".$file_name);
    }else{
        print_r($errors);
      
    }

  }

 $id=$_POST['post_id'];
 $title=$_POST['post_title'];
 $postdesc=$_POST['postdesc'];
 $cat=$_POST['category'];
$sql="UPDATE post SET title='{$title}',description='{$postdesc}',category='{$cat}',post_img='{$file_name}' WHERE post_id='{$id}';";
if($_POST['old_category']!= $_POST['category']){
  $sql .="UPDATE `category` SET post=post - 1 WHERE category_id='{$_POST['old_category']}';";
  $sql .="UPDATE `category` SET post=post + 1 WHERE category_id='{$_POST['category']}';";
}


$result= mysqli_multi_query($conn,$sql);
header("Location:post.php");
 mysqli_close($conn);
?>