
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="images/news.jpg"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <?php
               include "config.php";
               if(isset( $_GET['cid'])){
                $cat_id=$_GET['cid'];
               }
               
                 $sql1= "SELECT * FROM category WHERE post > 0"; 
                     $ruselt1 = mysqli_query($conn, $sql1) or die("Query failed.");
                     if (mysqli_num_rows($ruselt1) > 0) {
                        $act=" "; 
                    ?>
                
            <div class="col-md-12">
                <ul class='menu'>
                <li><a class='{$act}' href=index.php > Home </a></li>
                    <?php
                      while ($row = mysqli_fetch_assoc($ruselt1)) {
                        if(isset( $_GET['cid'])){
                          if($row['category_id']==$cat_id){
                              $act="active";
                          }else{
                            $act=" ";
                          }
                        }
                     
                echo "<li><a class='{$act}' href='category.php ? cid={$row['category_id']}'>{$row['category_name']}</a></li>";
                     } ?>
                </ul>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
