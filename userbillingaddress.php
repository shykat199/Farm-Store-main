<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
   <!-- Stylesheets/CDN Area Start ============================================= -->
   <?php
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
            <div class="container clearfix">

               <?php
               $id = $_SESSION['id'];
               $query = "SELECT * FROM address WHERE uid='$id'";
               $data = mysqli_query($con, $query);
               if (mysqli_num_rows($data) > 0) {
                  while ($row = mysqli_fetch_assoc($data)) {
               ?>
                     <div class="container p-4">
                        <div class="card shadow">
                           <div class="table-responsive">
                              <table id="zero_configuration_table" class="table table-striped table-bordered text-center">
                                 <thead>
                                    <tr>
                                       <th>Serial No.</th>
                                       <th>Name</th>
                                       <th>House No.</th>
                                       <th>Society</th>
                                       <th>Area</th>
                                       <th>PIN Code</th>
                                       <th>Land Mark</th>
                                       <th>Address type</th>
                                       <th>Change Address</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                    $id = $_SESSION['id'];
                                    $query = "SELECT * FROM address WHERE uid='$id'";
                                    $data = mysqli_query($con, $query);
                                    $serial_no = 1;
                                    if (mysqli_num_rows($data) > 0) {
                                       while ($row = mysqli_fetch_assoc($data)) {
                                    ?>
                                          <tr>
                                             <td><?php echo $serial_no; ?></td>
                                             <td><?php echo $row["name"]; ?></td>
                                             <td><?php echo $row["hno"]; ?></td>
                                             <td><?php echo $row["society"]; ?></td>
                                             <td><?php echo $row["area"]; ?></td>
                                             <td><?php echo $row["pincode"]; ?></td>
                                             <td><?php echo $row["landmark"]; ?></td>
                                             <td><?php echo $row["type"]; ?></td>
                                             <td><a href="ChangeBilligAddress?uid=<?php echo $row["uid"]; ?>" class="btn btn-warning">Change</a></td>
                                          </tr>
                                    <?php
                                          $serial_no++;
                                       }
                                    } else {
                                       echo "<center><h3>Sorry! You have not add your address yet!.</h3></center>";
                                    }
                                    ?>

                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  <?php
                  }
               } else {
                  ?>
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                     Add Biiling Address
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Billing Address </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <form action="insertbillingaddress.php" method="POST" class="p-2" id="form">
                              <div class="modal-body">
                                 <div class="form-group">
                                    <label class="font-weight-bold">Name*</label>
                                    <input type="text" name="name" class="form-control form-control-round" placeholder="your name" autocomplete="off" required>
                                 </div>

                                 <div class="form-group">
                                    <label class="font-weight-bold">Address type*</label>
                                    <input type="text" name="type" class="form-control form-control-round" placeholder="Address type" autocomplete="off" required>
                                 </div>
                                 <div class="form-group">
                                    <label class="font-weight-bold">House Number*</label>
                                    <input type="text" name="hno" class="form-control form-control-round" placeholder="House Number" autocomplete="off" required>
                                 </div>

                                 <div class="form-group">
                                    <label class="font-weight-bold">Society*</label>
                                    <input type="text" name="society" class="form-control form-control-round" placeholder="Society" autocomplete="off" required>
                                 </div>

                                 <div class="form-group">
                                    <label class="font-weight-bold">Area*</label>
                                     <input type="text" name="area" class="form-control form-control-round" placeholder="Area" autocomplete="off" required>
                                 </div>

                                 <div class="form-group">
                                    <label class="font-weight-bold">Landmark*</label>
                                    <input type="text" name="landmark" class="form-control form-control-round" placeholder="Landmark" autocomplete="off" required>
                                 </div>

                                 <div class="form-group">
                                    <label class="font-weight-bold">Pincode*</label>
                                    <input type="number" name="pincode" class="form-control form-control-round" placeholder="Pincode" autocomplete="off" required>
                                 </div>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" name="addbillingaddress" class="btn btn-warning">Save changes</button>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               <?php
               }
               ?>
               <!---user billling address show area start--->
               <!---user billling address show area end--->
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
   <!-- Scripts Section Area End============================================= -->
</body>

</html>