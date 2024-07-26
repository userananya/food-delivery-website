<?php include('partials/menu.php'); ?>
<div class="main-content">
        <div class="wrapper">
           <h2>Manage Food</h2>
           <br/><br/>
           <?php
           if(isset($_SESSION['add']))
           {
               echo $_SESSION['add'];
               unset ($_SESSION['add']);//Removing sesion message
           }
           if(isset($_SESSION['delete']))
           {
               echo $_SESSION['delete'];
               unset ($_SESSION['delete']);
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
           if(isset($_SESSION['update']))
           {
               echo $_SESSION['update'];
               unset ($_SESSION['update']);
           }
           ?>
           <br/>
        <!-- Button to add admin -->
         <a href="add-food.php"  class="btn-primary">Add Food</a>
         <br/><br/>
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Title</th>
                <th>Price</th>
                <th>Image</th>
                <th>Featured</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            <?php
            //Query to get all foods from database

               $sql = "SELECT*FROM tbl_food";
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
                    $price=$rows['price'];
                    $image_name=$rows['image_name'];
                    $featured=$rows['featured'];
                    $active=$rows['active'];
                    //Display the values in our table
                    ?>
                    <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $title; ?></td>
                <td>₹<?php echo  $price; ?></td>
                <td>
                <?php
                //check whether the image name is available or not
                if($image_name!=""){
                    //Display the image
                    ?>
                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" width="100px" >
                    <?php

                }
                else
                {
                    //display the error message
                    echo "<div class='error'>Image not added</div>";
                }
                ?>
                </td>
                <?php
                //<td><?php echo $image_name; </td>?>        
                <td><?php echo $featured; ?></td>
                <td><?php echo $active; ?></td>
                <td>
                
                <a href="<?php echo SITEURL;?>admin/update-food.php? id=<?php echo $id; ?>" class="btn-secondary"> Update Food</a>
                <a href="<?php echo SITEURL;?>admin/delete-food.php? id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn-danger"> Delete Food</a>
                </td>
                  </tr>
                    <?php

                  }
                }else{
                   //we donot have data in the database
                   ?>
                   <tr>
                    <td colspan="6"><div class="error">No Food item added.</div></td>
                   </tr>
                   <?php

                }
               
            ?>
            
       </table>
       
       
        </div>
       
    </div>

<?php include('partials/footer.php'); ?>