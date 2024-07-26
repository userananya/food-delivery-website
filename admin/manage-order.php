<?php include('partials/menu.php'); ?>
<div class="main-content">
        <div class="wrapper">
        <h2>Manage Order</h2>
        <br/><br/>
        <?php
        if(isset($_SESSION['update']))
           {
               echo $_SESSION['update'];
               unset ($_SESSION['update']);//Removing sesion message
           }
           ?>
           <br>
        
        <table class="tbl-full">
            <tr>
                <th>S.N.</th>
                <th>Food</th>
                <th><pre>Price</pre></th>
                <th>Qty.</th>
                <th><pre>Total </pre></th>
                <th><pre>Order Date </pre></th>
                <th><pre>Status </pre></th>
                <th><pre>Name  </pre></th>
                <th><pre>Contact  </pre></th>
                <th><pre>Email   </pre></th>
                <th><pre>Address  <pre></th>
                <th><pre>Actions  </pre></th>             

            </tr>
            <?php
            //Query to get all orders from database

               $sql = "SELECT*FROM tbl_order";
               //Execute the query

               $res = mysqli_query($conn,$sql);

                //count rows to check whether we have data in database or not

                $count =mysqli_num_rows($res);//Function to get all the rows in the database
                $sn=1 ;// create a variable and assign the variable 
                if($count>0){
               //order available
                  while($row=mysqli_fetch_assoc($res)){


                    //using while loop to get all data from database
                    //And while loop will run as long as we have data in database
                    //Get all the order details

                    $id=$row['id'];
                    $food=$row['food'];
                    $price=$row['price'];
                    $qty=$row['qty'];
                    $total=$row['total'];
                    $order_date=$row['order_date'];
                    $status=$row['status'];
                    $customer_name=$row['customer_name'];
                    $customer_contact=$row['customer_contact'];
                    $customer_email=$row['customer_email'];
                    $customer_address=$row['customer_address'];
                    //Display the values in our table
                    ?>
                    <tr>
                <td><?php echo $sn++; ?></td>
                <td><?php echo $food; ?></td>
                <td>₹<?php echo  $price; ?></td>
                <td><?php echo $qty; ?></td>
                <td>₹<?php echo $total; ?></td>   
                <td><?php echo $order_date; ?></td>
                
                <td>
                  <?php
                   if($status=="Ordered")
                   {
                     echo "<label>$status</label>";
                   }
                   elseif($status=="On Delivery")
                   {
                     echo "<label style='color:orange;'>$status</label>";
                   }
                   elseif($status=="Delivered")
                   {
                     echo "<label style='color:green;'>$status</label>";
                   }
                   if($status=="Cancelled")
                   {
                     echo "<label style='color:red;'>$status</label>";
                   }               
                  
                  ?>



                </td>
                <td><?php echo $customer_name; ?></td>
                <td><?php echo $customer_contact; ?></td>
                <td><?php echo $customer_email; ?></td>
                <td><?php echo $customer_address; ?></td>
        
                <td>
                <a href="<?php echo SITEURL;?>admin/update-order.php? id=<?php echo $id; ?>" class="btn-secondary"> Update Order</a>
                </td>
                  </tr>
                    <?php

                  }
                }else{
                   //order not available
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