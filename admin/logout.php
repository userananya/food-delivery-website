<?php
include('../config/constant.php');
  //1.Destroy the session
    session_destroy();

  //2.Redirect to Login page
  header("location:".SITEURL.'admin/login.php');
?>