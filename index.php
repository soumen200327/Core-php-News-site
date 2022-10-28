<?php include 'header.php'; ?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">

                    <?php
                    include "config.php";
                    $limit = 3;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $offset = ($page - 1) * $limit;
                     //pagination code
                    $sql = "SELECT *FROM post 
                    LEFT JOIN category ON post.category=category.category_id
                    LEFT JOIN user ON post.author= user.user_id
                    WHERE post.status = 1
                    ORDER BY post.post_id DESC limit {$offset},{$limit}";
                     $ruselt = mysqli_query($conn, $sql) or die("Query1 failed . ");
                     if (mysqli_num_rows($ruselt) > 0) {
                        while ($row = mysqli_fetch_assoc($ruselt)) {
                    ?>
                        <div class="post-content">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php ? id=<?php echo $row['post_id']; ?>"><img src="admin/upload/<?php echo $row['post_img']; ?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php? id=<?php echo $row['post_id']; ?>'><?php echo $row['title']; ?></a></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php ? cid=<?php echo $row['category_id']; ?>'><?php echo $row['category_name']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php? name=<?php echo $row['username']; ?>'><?php echo $row['username']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $row['post_date']; ?>
                                            </span>
                                        </div>
                                        <p class="description">
                                        <?php echo substr($row['description'],0,120)."........"; ?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php? id=<?php echo $row['post_id']; ?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php   
                        }
                      }else{
                          echo "<h2>NO Data found</h>";
                      }
   $sqli1 = "SELECT * FROM post";
   $result1 = mysqli_query($conn, $sqli1) or die("Query failde.");
   if (mysqli_num_rows($result1) > 0) {
    $total_records = mysqli_num_rows($result1);

    $total_page = ceil($total_records / $limit);//total divite
    echo "<ul class='pagination admin-pagination'>";
    if ($page > 1) {
        echo '<li><a href="index.php?page=' . ($page - 1) . '">Prev</a><li>';
    }

    for ($i = 1; $i <= $total_page; $i++) {

        //    echo '<li><a href="users.php ? page='.$i.'">'.$i.'</a></li>';
        if ($i == $page) {
            $active = "active";
        } else {
            $active = "";
        }
        echo '<li class="' . $active . '"><a href="index.php ? page=' . $i . '">' . $i . '</a></li>';
    }
    if ($total_page > $page) {
        echo '<li><a href="index.php ? page=' . ($page + 1) . '">Next</a><li>';
    }
    echo ' </ul>';
}else{
    echo"<h3>No data include this page</h2>";
}


  ?>
                    </div><!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
