<?php include('partials/menu.php'); ?>
<div class="main-content">
        <div class="wrapper">
        <h2>Manage Category</h2>
        <br/>
        <?php
           if(isset($_SESSION['add']))
           {
               echo $_SESSION['add'];
               unset ($_SESSION['add']);//Removing sesion message
           }
           if(isset($_SESSION['remove']))
           {
               echo $_SESSION['remove'];
               unset ($_SESSION['remove']);
           }
           if(isset($_SESSION['delete']))
           {
               echo $_SESSION['delete'];
               unset ($_SESSION['delete']);
           }
           if(isset($_SESSION['no-category-found']))
           {
               echo $_SESSION['no-category-found'];
               unset ($_SESSION['no-category-found']);
           }
           if(isset($_SESSION['update']))
           {
               echo $_SESSION['update'];
               unset ($_SESSION['update']);
           }
           if(isset($_SESSION['upload']))
           {
               echo $_SESSION['upload'];
               unset ($_SESSION['upload']);
           }
           if(isset($_SESSION['failed-remove']))
           {
               echo $_SESSION['failed-remove'];
               unset ($_SESSION['failed-remove']);
           }
        ?>
        <br/>
        <!-- Button to add admin -->
         <a href="add-category.php"  class="btn-primary">Add Category</a>
         <br/><br/>
         <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <?php
            //Query to get all categories from database

               $sql = "SELECT*FROM tbl_category";
               //Execute the query

               $res = mysqli_query($conn,$sql);

                //count rows to check whether we have data in database or not

                $count =mysqli_num_rows($res);//Function to get all the rows in the database
                $sn=1 ;// create a variable and assign the variable 
                if($count>0){
                  //we have data in the database
                  //get the data and display
                  while($rows=mysqli_fetch_assoc($res)){


                    //using while loop to get all data from database
                    //And while loop will run as long as we have data in database
                    //Get individual data

                    $id=$rows['id'];
                    $title=$rows['title'];
                    $image_name=$rows['image_name'];
                    $featured=$rows['featured'];
                    $active=$rows['active'];
                    //Display the values in our table
                    ?>
                    <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $title; ?></td>
                <td>
                <?php
                //check whether the image name is available or not
                if($image_name!=""){
                    //Display the image
                    ?>
                    <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" width="100px" >
                    <?php

                }
                else
                {
                    //display the message
                    echo "<div class='error'>Image not added</div>";
                }
                ?>
                </td>
                <?php
                //<td><?php echo $image_name; </td>?>        
                <td><?php echo $featured; ?></td>
                <td><?php echo $active; ?></td>
                <td>
                
                <a href="<?php echo SITEURL;?>admin/update-category.php? id=<?php echo $id; ?>" class="btn-secondary"> Update Category</a>
                <a href="<?php echo SITEURL;?>admin/delete-category.php? id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger"> Delete Category</a>
                </td>
                  </tr>
                    <?php

                  }
                }else{
                   //we donot have data in the database
                   ?>
                   <tr>
                    <td colspan="6"><div class="error">No Category added.</div></td>
                   </tr>
                   <?php

                }
               
            ?>
            
       </table>
       
        </div>
       
    </div>

<?php include('partials/footer.php'); ?>