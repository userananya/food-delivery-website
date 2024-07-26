<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h2>Add Admin</h2><br/>

        <?php
           if(isset($_SESSION['add']))
           {
               echo $_SESSION['add'];
               unset ($_SESSION['add']);//Removing sesion message
           }
        ?>
        <form  action="" method="POST">
         <table >
             <tr>
                <td><pre>Full Name:  </pre></td>
                <td><input type="text" name="full_name" placeholder="Enter your name"></td>
             </tr>
             <tr>
                <td><pre>Username:  </pre></td>
                <td><input type="text" name="username" placeholder="Enter username"></td>
             </tr>
             <tr>
                <td><pre>Password:  </pre></td>
                <td><input type="password" name="password" placeholder="Enter password"></td>
             </tr>
             <tr>
                <td  colspan="2">
                    <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                </td>
             </tr>
         </table>

        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>
<?php
//process the value from form and  Save it in Database
// check whether the submit buttton is clicked or not
if(isset($_POST['submit']))
{
    //Button Clicked
    //echo "Buttton Clicked";
    //1. get the data from form
    $full_name = $_POST['full_name'];
    $username= $_POST['username'];
    $password = md5($_POST['password']);//password Encryption with MD5
    //2.SQL query to save the data in the database
    $sql = "INSERT INTO tbl_admin SET
    full_name='$full_name',
    username ='$username',
    password ='$password'
    ";
    // 3.Executing query and saving data into the database
    $res= mysqli_query($conn,$sql)or die(mysqli_error());
    //4. check whether the data is inserted or not
    if($res){
        //echo "Data inserted";
        //create a session variable to display message
        $_SESSION['add'] = "<div class='success'>Admin added successfully</div>";
        //Redirect page to Manage-admin
        header("location:".SITEURL.'admin/manage-admin.php');

    }
    else{
        //echo "failed to insert";
        //create a session variable to display message
        $_SESSION['add'] = "<div class='error'>Admin not added </div>";
        //Redirect page to Add-admin
        header("location:".SITEURL.'admin/add-admin.php');
    }

}

?>