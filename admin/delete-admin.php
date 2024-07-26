<?php
include('../config/constant.php');
//1. get the ID of Admin to be deleted
 $id = $_GET['id'];
//2. create SQL query to Delete Admin
$sql = "DELETE FROM tbl_admin where id=$id";
//Execute the query
$res=mysqli_query($conn,$sql);
//check whether the query executed successfully or not
if($res==true){
    //query executed successfully and admin deleted
    //echo "Admin deleted";
    //create SESSION variable to display message
    $_SESSION['delete'] = "<div class='success'>Admin deleted successfully</div>";
    //Redirect page to Manage-admin
    header("location:".SITEURL.'admin/manage-admin.php');

}
else{
    //Failed to delete admin
    //echo "Failed to delete admin";
    //create a session variable to display message
    $_SESSION['delete'] = "<div class='error'>Failed to delete admin</div>";
    //Redirect page to Delete-admin
    header("location:".SITEURL.'admin/delete-admin.php');
}

//3. Redirect to manage Admin page with message(success/error)




?>