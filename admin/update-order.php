<?php include('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
    <h2>Update Order</h2>
    <br/><br/>
<?php
        if(isset($_GET['id']))
        {
           //Get the id of selected food
           $id=$_GET['id'];

            $sql = "SELECT*FROM tbl_order WHERE id=$id";
               //Execute the query
            $res = mysqli_query($conn,$sql);         
                $count =mysqli_num_rows($res);
                 if($count==1){
                    // details available
                    $row =mysqli_fetch_assoc($res);
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
                    
                 }
                 else{
                  //details not available
                  header("location:".SITEURL.'admin/manage-order.php');
               }

          }
               
          else{
                    //Redirect to manage order page
                    header("location:".SITEURL.'admin/manage-order.php');
              }
            


         ?>
        <form action="" method="POST" enctype="multipart/form-data">   
        <table >
             <tr>
                <td><pre>Food Name: </pre></td>
                <td><b><?php echo $food; ?></b></td>
             </tr>
             <tr>
                <td><pre>Price: </pre></td>
                <td><b><?php echo $price; ?></b></td>
             </tr>
             <tr>
                <td><pre>Qty:  </pre></td>
                <td><?php echo $qty; ?></td>
            </tr>
            <tr>
                <td><pre>Total Price:  </pre></td>
                <td><?php echo $total; ?></td>
            </tr>
             <tr>
                <td><pre>Status </pre></td>
                <td>
                    <select name="status">
                        <option <?php if($status=="Ordered"){ echo "selected";} ?>value="Ordered">Ordered</option>
                        <option <?php if($status=="On Delivery"){ echo "selected";} ?>value="On Delivery">On Delivery</option>
                        <option <?php if($status== "Delivered"){ echo "selected";} ?>value="Delivered">Delivered</option>
                        <option <?php if($status=="Cancelled"){ echo "selected";} ?>value="Cancelled">Cancelled</option>
                    </select>
                </td>
             </tr>
             <tr>
                <td><pre>Customer Name:  </pre></td>
                <td>
                <input type="text" name="customer_name" value="<?php echo $customer_name; ?>">
                </td>
            </tr>
            <tr>
                <td><pre>Customer Contact:  </pre></td>
                <td>
                <input type="text" name="customer_contact" value="<?php echo $customer_contact; ?>"> 
                </td>
            </tr>
            <tr>
                <td><pre>Customer Email:  </pre></td>
                <td>
                <input type="text" name="customer_email" value="<?php echo $customer_email; ?>">
                </td>
            </tr>
            <tr>
                <td><pre>Customer Address:  </pre></td>
                <td>
                <textarea name="customer_address" cols="30" rows="5" > <?php echo $customer_address;?></textarea>
                </td>
            </tr>
            <tr>
                <td  colspan="2">
                <input type="hidden" name="id" value="<?php echo $id ;?>">
                <input type="hidden" name="price" value="<?php echo $price ;?>">
                    <input type="submit" name="submit" value="Update Order" class="btn-secondary">
                </td>
             </tr>
        </table>
        </form>
        <?php
            // check whether the submit button is clicked or not
            if(isset($_POST['submit']))
            {
                //Get all the details from the form
                $id= $_POST['id'];
                $price= $_POST['price'];
                $status = $_POST['status'];
                $customer_name =$_POST['customer_name'];
                $customer_contact =$_POST['customer_contact'];
                $customer_email =$_POST['customer_email'];
                $customer_address =$_POST['customer_address'];               
                //create SQL to update the data
                $sql2 = "UPDATE  tbl_order SET
                 qty = $qty,
                 total = $total,
                 status= '$status',
                 customer_name= '$customer_name',
                 customer_contact= '$customer_contact',
                 customer_email= '$customer_email',
                 customer_address= '$customer_address' 
                 WHERE id=$id   
                 ";
                 //echo $sql2; die();
                 //Execute query
                 $res2 = mysqli_query($conn,$sql2);
                 if($res2==true){
                    //query executed and order updated                
                    $_SESSION['update'] = "<div class='success text-center'> order updated successfully</div>";
                     header("location:".SITEURL.'admin/manage-order.php');
            
                }
                else{
                    //failed to update
                    $_SESSION['update'] = "<div class='error text-center'>Failed to update order </div>";
                    header("location:".SITEURL.'admin/manage-order.php');
                }


            }
            
            
            ?>

        </div>
        </div>
        <?php include('partials/footer.php'); ?>