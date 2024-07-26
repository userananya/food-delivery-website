<?php include('../config/constant.php');?>
<html >
<head>
    <title>login-Food Order System</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class="login">
        <h2 class="text-center">Login</h2><br/>
        <?php
        if(isset($_SESSION['login']))
          {
              echo $_SESSION['login'];
              unset ($_SESSION['login']);//Removing sesion message
          }
          if(isset($_SESSION['no-login-message']))
          {
              echo $_SESSION['no-login-message'];
              unset ($_SESSION['no-login-message']);//Removing sesion message
          }
          ?>
        <!-- login form starts here -->
        <form  action="" method="POST" class="text-center">
                Username:<br>
                <input type="text" name="username" placeholder="Enter username"><br><br> 
                Password:<br>
                <input type="password" name="password" placeholder="Enter password"><br><br>
                
             <input type="submit" name="submit" value="login" class="btn-primary">
        </form>
        <!-- login form ends here -->       
    </div>   
</body>
</html>
<?php
if(isset($_POST['submit']))
{
    //Button Clicked
    //echo "Buttton Clicked";
    //get the data from form
    $username= $_POST['username'];
    $password = md5($_POST['password']);//password Encryption with MD5
    $sql = "SELECT*FROM tbl_admin WHERE username='$username' AND password='$password'";
    // Executing query and saving data into the database
    $res= mysqli_query($conn,$sql);
    $count =mysqli_num_rows($res);
    
    if($count==1){     
        $_SESSION['login'] = "<div class='success'>Login successful</div>";
        $_SESSION['user'] = $username;//to check whether the user is logged in or not and logout eill unset it
        header("location:".SITEURL.'admin/');

    }
    else{
        
        $_SESSION['login'] = "<div class='error text-center'>username or password didnot match</div>";
        //Redirect page to Add-admin
        header("location:".SITEURL.'admin/login.php');
    }

}



?>