<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h2>Change Password</h2><br/>
          <?php
           if(isset($_GET['id']))
           {
            $id=$_GET['id'];
           }
         ?>
        <form action="" method="POST">
        <table >
             <tr>
                <td><pre>Current Password:  </pre></td>
                <td><input type="password" name="current_password" placeholder="current password"></td>
             </tr>
             <tr>
                <td><pre>New Password:  </pre></td>
                <td><input type="password" name="new_password" placeholder="new password"></td>
             </tr>
             <tr>
                <td><pre>Confirm Password:  </pre></td>
                <td><input type="password" name="confirm_password" placeholder="confirm password"></td>
             </tr>
             <tr>
                <td  colspan="2">
                <input type="hidden" name="id" value="<?php echo $id ;?>">
                    <input type="submit" name="submit" value="Change Password" class="btn-secondary">
                </td>
             </tr>
         </table>
        </form>

    </div>
</div>
<?php
//check whether the submit button is clicked or not
if(isset($_POST['submit']))
{
    //echo "clicked"
    //1. Get the data from form
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    //2. user with current id and password exits or not
    $sql = "SELECT*FROM tbl_admin WHERE id=$id AND password='$current_password'";
    //Execute the query
    $res = mysqli_query($conn,$sql);
    
    if($res==TRUE){
        //count rows to check whether we have data in database or not
        $count =mysqli_num_rows($res);//Function to count all the rows in the database

         if($count==1){
            //3.check whether the new password and confirm password match or not
           if($new_password==$confirm_password){
             //update the password
             $sql2= "UPDATE tbl_admin SET
           password='$new_password'
           WHERE id='$id'
    ";
    //Execute the query
    $res2 = mysqli_query($conn,$sql2);

    if($res2==True){
        
        $_SESSION['change-pwd'] = "<div class='success'>password changed successfully</div>";
        //Redirect  to Manage-admin page
        header("location:".SITEURL.'admin/manage-admin.php');

    }
    else{
        
        $_SESSION['change-pwd'] = "<div class='error'>Failed to change password</div>";
        //Redirect  to Manage-adminpage
        header("location:".SITEURL.'admin/manage-admin.php');
    }
           }else{
            //Redirect to manage admin page with error massage
            $_SESSION['pwd-not-match'] = "<div class='error'>password didnot match</div>";
            //Redirect the user
            header("location:".SITEURL.'admin/manage-admin.php');
           }
         }
         else{
            $_SESSION['user-not-found'] = "<div class='error'>User not found</div>";
            header("location:".SITEURL.'admin/manage-admin.php');
         }
    }
    

    //4. change password if all above is true

}

?>
<?php include('partials/footer.php'); ?>