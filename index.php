
    <?php include('partials-front/menu.php') ?>
    <section class="food-search text-center">
        <div class="container">
            
            <h3 style="color:white">Order your favourite food here</h3>
             <p style="color:yellow">Welcome to HungryHub, the ultimate online destination for satisfying your culinary cravings with ease and convenience. Our website is designed to make your food ordering experience seamless, enjoyable, and hassle-free.Our website offers an easy and seamless food ordering process, allowing you to indulge in a wide array of mouthwatering dishes crafted with the finest ingredients.</p>
             <br>

        </div>
    </section>
    <?php
           if(isset($_SESSION['order']))
           {
               echo $_SESSION['order'];
               unset ($_SESSION['order']);//Removing sesion message
           }
        ?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
     <h2 class="text-center">Explore Foods</h2>        
  <?php
     //create SQL Query to display categories from database
     $sql = "SELECT * FROM tbl_category WHERE featured='Yes' AND active='Yes' LIMIT 3";
     //Execute the query
     $res = mysqli_query($conn,$sql);
      //count rows to check whether the category is available or not
     $count =mysqli_num_rows($res);
     if($count>0)
     {
        //categories available
        while($row=mysqli_fetch_assoc($res))
     {
        //Get the values like id,title,image_name
        $id = $row['id'];
        $title = $row['title'];
        $image_name = $row['image_name'];
        ?>
        <a href="<?php echo SITEURL;?>category-foods.php?category_id=<?php echo $id;?>">
    
            <div class="box-3 float-container">
                <?php
                //check whether the image is available or not
                 if($image_name=="")
                 {
                   //display massage
                 echo "<div class='error'>Image not Available</div>"; 
                 }
                 else
                 {
                    //image available
                    ?>
                      <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" class="img-responsive img-curve"  >

                    <?php

                 }
                ?>
              

                <h3 class="text-center float-text text-white"><?php echo $title; ?></h3>
            </div>
                
            </a>

        <?php

     }
    }
    else
    {
        //categories not available
        echo "<div class='error'>Image not added</div>";
    }
     
  ?>
           
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD Menu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php
            //create SQL Query to display categories from database
     $sql2 = "SELECT * FROM tbl_food WHERE featured='Yes' AND active='Yes' LIMIT 4";
     //Execute the query
     $res2 = mysqli_query($conn,$sql2);
      //count rows to check whether the category is available or not
     $count2 =mysqli_num_rows($res2);
     if($count2>0)
     {
        //foods available
        while($row2=mysqli_fetch_assoc($res2))
     {
        //Get the values like id,title,image_name
        $id= $row2['id'];
        $title= $row2['title'];
        $price= $row2['price'];
        $description= $row2['description'];       
        $image_name = $row2['image_name'];
        ?>
         <div class="food-menu-box">
                <div class="food-menu-img">
                <?php
                //check whether the image is available or not
                 if($image_name=="")
                 {
                   //display massage
                 echo "<div class='error'>Image not Available</div>"; 
                 }
                 else
                 {
                    //image available
                    ?>
                      <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" class="img-responsive img-curve" >

                    <?php

                 }
                ?>       
                
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $title; ?></h4>
                    <p class="food-price">₹<?php echo $price; ?></p>
                    <p class="food-detail">
                    <?php echo $description; ?> 
                    </p>
                    <br>

                    <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
                </div>
            </div>  

        <?php

     }
    }
    else
    {
        //categories not available
        echo "<div class='error'>Image not added</div>";
    }
     
  ?>
            <div class="clearfix"></div>     

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php include('partials-front/footer.php') ?>

   

    