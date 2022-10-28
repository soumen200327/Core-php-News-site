<?php
include "header.php";
if( $_SESSION["user_role"]=='0'){
    header("Location:post.php");
} 

?>  
<?php  ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Users</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-user.php">add user</a>
            </div>
            <div class="col-md-12" id="table_lode">
            
            </div>
        </div>
    </div>
</div>
<script src="images/js.js"></script>
<script>
$(document).ready(function(){
    function loadTable() {
        $.ajax({
          url: "lode_user.php",
          type: "POST",
        //   data: {
        //     page_no: page
        //   },
          success: function(data) {
            $("#table_lode").html(data);
          }
        });
      }
      loadTable();
});

</script>

<?php include "footer.php"; ?>