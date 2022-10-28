<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
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
              
                 if($_SESSION["user_role"] == '1'){
                $sql = "SELECT *FROM post 
                LEFT JOIN category ON post.category=category.category_id
                LEFT JOIN user ON post.author= user.user_id
                 
                ORDER BY post.post_id DESC limit {$offset},{$limit}";
                 }else{
                    $sql = "SELECT *FROM post 
                    LEFT JOIN category ON post.category=category.category_id
                    LEFT JOIN user ON post.author= user.user_id
                    WHERE post.author = {$_SESSION['user_id']}
                    ORDER BY post.post_id DESC limit {$offset},{$limit}";

                 }
                
                 $ruselt = mysqli_query($conn, $sql) or die("Query failed.");
                 if (mysqli_num_rows($ruselt) > 0) {
                
                ?>
                  <table class="content-table"method="GET">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                          <th>Status</th>

                      </thead>
                      <tbody>
                      <?php
                            while ($row = mysqli_fetch_assoc($ruselt)) {

                            ?>
                          <tr>
                              <td class='id'><?php echo $row['post_id']; ?></td>
                              <td><?php echo $row['title']; ?></td>
                              <td><?php echo $row['category_name']; ?></td>
                              <td><?php echo $row['post_date']; ?></td>
                              <td><?php echo $row['username']; ?></td>
                              <td class='edit'><a href='update-post.php ? rd=<?php echo $row['post_id']; ?>& catid=<?php echo $row['category'];?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='delete-post.php ? rd=<?php echo $row['post_id']; ?>& catid=<?php echo $row['category'];?>'><i class='fa fa-trash-o'></i></a></td>
                              <td class='Status'>
                               <?php
                               if($row['status']==1){
                                   echo '<p><a href="status.php ? rd='.$row['post_id'].'& sut=0"><h4 style="color:green;">Enable</h4> </a></p>';
                               }else{
                                echo '<p><a href="status.php ? rd='.$row['post_id'].'& sut=1"><h4 style="color:green;">Disbale</h4> </a></p>';
                               
                               
                               
                               }
                               ?>
                              </td>
                            </tr>
                          <?php
                            }
                          ?>
                          
                      </tbody>
                  </table>
                  <?php   

}
$sqli1 = "SELECT * FROM post";
$result1 = mysqli_query($conn, $sqli1) or die("Query failde.");
if (mysqli_num_rows($result1) > 0) {
    $total_records = mysqli_num_rows($result1);

    $total_page = ceil($total_records / $limit);//total divite
    echo "<ul class='pagination admin-pagination'>";
    if ($page > 1) {
        echo '<li><a href="post.php?page=' . ($page - 1) . '">Prev</a><li>';
    }

    for ($i = 1; $i <= $total_page; $i++) {

        //    echo '<li><a href="users.php ? page='.$i.'">'.$i.'</a></li>';
        if ($i == $page) {
            $active = "active";
        } else {
            $active = "";
        }
        echo '<li class="' . $active . '"><a href="post.php ? page=' . $i . '">' . $i . '</a></li>';
    }
    if ($total_page > $page) {
        echo '<li><a href="post.php ? page=' . ($page + 1) . '">Next</a><li>';
    }
    echo ' </ul>';
}else{
    echo"<h3>No data include this page</h2>";
}


  ?>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
