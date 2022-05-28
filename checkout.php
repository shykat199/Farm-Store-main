<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
   <!-- Stylesheets/CDN Area Start ============================================= -->
   <?php
   $page = 'index';
   require_once('includes/cdn.php');
   if (!isset($_SESSION['id'])) {
      header("location:Login");
   } else {
      $id = $_SESSION['id'];

      $query = "SELECT * FROM `address` WHERE uid='$id'";
      $data = mysqli_query($con, $query);
      $total = mysqli_num_rows($data);

      $uniqaid = "";
      if ($total != 0) {
         while ($result = mysqli_fetch_assoc($data)) {
            $uniqaid = $result['uid'];
         }
      } else {
         "No Records Found!!!";
      }
   }

   $cart_id = array();
   $priceProduct = array();
   $priceQty = array();
   $productdiscount = array();
   $query = "SELECT cart_table.id,cart_table.price,product.pprice,cart_table.qty,product.discount FROM cart_table,product WHERE cart_table.pid = product.id";

   $data = mysqli_query($con, $query);
   $total = mysqli_num_rows($data);
   if ($total != 0) {
      while ($row = mysqli_fetch_assoc($data)) {

         $price = 0;
         $count = 0;
         $values = explode('$;', $row['pprice']);
         foreach ($values as $valuee) {
            if ($count == $row['price']) {

               $price = $valuee;
            }
            $count = $count + 1;
         }
         array_push($priceProduct, $price);
         array_push($cart_id, $row['id']);
         array_push($priceQty, $row['qty']);
         array_push($productdiscount, $row['discount']);
      }
   }

   $priceProduct = array_map('intval', $priceProduct);
   $productdiscount = array_map('intval', $productdiscount);
   for ($i = 0; $i < count($cart_id); $i++) {
      $total_without_discount = $priceProduct[$i] * $priceQty[$i];
      $final_total = ($total_without_discount - ($productdiscount[$i]/100)*$total_without_discount);
      $query = "UPDATE `cart_table` SET `total`='$final_total' WHERE `id`='$cart_id[$i]'";
      $data = mysqli_query($con, $query);
   }

   ?>
   <!-- Stylesheets/CDN Area End ============================================= -->
</head>

<body class="stretched">
   <!-- Document Wrapper ============================================= -->
   <div id="wrapper" class="clearfix">

      <!-- On LOad Modal Area Start-->
      <?php
      require_once('includes/onloadmodal.php');
      ?>
      <!-- On LOad Modal Area End-->

      <!-- Top Bar Area Start ============================================= -->
      <?php
      require_once('includes/topbar.php');
      ?>
      <!-- Top Bar Area End ============================================= -->

      <!-- Navbar Area Start ============================================= -->
      <?php
      require_once('includes/navbar.php');
      ?>
      <!-- Navbar Area end -->

      <!-- Content ============================================= -->
      <section id="content">
         <div class="content-wrap">
            <div class="container clearfix">
               <div class="card shadow">
                  <?php
                  if (!$uniqaid) {
                  ?>
                     <center>
                        <div class="p-4">
                           <a href="BilligAddress" type="button" class="btn btn-warning btn-lg">Please, Enter Address Detailed Before Checkout!</a>
                        </div>
                     </center>
                  <?php
                  } else {
                  ?>
                     <?php
                     $id = $_SESSION['id'];
                     $query = "SELECT * FROM address,setting WHERE uid = '$id'";
                     $data = mysqli_query($con, $query);
                     $total = mysqli_num_rows($data);
                     $adress_id = "";
                     $d_charge = 0;
                     $hno = "";
                     $society = "";
                     $area = "";
                     $pincode = "";
                     $landmark = "";
                     $name = "";
                     $type = "";
                     if ($total != 0) {
                        while ($result = mysqli_fetch_assoc($data)) {
                           $adress_id = $result['id'];
                           $d_charge = $result['delivery_charge'];
                           $hno = $result['hno'];
                           $society = $result['society'];
                           $area = $result['area'];
                           $pincode = $result['pincode'];
                           $landmark = $result['landmark'];
                           $type = $result['type'];
                           $name = $result['name'];
                        }
                     } else {
                        "No Records Found!!!";
                     }
                     ?>
                     <div class="row p-4">
                        <div class="table-responsive">
                            <div class="col-lg-8 col-md-8 col-sm-12 col-12">
                                <table class="table table-striped table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>Serial No.</th>
                                            <th>Product</th>
                                            <th>Quantity</th>
                                            <th>Discount</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    if (isset($_SESSION['id'])) {
                                        $query = "SELECT * FROM `user` where id={$_SESSION['id']}";
                                        $data = mysqli_query($con, $query);
                                        $row = mysqli_fetch_assoc($data);
                                        $status = $row['status'];
                                        if($status==0){
                                            $d_charge=0;
                                        }
                                    }
                                    ?>

                                    <tbody>
                                        <?php
                                        $query = "SELECT qty AS ItemQuantity, qty, pname, total as totalprice, id, discount FROM cart_table WHERE uid='$id'";
                                        $data = mysqli_query($con, $query);
                                        $serial_no = 1;
                                        $product_price_total = 0;
                                        $dis=0;
                                        if (mysqli_num_rows($data) > 0) {
                                            while ($row = mysqli_fetch_assoc($data)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $serial_no; ?></td>
                                                <td><?php echo $row["pname"]; ?></td>
                                                <td><?php echo $row["ItemQuantity"]; ?></td>
                                                <?php
                                                    if($status==0){
                                                        $dis=10;
                                                    }
                                                ?>
                                                <td><?php echo $dis.'%'; ?></td>
                                                <td><?php echo $row["totalprice"]-$row["totalprice"]*($dis/100); ?></td>
                                            </tr>
                                        <?php
                                            $serial_no++;
                                            $product_price_total += $row['totalprice']-$row["totalprice"]*($dis/100);
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4">Total</td>
                                            <td><?php echo $product_price_total; ?></td>
                                        </tr>
                                        <tr>
                                            <?php
                                            $aftertax = 0;
                                            $query = "SELECT tax FROM setting";
                                            $data = mysqli_query($con, $query);
                                            $row = mysqli_fetch_assoc($data);
                                            $tax = $row['tax'];
                                            ?>
                                            <td colspan="4">Tax(<?php echo $tax;?>%)</td>
                                            <?php $aftertax = ($product_price_total) * ($tax/100); ?>
                                            <td><?php echo $aftertax; ?></td>
                                        </tr>

                                        <tr>
                                            <td colspan="4">Delivery Charge</td>
                                            <td><?php echo $d_charge; ?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">Grand Total</td>
                                            <td><?php echo $final_total = ($d_charge + $product_price_total+$aftertax); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-12">
                           <div class="table-responsive">
                              <table class="table table-striped table-bordered text-center">
                                 <thead>
                                    <tr>
                                       <th colspan="2">Address Details</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <tr>
                                       <td colspan="2"><?php echo $name; ?></td>
                                    </tr>
                                    <tr>
                                       <td><?php echo $hno; ?>&nbsp;(House No.)</td>
                                       <td><?php echo $society; ?>&nbsp;(Society.)</td>
                                    </tr>
                                    <tr>
                                       <td><?php echo $area; ?>&nbsp;(Area)</td>
                                       <td><?php echo $pincode; ?>&nbsp;(PIN code)</td>
                                    </tr>
                                    <tr>
                                       <td><?php echo $landmark; ?>&nbsp;(Landmark)</td>
                                       <td><?php echo $type; ?>&nbsp;(Location Type.)</td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  <?php
                  }
                  ?>
               </div>
            </div>
            <div id="order"></div>
            <div>
               <form action="" method="POST" id="placeOrder">
                  <?php
                  $all_product_id = '';
                  $all_pname = '';
                  $all_qty = '';
                  $all_ptype = '';
                  $all_pprice = '';
                  $allpid = array();
                  $allpname = array();
                  $allqty = array();
                  $allptype = array();
                  $allpprice = array();

                  $query = "SELECT * FROM address,cart_table,product WHERE cart_table.uid = address.uid AND cart_table.pid = product.id AND cart_table.uid = '$id'";

                  $data = mysqli_query($con, $query);

                  $total = mysqli_num_rows($data);
                  if ($total != 0) {
                     while ($row = mysqli_fetch_assoc($data)) {
                  ?>

                        <div class="fomr-group">
                           <?php
                           $cnt = 0;
                           $values = explode('$;', $row['pgms']);
                           foreach ($values as $value) {
                              if ($cnt == $row['ptype']) {
                           ?>
                                 <input type="hidden" class="form-control" readonly value="<?php echo $value; ?>">

                           <?php
                                 $gms = $value;
                              }
                              $cnt = $cnt + 1;
                           }
                           ?>
                        </div>
                        <div class="fomr-group">
                           <?php
                           $price = 0;
                           $count = 0;
                           $values = explode('$;', $row['pprice']);
                           foreach ($values as $valuee) {
                              if ($count == $row['price']) {
                           ?>
                                 <input type="hidden" class="form-control" id="totalprice" readonly value="<?php echo $valuee; ?>">
                           <?php
                                 $price = $valuee;
                              }
                              $count = $count + 1;
                           }
                           ?>
                        </div>
                  <?php
                        $allpid[] = $row['pid'];
                        $allpname[] = $row['pname'];
                        $allqty[] = $row['qty'];
                        $allptype[] = $gms;
                        $allpprice[] = $price;
                     }
                     $all_product_id = implode('$;', $allpid);
                     $all_pname = implode('$;', $allpname);
                     $all_qty = implode('$;', $allqty);
                     $all_ptype = implode('$;', $allptype);
                     $all_pprice = implode('$;', $allpprice);
                  } else {
                     "No Records Found!!!";
                  }
                  ?>
                  <input type="hidden" name="productsid" value="<?= $all_product_id; ?>">
                  <input type="hidden" name="allproductname" value="<?= $all_pname; ?>">
                  <input type="hidden" name="allproductqntty" value="<?= $all_qty; ?>">
                  <input type="hidden" name="allproducytype" value="<?= $all_ptype; ?>">
                  <input type="hidden" name="allproductprice" value="<?= $all_pprice; ?>">
                  <input type="hidden" name="finalTotal" value="<?= $final_total; ?>">
                  <input type="hidden" name="tax" value="0">
                  <div class="container p-1">
                     <div class="form-group">
                        <label>Payment Method*</label>
                        <select class="form-control" name="p_method" required>
                           <option value="">Select payment method*</option>

                              <option value="Cash on Delivery">Cash on Delivery</option>

                        </select>
                     </div>
                     <div class="form-group">
                        <label>Time Slot*</label>
                        <select class="form-control" name="timeslot">
                              <option value="9AM to 5PM">9AM to 5PM</option>
                        </select>
                     </div>
                     <?php
                  if (!$uniqaid) {
                  ?>
                     <center>
                        <div class="p-4">
                           <a type="button" class="btn btn-warning btn-lg disabled">Please, Enter Address Detailed Before Checkout!</a>
                        </div>
                     </center>
                  <?php
                  } else {
                      ?>
                     <input type="submit" name="submit" value="Place order" class="btn btn-warning text-dark btn-block">
                      <?php
                  }
                  ?>
                  </div>
               </form>
            </div>
         </div>

         <div class="clear"></div>


         <!-- Last Section Area Start============================================= -->
         <?php
         require_once('includes/lastsection.php');
         ?>
         <!-- Last Section Area End============================================= -->

   </div>

   </section>
   <!-- #content end -->

   <!-- Footer Section Start============================================= -->
   <?php
   require_once('includes/footer.php');
   ?>
   <!-- Footer Section Start============================================= -->
   </div>
   <!-- #wrapper end -->

   <!-- Go To Top ============================================= -->
   <div id="gotoTop" class="icon-line-arrow-up"></div>
   <!-- Scripts Section Area Start============================================= -->
   <?php
   require_once('includes/scripts.php');
   ?>
   <!--- sweet alert popup area --->
   <?php
   if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
   ?>
      <script>
         swal.fire({
            position: 'top-end',
            icon: "<?php echo $_SESSION['status_code']; ?>",
            title: "<?php echo $_SESSION['status']; ?>",
            showConfirmButton: false,
            timer: 4000
         });
      </script>
   <?php
      unset($_SESSION['status']);
   }
   ?>
   <!--- sweet alert popup area end --->
   <!---place order--->
   <script>
      $(document).ready(function() {
         $("#placeOrder").submit(function(e) {
            e.preventDefault();
            $.ajax({
               url: 'placeorder.php',
               method: 'post',
               data: $('form').serialize() + "&action=order",
               success: function(response) {
                  $("#order").html(response);
                  location.reload(true);
                  window.location.href = 'TrackOrder';
               }
            });
         });
      });
   </script>

   <!-- Scripts Section Area End============================================= -->
</body>

</html>
