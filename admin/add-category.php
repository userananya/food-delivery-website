<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
        <h2>Add Category</h2><br/>
        <?php
           if(isset($_SESSION['add']))
           {
               echo $_SESSION['add'];
               unset ($_SESSION['add']);//Removing sesion message
           }
           if(isset($_SESSION['upload']))
           {
               echo $_SESSION['upload'];
               unset ($_SESSION['upload']);//Removing sesion message
           }
        ?>
        <br/>
        <!-- Add category form starts -->
        <form  action="" method="POST" enctype="multipart/form-data">
         <table >
             <tr>
                <td><pre>Title:  </pre></td>
                <td><input type="text" name="title" placeholder="Category Title"></td>
             </tr>
             <tr>
                <td><pre>Select image:  </pre></td>
                <td><input type="file" name="image"></td>
             </tr>
             <tr>
                <td><pre>Featured:  </pre></td>
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
                    <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                </td>
             </tr>
         </table>
        </form>
        <!-- Add category form ends -->
        <?php
        //check whether the submit button is clicked or not
         if(isset($_POST['submit'])){
            //echo "clicked";
            //1. Get the value from category form
            $title = $_POST['title'];
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

             //check whether the image is selected or not
             //print_r($_FILES['image']);
             //die(); //break the code here
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
        $image_name = "Food_Category_".rand(000,999).'.'.$ext;//e.g.Food_category_456.jpg
        
                $source_path=$_FILES['image']['tmp_name'];
                $destination_path="../images/category/".$image_name;
                //Finally upload the image
                $upload=move_uploaded_file($source_path,$destination_path);
                //check whether the image is uploaded or not
                //And if the image is not uploaded then we will stop the process and redirect with error message
                if($upload==false){
                    //set message
                    $_SESSION['upload'] = "<div class='error'>Failed to upload </div>";
                     //Redirect page to Add-category
                     header("location:".SITEURL.'admin/add-category.php');
                     //STOP the process.because we dont want to insert data without image in database
                     die();

                }
   }
             }else{
                //Don't upload image and set image_name value as blank
                $image_name="";

             }


             //2. create SQL query to insert data into database

             $sql = "INSERT INTO tbl_category SET
             title='$title',
             image_name='$image_name',
             featured ='$featured',
             active ='$active'
             ";
             // Execute query and save in database
             $res= mysqli_query($conn,$sql);
             if($res==True){
                //query executed and category added
                //create a session variable to display message
                $_SESSION['add'] = "<div class='success'>Category added successfully</div>";
                //Redirect page to Manage-category page
                header("location:".SITEURL.'admin/manage-category.php');
        
            }
            else{
                //echo "failed to insert";
                //create a session variable to display message
                $_SESSION['add'] = "<div class='error'>category not added </div>";
                //Redirect page to Add-category
                header("location:".SITEURL.'admin/add-category.php');
            }
         }
         ?>
    </div>
</div>
<?php include('partials/footer.php'); ?>