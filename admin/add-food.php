<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h2>Add Food</h2><br/>
        <?php
           if(isset($_SESSION['add']))
           {
               echo $_SESSION['add'];
               unset ($_SESSION['add']);//Removing sesion message
           }
           ?>
           <br/> 
      <!-- Add category form starts -->
        <form  action="" method="POST" enctype="multipart/form-data">
         <table >
             <tr>
                <td><pre>Title:  </pre></td>
                <td><input type="text" name="title" placeholder="Title of the food"></td>
             </tr>
            <tr>
                <td><pre>Description:  </pre></td>
                <td><textarea name="description" cols="30" rows="5" placeholder="Description of the food"></textarea></td>
             </tr> 
             <tr>
                <td><pre>Price:  </pre></td>
                <td><input type="number" name="price"></td>
             </tr>
             <tr>
             <tr>
                <td><pre>Select Image:  </pre></td>
                <td><input type="file" name="image"></td>
             </tr>
             <tr>
                <td><pre>Category:  </pre></td>
                <td>
                    <select  name="category">
                     <?php
                    //create php code to display categories from database
                    //create sql query to get all active categories from database
                    $sql= "SELECT * FROM tbl_category WHERE active='Yes'";
                    //Executing query
                    $res = mysqli_query($conn,$sql);
                    //count rows to check whether we hava categories or not
                    $count = mysqli_num_rows($res);
                    //If count is greater than 0 then we have categories else we donot have categories
                    if($count>0)
                    {
                        //we have category
                        while($row=mysqli_fetch_assoc($res))
                        {
                            //get the details of categories
                            $id=$row['id'];
                            $title=$row['title'];
                            ?>
                             <option value="<?php echo $id; ?>"><?php echo $title; ?></option>
                            <?php

                        }
                    }
                    else
                    {
                        //we donot have category
                        ?>
                        <option value="0">No Category Found</option>
                        <?php
                    }

                     ?>
                        
            </td>
             </tr>
             <tr>
                <td><pre>featured:  </pre></td>
                <td><input type="radio" name="featured" value="Yes">Yes
                <input type="radio" name="featured" value="No">No</td>
             </tr>
             <tr>
                <td><pre>Active:  </pre></td>
                <td><input type="radio" name="active" value="Yes">Yes
                <input type="radio" name="active" value="No">No</td>
             </tr>
             <tr>
                <td  colspan="2">
                    <input type="submit" name="submit" value="Add Food" class="btn-secondary">
                </td>
             </tr>
         </table>
        </form>
        <?php
        //check whether the submit button is clicked or not
         if(isset($_POST['submit'])){
            //echo "clicked";
            //1. Get the value from  form
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            //For radio input,we need to check whether the button is selected or not
             if(isset($_POST['featured']))
             {
                //get the value from form
                $featured = $_POST['featured'];
             }else{
                //set the default value
                $featured = "No";
             }
             if(isset($_POST['active']))
             {
                //get the value from form
                $active = $_POST['active'];
             }else{
                //set the default value
                $active = "No";
             }
            //2. upload the image if selected
            //check whether the image is selected or not
             if(isset($_FILES['image']['name']))
             {
                //upload the image
                //To upload image we need image name,source path and destination path
                $image_name=$_FILES['image']['name'];
                //upload the image only if image is selected
   if($image_name!=""){
        //Auto rename our image
        //Get the extension of our image (jpg,png etc) //e.g.food.jpg
        $ext= end(explode('.',$image_name));
        //Rename the image
        $image_name = "Food_Name_".rand(000,999).'.'.$ext;//e.g.Food_category_456.jpg
        
                $source_path=$_FILES['image']['tmp_name'];
                $destination_path="../images/food/".$image_name;
                //Finally upload the image
                $upload=move_uploaded_file($source_path,$destination_path);
                //check whether the image is uploaded or not
                //And if the image is not uploaded then we will stop the process and redirect with error message
                if($upload==false){
                    //set message
                    $_SESSION['upload'] = "<div class='error'>Failed to upload </div>";
                     //Redirect page to Add-food
                     header("location:".SITEURL.'admin/add-food.php');
                     //STOP the process.because we dont want to insert data without image in database
                     die();

                }
   }
             }else{
                //Don't upload image and set default value as blank
                $image_name="";

             }

             //2. create SQL query to insert data into database
             //For numerical value we dont need to pass value under quotes'' but string value it is compulsary

             $sql2 = "INSERT INTO tbl_food SET
             title='$title',
             description ='$description',
             price= $price,
             image_name='$image_name',
             category_id='$category',
             featured ='$featured',
             active ='$active'
             ";
             // Execute query and save in database
             $res2= mysqli_query($conn,$sql2);
             if($res2==True){
                //query executed and category added
                //create a session variable to display message
                $_SESSION['add'] = "<div class='success'>Food item added successfully</div>";
                //Redirect page to Manage-food page
                header("location:".SITEURL.'admin/manage-food.php');
        
            }
            else{
                //echo "failed to insert";
                //create a session variable to display message
                $_SESSION['add'] = "<div class='error'>Food item not added </div>";
                //Redirect page to Add-category
                header("location:".SITEURL.'admin/add-food.php');
            }
         }
         ?>
</div>
</div>
<?php include('partials/footer.php'); ?>
       