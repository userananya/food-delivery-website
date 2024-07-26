<?php 
//Authorization-Access control
//check whether the user is logged in or not
if(!isset($_SESSION['user']))//IF user session is not set
{
    //Admin is logged in or not
    //redirect to login page with massage
    $_SESSION['no-login-message']= "<div class='error text-center'>please login to access admin panel</div>";
    //Redirect to Login page
    header("location:".SITEURL.'admin/login.php');

}
 ?>