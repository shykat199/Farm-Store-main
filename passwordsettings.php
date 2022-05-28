<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
   <!-- Stylesheets/CDN Area Start ============================================= -->
   <?php
   $page = 'index';
   require_once('includes/cdn.php');
   if (isset($_POST['acsetsubmit'])) {
      $id = $_SESSION['id'];

      $pass = $_POST['oldpwd'];

      $newpwd = $_POST['newpwd'];

      $confrmpwd = $_POST['confrmpwd'];

      $query = "SELECT password FROM user WHERE id=$id ";

      $result = mysqli_query($con, $query);

      while ($row = mysqli_fetch_array($result)) {
         $existing_password = $row['password'];

         if ($existing_password == $pass) {
            if ($newpwd == $confrmpwd) {
               $q = " UPDATE user SET password= '$newpwd' WHERE id=$id ";
               $update = mysqli_query($con, $q);

               if ($update) {
                  $_SESSION['status'] = "Password changed Successfully!";
                  $_SESSION['status_code'] = "success";
               } else {
                  $_SESSION['status'] = "Sorry Something Went Wrong! Try again Later";
                  $_SESSION['status_code'] = "error";
               }
            } else {
               $_SESSION['status'] = "Sorry New & Confirm Password doesnot match! Try again Later";
               $_SESSION['status_code'] = "error";
            }
         } else {
            $_SESSION['status'] = "Sorry Old Password doesnot match! Try again Later";
            $_SESSION['status_code'] = "error";
         }
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
               <!---user password update area start--->
               <div class="container p-4">
                  <div class="card shadow">
                     <div class="card-header">
                        <h5>Update Password</h5>
                     </div>
                     <div class="card-block">
                        <div class="card-body text-dark">
                           <form action="" method="POST" class="p-2" id="form">
                              <div class="form-group">
                                 <label class="font-weight-bold">Old Password*</label>
                                 <input type="password" name="oldpwd" class="form-control form-control-round" placeholder="old password" autocomplete="off" required>
                              </div>

                              <div class="form-group">
                                 <label class="font-weight-bold">New password*</label>
                                 <input type="password" name="newpwd" class="form-control form-control-round" placeholder="new password" autocomplete="off" required>
                              </div>

                              <div class="form-group">
                                 <label class="font-weight-bold">Confirm Password*</label>
                                 <input type="password" name="confrmpwd" class="form-control form-control-round" placeholder="confirm password" autocomplete="off" required>
                              </div>

                              <input type="submit" name="acsetsubmit" class="btn btn-warning" value="Submit">
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <!---user password update area end--->
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