<?php 

$conn=mysqli_connect("localhost","root","","news-site") or die("connectionFaild". mysqli_connect_error());
$sql = "SELECT *FROM user";
$ruselt = mysqli_query($conn, $sql) or die("Query failed.");
$output = "";
if (mysqli_num_rows($ruselt) > 0) {
    $output = "  <table id='table_lode' class='content-table' method='POST'>
    <thead>
        <th>S.No.</th>
        <th>Full Name</th>
        <th>User Name</th>
        <th>Role</th>
        <th>Edit</th>
        <th>Delete</th>
    </thead> <tbody>";
    while ($row = mysqli_fetch_assoc($ruselt)) {
        if( $row['role']==1){
            $admin = 'Admin';
        }else{
            $admin = 'User'; 
        }
        $output.= "   <tr>
        <td class='id'>{$row['user_id']}</td>
<td>{$row['first_name']}  {$row['last_name']}</td>
        <td>{$row['username']}</td>
        <td> {$admin}
            
            </td>
        <td class='edit'><a href='update-user.php  ? rd=<?php echo {$row['user_id']}; ?>'><i class='fa fa-edit'></i></a></td>
        <td class='delete'><a href='delete-user.php ? rd=<?php echo{$row['user_id']}; ?>'><i class='fa fa-trash-o'></i></a></td>
    </tr>";

    }
    $output.="     </tbody>
    </table>";

}
 echo $output;

?>