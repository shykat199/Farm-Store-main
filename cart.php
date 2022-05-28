<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

   <!-- Stylesheets/CDN Area Start ============================================= -->
   <?php
   $page = 'index';
   require_once('includes/cdn.php');
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

      <!--Banner Slider area start ============================================= -->
      <?php
      require_once('includes/mainslider.php');
      ?>
      <!-- Banner Slider area End -->

      <!-- Content ============================================= -->
      <section id="content">
         <div class="content-wrap">
            <div class="container-fluid clearfix">
               <!---Cart area start--->
               <div class="card">
                  <div class="card-header">
                     <div class="table-responsive mt-1">
                        <table class="table table-bordered table-striped text-center">
                           <thead class="font-weight-bold">
                              <tr>
                                 <td colspan="9">
                                    <h4 class="text-center text-dark font-weight-bold m-0">Products in your cart!</h4>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Product ID</td>
                                 <td>Image</td>
                                 <td>Product</td>
                                 <td>(GM/KG/PIECE/BOX)</td>
                                 <td>Price(BDT/=)</td>
                                 <td>Quantity</td>
                                 <td>Disount(%)</td>
                                 <td>Total Price</td>
                                 <td>
                                    <a href="action.php?clear=all" class="badge badge-danger p-1" 
                                    onclick="return confirm('Are you sure?You want to clear your cart!')">
                                    <i class="fa fa-trash"></i> Clear Cart <i class="fa fa-trash"></i></a>
                                 </td>
                              </tr>
                           </thead>
                           <tbody>
                           <?php
                              $id = $_SESSION['id'];
                              $query = "SELECT * FROM cart_table,product WHERE cart_table.pid = product.id AND cart_table.uid='$id'";
                              $data = mysqli_query($con, $query);
                              $grand_total = 0;
                              $count = 0;
                              $cnt = 0;
                              $finaltotalprice = 0;
                              if (mysqli_num_rows($data) > 0) {
                                 while ($row = mysqli_fetch_assoc($data)) {
                              ?>
                                    <tr>
                                       <td><?= $row['pid'] ?></td>
                                       <input type="hidden" id="pid" value="<?= $row['pid']; ?>">
                                       <td><img src="<?php echo $row['pimg']; ?>" alt="No Image" style="width: 50px;height:50px;"></td>
                                       <td><?= $row['pname'] ?></td>
                                       <td>
                                          <div class="fomr-group">
                                             <?php
                                             $cnt = 0;
                                             $values = explode('$;', $row['pgms']);
                                             foreach ($values as $value) {
                                                if ($cnt == $row['ptype']) {
                                             ?>
                                                   <input type="text" class="form-control" readonly value="<?php echo $value; ?>">

                                             <?php
                                                }
                                                $cnt = $cnt + 1;
                                             }
                                             ?>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="fomr-group">

                                             <?php
                                             $price = 0;
                                             $count = 0;
                                             $values = explode('$;', $row['pprice']);
                                             foreach ($values as $valuee) {
                                                if ($count == $row['price']) {
                                             ?>
                                                   <input type="text" class="form-control input" id="totalprice" readonly value="<?php echo $valuee; ?>">
                                             <?php
                                                   $price = $valuee;
                                                }
                                                $count = $count + 1;
                                             }
                                             ?>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="input-group">
                                             <input type="number" id="quantity" name="quantity" class="form-control itemQty" value="<?= $row['qty'] ?>" 
                                             minlength="1" maxlength="10" style="width: 25px;">
                                          </div>
                                       </td>
                                       <td>
                                          <?php
                                          $premium = $con->query("select `status` from `user` where id=$id")->fetch_assoc();
                                          if ($premium['status'] == 0) {
                                          ?>
                                             <center><input type="number" readonly class="form-control" value="10" style="width:75px;"></center>
                                          <?php
                                          } else {
                                          ?>
                                             <center><input type="number" readonly class="form-control" value="<?= $row['discount'] ?>" style="width:75px;"></center>
                                          <?php
                                          }
                                          ?>
                                       </td>
                                       <td>
                                          <?php
                                          $totalprice = ($price * ($row['qty']));

                                          if ($premium['status'] == 0) {
                                             echo $discountprice = ($totalprice - (($totalprice * 10) / 100));
                                          } 
                                          else {
                                             echo $discountprice = ($totalprice - (($totalprice * ($row['discount'])) / 100));
                                          }
                                          ?>
                                       </td>
                                       <td>
                                          <a href="action.php?remove=<?= $row['pid'] ?>" class="text-danger lead
                                                                     " onclick="return confirm('Are you sure?You want to romove this item!')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                       </td>
                                    </tr>
                                    <?php $finaltotalprice += $discountprice ?>
                              <?php
                                 }
                              }
                              ?>
                              <tr>
                                 <td colspan="5">
                                    <a href="Homepage" class="btn btn-success btn-sm"><i class="fa fa-cart-plus"></i> Continue Shopping... <i class="fa fa-cart-plus"></i></a>
                                 </td>
                                 <td colspan="2">
                                    <b>Grand Total</b>
                                 </td>
                                 <td>
                                    <b><?php echo number_format($finaltotalprice, 2) ?>&nbsp;BDT/=</b>
                                 </td>
                                 <td>
                                    <a href="Checkout" id="chkout" class="btn btn-info btn-sm <?= ($finaltotalprice > 100) ? "" : "disabled"; ?>"><i class="fa fa-credit-card"></i> Checkout <i class="fa fa-credit-card"></i></a>
                                 </td>
                              </tr>
                           </tbody>
                           <tfoot>
                              <tr>
                                 <td colspan="9"><b>Minimum Order Amount 100 BDT/=</b></td>
                              </tr>
                           </tfoot>
                        </table>
                     </div>
                  </div>
               </div>
               <!---Cart area end--->
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
   <!---update total price due to change quantity--->
   <script>
      $(document).ready(function() {
         //update total price due to change quantity
         $(".itemQty").on('change', function() {
            
            var $el = $(this).closest('tr');
            var pid = $el.find("#pid").val();
            var tprice = $el.find("#totalprice").val();
            var qty = $el.find(".itemQty").val();

            $.ajax({
               url: 'changeQp.php',
               method: 'post',
               cache: false,
               data: {
                  qty: qty,
                  pid: pid,
                  tprice: tprice
               },
               success: function(response) {
                  console.log(response);
                  location.reload(true);
               }
            });
         });
      });
   </script>
   <!---update total price due to change quantity--->
   <!-- Scripts Section Area End============================================= -->
</body>

</html>