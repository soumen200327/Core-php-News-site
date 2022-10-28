<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="adin-heading"> Update Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
              <?php
                include "config.php";
                $sut_id = $_GET['rd'];
                $sql = "SELECT * FROM `category` WHERE `category_id`={$sut_id}";
                $result = mysqli_query($conn, $sql) or die("Query Unsuccfull" . mysqli_connect_error());
                if (mysqli_num_rows($result) > 0) {


                ?>
                  <form action="UPcategory.php" method ="POST">
                  <?php

                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <div class="form-group">
                          <input type="hidden" name="cat_id"  class="form-control" value="<?php echo $row['category_id'] ?>" placeholder="">
                      </div>
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat_name" class="form-control" value="<?php echo $row['category_name'] ?>"  placeholder="" required>
                      </div>
                      <input type="submit" name="sumbit" class="btn btn-primary" value="Update" required />
                 <?php
                    }
                 ?>
                 
                    </form>

                  <?php
                }
                  ?>
                </div>
              </div>
            </div>
          </div>
<?php include "footer.php"; ?>
