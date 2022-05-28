<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
   <!-- Stylesheets/CDN Area Start ============================================= -->
   <?php
   require_once('includes/cdn.php');
   $uid = $_GET['uid'];
   $sql = "SELECT * FROM address WHERE uid = '$uid'";
   $result =  mysqli_query($con, $sql);
   $row = mysqli_fetch_array($result);
   if (isset($_POST['billingaddressInfoUpdate'])) {

      $hno = $_POST["hno"];

      $society = $_POST["society"];

      $area = $_POST["area"];

      $pincode = $_POST["pincode"];

      $landmark = $_POST["landmark"];

      $type = $_POST["type"];

      $name = $_POST["name"];

      $update_sql = "UPDATE address SET hno='$hno',society='$society',area='$area',pincode='$pincode',landmark='$landmark',type='$type',name='$name' WHERE uid='$uid' ";

      $update_result = mysqli_query($con, $update_sql);

      if ($update_result == TRUE) {
         $_SESSION['status'] = "Updated Successfully!";
         $_SESSION['status_code'] = "success";
         header('location:BilligAddress');
      } else {
         $_SESSION['status'] = "Sorry Something Went Wrong! Try again Later";
         $_SESSION['status_code'] = "error";
         header('location:BilligAddress');
      }
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

      <!--Banner Slider area start ============================================= -->
      <?php
      require_once('includes/mainslider.php');
      ?>
      <!-- Banner Slider area End -->

      <!-- Content ============================================= -->
      <section id="content">
         <div class="content-wrap">
            <div class="container clearfix">
               <!---user billling address info show area start--->
               <form method="post" enctype="multipart/form-data">
                  <?php
                  $uid = $_GET['uid'];
                  $sql = "SELECT * FROM address WHERE uid = '$uid'";
                  $result =  mysqli_query($con, $sql);
                  $rows = mysqli_fetch_array($result);
                  ?>
                  <div class="modal-body">
                     <div class="form-group">
                        <label class="font-weight-bold">Name*</label>
                        <input type="text" name="name" class="form-control form-control-round" value="<?php echo $rows['name'] ?>" autocomplete="off" required>
                     </div>

                     <div class="form-group">
                        <label class="font-weight-bold">Address type*</label>
                        <input type="text" name="type" class="form-control form-control-round" value="<?php echo $rows['type'] ?>" autocomplete="off" required>
                     </div>
                     <div class="form-group">
                        <label class="font-weight-bold">House Number*</label>
                        <input type="text" name="hno" class="form-control form-control-round" value="<?php echo $rows['hno'] ?>" autocomplete="off" required>
                     </div>

                     <div class="form-group">
                        <label class="font-weight-bold">Society*</label>
                        <input type="text" name="society" class="form-control form-control-round" value="<?php echo $rows['society'] ?>" autocomplete="off" required>
                     </div>

                     <div class="form-group">
                        <label class="font-weight-bold">Landmark*</label>
                        <input type="text" name="landmark" class="form-control form-control-round" value="<?php echo $rows['landmark'] ?>" autocomplete="off" required>
                     </div>

                     <div class="form-group">
                        <label class="font-weight-bold">Pincode*</label>
                        <input type="number" name="pincode" class="form-control form-control-round" value="<?php echo $rows['pincode'] ?>" autocomplete="off" required>
                     </div>

                     <div class="form-group">
                        <label class="font-weight-bold">Change area*</label>
                         <input type="text" name="area" class="form-control form-control-round" value="<?php echo $rows['area'] ?>" autocomplete="off" required>

                     </div>
                  </div>
                  <button type="submit" name="billingaddressInfoUpdate" id="submit" class="btn btn-warning">Save changes</button>
               </form>
               <!---user billling address info show area end--->
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
   <!-- Scripts Section Area End============================================= -->
</body>

</html>