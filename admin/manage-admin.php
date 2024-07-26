<?php include('partials/menu.php'); ?>
    <!--Main Content  Section Starts -->
    <div class="main-content">
        <div class="wrapper">
        <h2>Manage Admin</h2>
        <br/>
        <?php
          if(isset($_SESSION['add']))
          {
              echo $_SESSION['add'];
              unset ($_SESSION['add']);//Removing sesion message
          }
          if(isset($_SESSION['delete']))
          {
              echo $_SESSION['delete'];
              unset ($_SESSION['delete']);//Removing sesion message
          }
          if(isset($_SESSION['update']))
          {
              echo $_SESSION['update'];
              unset ($_SESSION['update']);//Removing sesion message
          }
          if(isset($_SESSION['user-not-found']))
          {
              echo $_SESSION['user-not-found'];
              unset ($_SESSION['user-not-found']);//Removing sesion message
          }
          if(isset($_SESSION['pwd-not-match']))
          {
              echo $_SESSION['pwd-not-match'];
              unset ($_SESSION['pwd-not-match']);//Removing sesion message
          }
          if(isset($_SESSION['change-pwd']))
          {
              echo $_SESSION['change-pwd'];
              unset ($_SESSION['change-pwd']);//Removing sesion message
          }
        ?>
        <br/><br/>
        <!-- Button to add admin -->
         <a href="add-admin.php"  class="btn-primary">Add Admin</a>
         <br/><br/>
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Full Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
            <?php
            //Query to get all admin

               $sql = "SELECT*FROM tbl_admin";
               //Execute the query

               $res = mysqli_query($conn,$sql);
               if($res==TRUE){
                //count rows to check whether we have data in database or not

                $count =mysqli_num_rows($res);//Function to get all the rows in the database
                $sn=1 ;// create a variable and assign the variable 
                if($count>0){
                  //we have data in the database
                  while($rows=mysqli_fetch_assoc($res)){


                    //using while loop to get all data from database
                    //And while loop will run as long as we have data in database
                    //Get individual data

                    $id=$rows['id'];
                    $full_name=$rows['full_name'];
                    $username=$rows['username'];
                    //Display the values in our table
                    ?>
                    <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $full_name; ?></td>
                <td><?php echo $username; ?></td>
                <td>
                  <a href="<?php echo SITEURL;?>admin/update-password.php? id=<?php echo $id; ?>" class="btn-primary">Change password</a>
                <a href="<?php echo SITEURL;?>admin/update-admin.php? id=<?php echo $id; ?>" class="btn-secondary"> Update Admin</a>
                <a href="<?php echo SITEURL;?>admin/delete-admin.php? id=<?php echo $id; ?>" class="btn-danger"> Delete Admin</a>
                </td>
                  </tr>
                    <?php

                  }
                }else{
                   //we donot have data in the database
                }
               }
            ?>
            
       </table>
       
        </div>
       
    </div>
    <!--Main Content Section Ends -->
    <?php include('partials/footer.php'); ?>
    