
<?php include('partials-front/menu.php') ?>
<section class="food-search text-center">
        <div class="container">
             <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>


    <!-- fOOD Menu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php

     $sql2 = "SELECT * FROM tbl_food WHERE active='Yes' ";
     //Execute the query
     $res2 = mysqli_query($conn,$sql2);
      //count rows to check whether the food is available or not
     $count2 =mysqli_num_rows($res2);
     if($count2>0)
     {
        //foods available
        while($row2=mysqli_fetch_assoc($res2))
        {
     
        //Get the values like id,title,image_name
        $id= $row2['id'];
        $title= $row2['title'];
        $description= $row2['description'];
        $price= $row2['price'];       
        $image_name = $row2['image_name'];
        ?>
         <div class="food-menu-box">
                <div class="food-menu-img">
                <?php
                //check whether the image is available or not
                 if($image_name=="")
                 {
                   //display massage
                 echo "<div class='error'>Food not Available</div>"; 
                 }
                 else{
                 
                    //image available
                    ?>
                  <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" class="img-responsive img-curve" >
                  <?php
                 } 
                 ?>
                    
                </div>

                <div class="food-menu-desc">
                    <h4> <?php echo $title ; ?></h4>
                    <p class="food-price">₹<?php echo $price  ; ?></p>
                    <p class="food-detail">
                       <?php echo $description ; ?>
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
        echo "<div class='error'>Food not added</div>";
    }
               ?>               

            <div class="clearfix"></div>     

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('partials-front/footer.php') ?>