<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h2>Update Admin</h2><br/>
        <?php
           //Get the id of selected admin
           $id=$_GET['id'];

            $sql = "SELECT*FROM tbl_admin WHERE id=$id";
               //Execute the query
            $res = mysqli_query($conn,$sql);
            if($res==TRUE){
                //count rows to check whether we have data in database or not
                $count =mysqli_num_rows($res);//Function to count all the rows in the database
                 if($count==1){
                    //Get the details
                    $row =mysqli_fetch_assoc($res);
                    $full_name= $row['full_name'];
                    $username=  $row['username'];
                 }
                 else{
                    //Redirect to manage admin page
                    header("location:".SITEURL.'admin/manage-admin.php');
                 }
            }


         ?>
        <form action="" method="POST">   
        <table >
             <tr>
                <td><pre>Full Name:  </pre></td>
                <td><input type="text" name="full_name" value="<?php echo $full_name; ?>" ></td>
             </tr>
             <tr>
                <td><pre>Username:  </pre></td>
                <td><input type="text" name="username" value="<?php echo $username; ?>"></td>
             </tr>
             
             <tr>
                <td  colspan="2">
                <input type="hidden" name="id" value="<?php echo $id ;?>">
                    <input type="submit" name="submit" value="Update Admin" class="btn-secondary">
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
    //echo "Button Clicked";
    //Get all the values from form to update
    $id=$_POST['id'];
     $full_name=$_POST['full_name'];
     $username=$_POST['username'];
    //create sql query to update Admin
    $sql= "UPDATE tbl_admin SET
    full_name='$full_name',
    username='$username' 
    WHERE id='$id'
    ";
    //Execute the query
    $res = mysqli_query($conn,$sql);
    if($res==True){
        
        $_SESSION['update'] = "<div class='success'>Admin updated successfully</div>";
        //Redirect  to Manage-admin page
        header("location:".SITEURL.'admin/manage-admin.php');

    }
    else{
        
        $_SESSION['update'] = "<div class='error'>Failed to update admin</div>";
        //Redirect  to Manage-adminpage
        header("location:".SITEURL.'admin/manage-admin.php');
    }
}


?>



<?php include('partials/footer.php');?>